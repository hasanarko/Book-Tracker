<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Book;
use App\WantToReadBook;
use App\AlreadyReadBook;

class HomeController extends Controller
{
    public function index(){
        $userid = session('user')->user_id;
        $myAddedBooks = Book::where('book_upload_userid', $userid)
               ->orderBy('created_at', 'desc')
               ->get();

        return view('Home.home', ['myBooks' => $myAddedBooks]);
    }

    public function addNewBook(){
        return view('Home.addNewBook');
    }

    public function showAllBook(){
        $allBooks = Book::all();
        return view('Book.allBooks', ['myBooks' => $allBooks]);
    }

    public function wantToReadBook(){

        $userid = session('user')->user_id;
        $wantToReadBooks = DB::table('want_to_read_books')
                                        ->join('books', 'want_to_read_books.book_id', '=', 'books.book_id')
                                        ->where('user_id', $userid)
                                        ->get();

        return view('Home.wantToRead')
                ->with('wantToReadBooks', $wantToReadBooks);
    }

    public function alreadyReadBook(){
        $userid = session('user')->user_id;

        $ReadBooks = DB::table('already_read_books')
                                        ->join('books', 'already_read_books.book_id', '=', 'books.book_id')
                                        ->where('user_id', $userid)
                                        ->get();

        return view('Home.readBookList')
                    ->with('ReadBooks', $ReadBooks);
    }
}
