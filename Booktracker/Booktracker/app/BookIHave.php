<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;

class BookIHave extends Model
{
    public function book()
    {
        return $this->belongsTo('Book', 'book_id');
    }
}
