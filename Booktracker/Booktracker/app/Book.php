<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BookIHave;

class Book extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'book_id';

    public function bookIhave()
    {
        return $this->hasMany('BookIHave', 'book_id');
    }
}
