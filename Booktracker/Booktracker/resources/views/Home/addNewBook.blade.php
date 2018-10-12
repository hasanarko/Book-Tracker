@extends('Layouts.HomeLayout')

@section('user_fullname')
    {{session('user')->user_fullname}}
@endsection

@section('add_book_page')
    active
@endsection

@section('content')
    <h1 id="page-heading">Add New Books</h1>
    <hr>

    @include('Include.error')

    <form method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Book Name</label>
            <div class="col-sm-10">
                <input name="bookname" type="text" class="form-control" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <select class="form-control" name="category">
                  <option>Select Category</option>
                  <option value="Science fiction">Science fiction</option>
                  <option value="Drama">Drama</option>
                  <option value="Action and Adventure">Action and Adventure</option>
                  <option value="Romance">Romance</option>
                  <option value="Mystery">Mystery</option>
                  <option value="Horror">Horror</option>
                  <option value="Guide">Guide</option>
                  <option value="Health">Health</option>
                  <option value="Travel">Travel</option>
                  <option value="Children">Children</option>
                  <option value="Religion, Spirituality & New Age">Religion, Spirituality & New Age</option>
                  <option value="Science">Science</option>
                  <option value="History">History</option>
                  <option value="Math">Math</option>
                  <option value="Poetry">Poetry</option>
                  <option value="Encyclopedias">Encyclopedias</option>
                  <option value="Comics">Comics</option>
                  <option value="Art">Art</option>
                  <option value="Journals">Journals</option>
                  <option value="Biographies">Biographies</option>
                  <option value="Prayer books">Prayer books</option>
                  <option value="Fantasy">Fantasy</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Writer Name</label>
            <div class="col-sm-10">
                <input name="writername" type="text" class="form-control" placeholder="">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Book Cover Photo</label>
            <div class="col-sm-10">
                <input type="file" class="form-control-file" name="bookpic">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">First Release Year</label>
            <div class="col-sm-10">
                <input name="releaseYear" type="text" class="form-control" placeholder="">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Publishers</label>
            <div class="col-sm-10">
                <input name="publisher" type="text" class="form-control" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Language</label>
            <div class="col-sm-10">
                <select class="form-control" name="language">
                  <option value="Bangla">Bangla</option>
                  <option value="English">English</option>
                  <option value="Arabic">Arabic</option>
                  <option value="Hindi">Hindi</option>
               </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Country</label>
            <div class="col-sm-10">
                <select class="form-control" name="country">
                  <option value="Bangladesh">Bangladesh</option>
                  <option value="India">India</option>
                  <option value="America">America</option>
                  <option value="Russian">Russian</option>
               </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Summary</label>
            <div class="col-sm-10">
                <textarea name="summary" class="form-control" placeholder=""></textarea>
            </div>
        </div>

        <input name="userid" type="hidden" value="{{session('user')->user_id}}">

        <div class="form-group row">
            <span class="col-sm-2"></span>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Add Book</button>
            </div>
        </div>
    </form>



@endsection
