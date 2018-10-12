<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Support\Facades\DB;
use App\Book;
use App\BookIHave;
use App\Review;
use App\BookRating;
use App\AlreadyReadBook;
use App\WantToReadBook;

class BookController extends Controller
{
    // insert book
    public function insertBook(BookRequest $request){
        $book = new Book();
        $book->book_name = $request->bookname;
        $book->book_category = $request->category;
        $book->book_writer_name = $request->writername;
        $book->book_upload_userid = $request->userid;
        $book->book_release_year = $request->releaseYear;
        $book->book_publishers = $request->publisher;
        $book->book_language = $request->language;
        $book->book_counrty = $request->country;
        $book->book_summary = $request->summary;
        $book->book_picture = 'have_to_rename';
        $book->save();

        // new method getting book image
        $lastID = $book->book_id;
        $book_updateImage = Book::find($lastID);

        if ($request->hasFile('bookpic')) {
            $image = $request->file('bookpic');
            $name = $lastID.str_slug($request->bookname).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/UploadImage/bookImage');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $book_updateImage->book_picture = $name;
            $book_updateImage->save();
        }
        $request->session()->flash('success_message', 'Book Added Successsfully');
        return redirect()->route('AddBooks');
    }

    // show book details
    public function showBook($bookID){
        $book = Book::find($bookID);
        return view('Book.bookdetails')->with('book', $book);
    }

    // show book details global
    public function showBookGlobal($bookID){
        // Get Book Review
        $bookReview = DB::table('reviews')
                                ->join('books', 'reviews.book_id', '=', 'books.book_id')
                                ->join('users', 'reviews.user_id', '=', 'users.user_id')
                                ->where('reviews.book_id', '=', $bookID)
                                ->get();

        $book = Book::find($bookID);

        $oldRating = BookRating::where('book_id', $bookID)
                                ->Where('user_id', session('user')->user_id)
                                ->first();

        $alreadyReadcheck = AlreadyReadBook::where('book_id', $bookID)
                                ->Where('user_id', session('user')->user_id)
                                ->first();

        $alreadyInWantToReadList = WantToReadBook::where('book_id', $bookID)
                                ->Where('user_id', session('user')->user_id)
                                ->first();
                        //dd($alreadyReadcheck);

        return view('Book.bookinfo')
                    ->with('bookReview', $bookReview)
                    ->with('bookRating', $oldRating)
                    ->with('bookWantToReadCheck', $alreadyReadcheck)
                    ->with('alreadyInWantToReadList', $alreadyInWantToReadList)
                    ->with('book', $book);
    }

    // edit book details
    public function editBook($bookID){
        $book = Book::find($bookID);
        return view('Book.editbookdetails')->with('book', $book);
    }

    // delete book
    public function deleteBook(Request $request){
        $book = Book::where('book_id', $request->book_id)->first();
        $book->delete();

        $request->session()->flash('success_message', 'Book Deleted Successsfully');
        return redirect()->route('MyAddedBooks');
    }

    // update book details
    public function updateBook(UpdateBookRequest $request){
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
        return redirect()->route('showBookinfo', ['id'=>$book->book_id]);
    }

    // submit book review
    public function submitReview(Request $request){
        $review = new Review();
        $review->user_id = $request->user_id;
        $review->book_id = $request->book_id;
        $review->review = $request->review;
        $review->save();

        $request->session()->flash('success_message', 'Review Posted Successsfully');
        return redirect()->route('showBookinfo_global', ['id' => $request->book_id]);
    }

    // show collected bbok page
    public function showCollectedBookPage(){
        $userid = session('user')->user_id;

        $mycollectedBooks = DB::table('books')
                                ->join('book_i_haves', 'books.book_id', '=', 'book_i_haves.book_id')
                                ->where('user_id', $userid)
                                ->get();

        $myAddedBooks = Book::where('book_upload_userid', $userid)
                                   ->orderBy('created_at', 'desc')
                                   ->get();

        return view('Home.myCollectedBook')
                    ->with('books', $mycollectedBooks)
                    ->with('myAddedBooks', $myAddedBooks);
    }

    // insert book in collection list
    public function addBookinCollectionList(Request $request){
        $book = new BookIHave();
        $book->book_id = $request->book;
        $book->user_id = session('user')->user_id;
        $book->save();

        $request->session()->flash('success_message', 'Book Added Successsfully');
        return redirect()->route('CollectedBookPage');
    }

    // insert rating
    public function submitRating(Request $request){
        $oldRating = BookRating::where('book_id', $request->bookId)
                                ->Where('user_id', session('user')->user_id)
                                ->first();
        if($oldRating)
        {
            $oldRating->myRating = $request->rating;
            $oldRating->book_id = $request->bookId;
            $oldRating->user_id = session('user')->user_id;
            $oldRating->save();

            $request->session()->flash('success_message', 'Rating Updated');
            //return redirect()->route('showBookinfo_global', ['id' => $request->bookId]);
        }
        else {
            $rating = new BookRating();
            $rating->myRating = $request->rating;
            $rating->book_id = $request->bookId;
            $rating->user_id = session('user')->user_id;
            $rating->save();

            $request->session()->flash('success_message', 'Rated Successsfully');
        }

        // Rating calculation
        $rate = Book::where('book_id', $request->bookId)
                                ->first();

        if($rate->book_rating != null)
        {
            $totalRating = 0;
            $oldRating = BookRating::where('book_id', $request->bookId)->get();
            $i = 0;
            foreach($oldRating as $rating) {
                $i++;
                $totalRating = $totalRating +  $rating->myRating;
            }
            $avgRaing = $totalRating/$i;
            $book = Book::find($request->bookId);
            $book->book_rating = $avgRaing;
            $book->save();
        }
        else
        {
            $oldRating = BookRating::where('book_id', $request->bookId)->first();
            if($oldRating)
            {
                $totalRating = $oldRating->myRating;
                $avgRaing = $totalRating;
                $book = Book::find($request->bookId);
                $book->book_rating = $avgRaing;
                $book->save();
            }

        }

        return redirect()->route('showBookinfo_global', ['id' => $request->bookId]);
    }

    // delete book from mycollection list
    public function deleteBookinCollectionList(Request $request){
        $book = BookIHave::where('book_id', $request->book_id);
        $book->delete();

        $request->session()->flash('success_message', 'Book Removed Successsfully');
        return redirect()->route('CollectedBookPage');
    }

    // Want-to-read insert
    public function wantToReadRequest(Request $request){
        $book = new WantToReadBook();
        $book->book_id = $request->book_id;
        $book->user_id = $request->user_id;
        $book->save();

        $request->session()->flash('success_message', 'Book Added Successsfully');
        return redirect()->route('wantToReadBooks');
    }

    // already-read insert
    public function alreadyReadRequest(Request $request){
        $book = new AlreadyReadBook();
        $book->book_id = $request->book_id;
        $book->user_id = $request->user_id;
        $book->save();

        $request->session()->flash('success_message', 'Book Added Successsfully');
        return redirect()->route('already_ReadBooks');
    }

    // send to complete list delete from want to read list
    public function removeToCompleteList(Request $request){
        // add to read list
        $book = new AlreadyReadBook();
        $book->book_id = $request->book_id;
        $book->user_id = $request->user_id;
        $book->save();

        // remove from want to read list
        $book = WantToReadBook::where('book_id', $request->book_id)
                                        ->where('user_id', $request->user_id)
                                        ->first();
        $book->delete();

        $request->session()->flash('success_message', 'Book Remove from Want to Read List and Added to Read List Successsfully');
        return redirect()->route('already_ReadBooks');
    }

    // remove book from readbook list
    public function removeReadBook(Request $request){
        $book = AlreadyReadBook::where('book_id', $request->book_id)
                                        ->where('user_id', $request->user_id)
                                        ->first();
        $book->delete();
        $request->session()->flash('success_message', 'Book Remove from Read List Successsfully');
        return redirect()->route('already_ReadBooks');
    }

    // search book
    public function searchBook(Request $request){
        $book = Book::where('book_name', 'LIKE' ,"%{$request->bookName}%")
                    ->get();
        if(count($book) == 0)
        {
            $request->session()->flash('error_message', 'No Book Found with that Name');
            return redirect()->route('AllBooks');
        }

        return view('Book.allBooks', ['myBooks' => $book]);
    }

}















//
