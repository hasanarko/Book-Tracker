<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserStatus;
use App\Book;
use App\Review;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateBookRequest;

class AdminController extends Controller
{
    // show admin summary page
    public function showAdminHome(){
        return view('Admin.index');
    }

    // show all user
    public function showAllUser(){

        $users = DB::table('users')
                                ->join('user_statuses', 'user_statuses.user_id', '=', 'users.user_id')
                                ->get();

        return view('Admin.allUserList', ['users' => $users]);
    }

    // show user information
    public function showUserInfo($id){

        $user = DB::table('users')
                                ->join('user_statuses', 'user_statuses.user_id', '=', 'users.user_id')
                                ->where('users.user_id', $id)
                                ->first();

        //$user = User::where('user_id', $id)->first();
        return view('Admin.userInfo', ['user' => $user]);
    }

    // block user
    public function blockUser(Request $req){
        $user = UserStatus::where('user_id', $req->user_id)->first();
        //($user);
        if($user->user_status == 'active')
        {
            $user->user_status = 'block';
            $user->save();
            $req->session()->flash('success_message', 'User Blocked');
        }
        else {
            $user->user_status = 'active';
            $user->save();
            $req->session()->flash('success_message', 'User Activated');
        }

        return redirect()->route('showUserInfo', ['id' => $req->user_id]);
    }

    // show block user list
    public function blockeduserList(){
        $user = DB::table('users')
                                ->join('user_statuses', 'user_statuses.user_id', '=', 'users.user_id')
                                ->where('user_statuses.user_status', "block")
                                ->get();

        return view('Admin.blockedUserList', ['users' => $user]);
    }

    // show all book list
    public function bookListAdmin(){
        $book = DB::table('books')
                                ->join('users', 'users.user_id', '=', 'books.book_upload_userid')
                                ->get();
        return view('Admin.allBooks', ['books' => $book]);
    }

    // search User
    public function searchUser(Request $request){
        $users = DB::table('users')
                    ->join('user_statuses', 'user_statuses.user_id', '=', 'users.user_id')
                    ->where('user_fullname', 'LIKE' ,"%{$request->userName}%")
                    ->get();

        if(count($users) == 0)
        {
            $request->session()->flash('error_message', 'No User Found with that Name');
            return redirect()->route('showUserList');
        }

        return view('Admin.allUserList', ['users' => $users]);
    }

    // search book
    public function searchBookAdmin(Request $request){
        $book = Book::where('book_name', 'LIKE' ,"%{$request->bookName}%")
                    ->orWhere('book_writer_name', 'LIKE' ,"%{$request->bookName}%")
                    ->get();
        if(count($book) == 0)
        {
            $request->session()->flash('error_message', 'No Book Found with that Name');
            return redirect()->route('bookListAdmin');
        }

        return view('Admin.allBooks', ['books' => $book]);
    }

    // book details show
    public function showBookInfoAdmin($id){
        $books = DB::table('books')
                                ->join('users', 'books.book_upload_userid', '=', 'users.user_id')
                                ->where('books.book_id', '=', $id)
                                ->first();

        $bookReview = DB::table('reviews')
                                ->join('books', 'reviews.book_id', '=', 'books.book_id')
                                ->join('users', 'reviews.user_id', '=', 'users.user_id')
                                ->where('reviews.book_id', '=', $id)
                                ->get();

        return view('Admin.BookDetails')
                    ->with('book', $books)
                    ->with('bookReview', $bookReview);
    }

    public function deleteReview(Request $request){
        $bookReview = Review::where('id', $request->reviewId)->first();
        $bookReview->delete();
        //dd($bookReview);
        $request->session()->flash('error_message', 'Review Deleted.');
        return redirect()->route('showBookInfoAdmin', ['id' => $request->book_id]);
    }

    public function deleteBookAdmin(Request $request){
        $book = Book::where('book_id', $request->book_id)->first();
        $book->delete();

        $request->session()->flash('success_message', 'Book Deleted Successsfully');
        return redirect()->route('bookListAdmin');
    }

    public function editBook($id){
        $book = Book::where('book_id', $id)->first();
        return view('Admin.AdminEditBook')->with('book', $book);
    }

    public function updateBookAdmin(UpdateBookRequest $request){
        $book = Book::where('book_id', $request->book_id)->first();

        // update image
        $image = $request->file('bookpic');
        if($image)
        {
            $image = $request->file('bookpic');
            $name = $book->book_id.str_slug($request->bookname).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/UploadImage/bookImage');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $book->book_picture = $name;
            //$book_updateImage->save();
        }
        else
        {
            $book->book_picture = $book->book_picture;
        }

        $book->book_name = $request->bookname;
        $book->book_category = $request->category;
        $book->book_writer_name = $request->writername;
        //$book->book_upload_userid = $request->userid;
        $book->book_release_year = $request->releaseYear;
        $book->book_publishers = $request->publisher;
        $book->book_language = $request->language;
        $book->book_counrty = $request->country;
        $book->book_summary = $request->summary;
        $book->save();

        $request->session()->flash('success_message', 'Book Updated Successsfully');

        return redirect()->route('showBookInfoAdmin', ['id'=>$book->book_id]);
    }

    public function showSummaryPage(){
        $books = Book::all();
        $users = User::all();
        $ActiveUser = UserStatus::where('user_status', 'active')->get();
        $BlockUser = UserStatus::where('user_status', 'block')->get();

        // number of book categorywise
        $Sciencefiction = Book::where('book_category', 'Science fiction')->get();
        $Drama = Book::where('book_category', 'Drama')->get();
        $ActionandAdventure = Book::where('book_category', 'Action and Adventure')->get();
        $Romance = Book::where('book_category', 'Romance')->get();
        $Mystery = Book::where('book_category', 'Mystery')->get();
        $Horror = Book::where('book_category', 'Horror')->get();
        $Guide = Book::where('book_category', 'Guide')->get();
        $Health = Book::where('book_category', 'Health')->get();
        $Travel = Book::where('book_category', 'Travel')->get();
        $Children = Book::where('book_category', 'Children')->get();
        $Religion_Spirituality_New_Age = Book::where('book_category', 'Religion, Spirituality & New Age')->get();
        $Science = Book::where('book_category', 'Science')->get();
        $History = Book::where('book_category', 'History')->get();
        $Math = Book::where('book_category', 'Math')->get();
        $Poetry = Book::where('book_category', 'Poetry')->get();
        $Encyclopedias = Book::where('book_category', 'Encyclopedias')->get();
        $Comics = Book::where('book_category', 'Comics')->get();
        $Art = Book::where('book_category', 'Art')->get();
        $Journals = Book::where('book_category', 'Journals')->get();
        $Biographies = Book::where('book_category', 'Biographies')->get();
        $Prayerbooks = Book::where('book_category', 'Prayer books')->get();
        $Fantasy = Book::where('book_category', 'Fantasy')->get();

        $totalNumberofBook = count($books);
        $totalNumberofUser = count($users);
        $numberOfActiveUser = count($ActiveUser);
        $numberOfBlockUser = count($BlockUser);

        $Sciencefiction = count($Sciencefiction);
        $Drama = count($Drama);
        $ActionandAdventure = count($ActionandAdventure);
        $Romance = count($Romance);
        $Mystery = count($Mystery);
        $Horror = count($Horror);
        $Guide = count($Guide);
        $Health = count($Health);
        $Travel = count($Travel);
        $Children = count($Children);
        $Religion_Spirituality_New_Age = count($Religion_Spirituality_New_Age);
        $Science = count($Science);
        $History = count($History);
        $Math = count($Math);
        $Poetry = count($Poetry);
        $Encyclopedias = count($Encyclopedias);
        $Comics = count($Comics);
        $Art = count($Art);
        $Journals = count($Journals);
        $Biographies = count($Biographies);
        $Prayerbooks = count($Prayerbooks);
        $Fantasy = count($Fantasy);

        $allTypeBook = array($Sciencefiction,$Drama,$ActionandAdventure,$Romance,$Mystery,$Horror,$Guide,
                            $Health,$Travel,$Children,$Religion_Spirituality_New_Age,$Science,$History,
                            $Math,$Poetry,$Encyclopedias,$Comics,$Art,$Journals,$Biographies,$Prayerbooks,
                            $Fantasy);


        //$book = Book::where('book_id', $id)->first();
        return view('Admin.summary')
                        ->with('totalNumberofBook', $totalNumberofBook)
                        ->with('totalNumberofUser', $totalNumberofUser)
                        ->with('numberOfActiveUser', $numberOfActiveUser)
                        ->with('numberOfBlockUser', $numberOfBlockUser)
                        ->with('allBook', $allTypeBook);
    }







    //
}
