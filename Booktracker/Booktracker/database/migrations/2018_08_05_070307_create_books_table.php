<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('book_id');
            $table->string('book_name');
            $table->string('book_category');
            $table->string('book_writer_name')->nullable();
            $table->integer('book_upload_userid');
            $table->string('book_release_year')->nullable();
            $table->string('book_publishers')->nullable();
            $table->string('book_language');
            $table->string('book_counrty')->nullable();
            $table->string('book_summary')->nullable();
            $table->float('book_rating')->nullable();
            $table->string('book_picture')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
