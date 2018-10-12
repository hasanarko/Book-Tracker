@extends('Admin.adminLayout')

@section('user_fullname')
    {{session('admin')->admin_fullname}}
@endsection

@section('all_book_page')
    active
@endsection

@section('content')
    <h1 id="page-heading">Book Details</h1>
    <hr>

    @include('Include.error')

    <form method="post" enctype="multipart/form-data" action="{{route('updateBookAdmin')}}">
        @csrf
        <input type="hidden" name="book_id" value="{{$book->book_id}}">

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Book Name</label>
            <div class="col-sm-10">
                <input name="bookname" type="text" class="form-control" value="{{$book->book_name}}" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <select class="form-control" name="category">
                  <option <?php if($book->book_category=="Science fiction") echo "selected" ?>>Select Category</option>
                  <option value="Science fiction" <?php if($book->book_category=="Science fiction") echo "selected" ?> >Science fiction</option>
                  <option value="Drama" <?php if($book->book_category=="Drama") echo "selected" ?> >Drama</option>
                  <option value="Action and Adventure" <?php if($book->book_category=="Action and Adventure") echo "selected" ?> >Action and Adventure</option>
                  <option value="Romance" <?php if($book->book_category=="Romance") echo "selected" ?> >Romance</option>
                  <option value="Mystery" <?php if($book->book_category=="Mystery") echo "selected" ?> >Mystery</option>
                  <option value="Horror" <?php if($book->book_category=="Horror") echo "selected" ?> >Horror</option>
                  <option value="Guide" <?php if($book->book_category=="Guide") echo "selected" ?> >Guide</option>
                  <option value="Health" <?php if($book->book_category=="Health") echo "selected" ?> >Health</option>
                  <option value="Travel" <?php if($book->book_category=="Travel") echo "selected" ?> >Travel</option>
                  <option value="Children" <?php if($book->book_category=="Children") echo "selected" ?> >Children</option>
                  <option value="Religion, Spirituality & New Age" <?php if($book->book_category=="Religion, Spirituality & New Age") echo "selected" ?> >Religion, Spirituality & New Age</option>
                  <option value="Science" <?php if($book->book_category=="Science") echo "selected" ?> >Science</option>
                  <option value="History" <?php if($book->book_category=="History") echo "selected" ?> >History</option>
                  <option value="Math" <?php if($book->book_category=="Math") echo "selected" ?>>Math</option>
                  <option value="Poetry" <?php if($book->book_category=="Poetry") echo "selected" ?>>Poetry</option>
                  <option value="Encyclopedias" <?php if($book->book_category=="Encyclopedias") echo "selected" ?>>Encyclopedias</option>
                  <option value="Comics" <?php if($book->book_category=="Comics") echo "selected" ?> >Comics</option>
                  <option value="Art" <?php if($book->book_category=="Art") echo "selected" ?> >Art</option>
                  <option value="Journals" <?php if($book->book_category=="Journals") echo "selected" ?> >Journals</option>
                  <option value="Biographies" <?php if($book->book_category=="Biographies") echo "selected" ?> >Biographies</option>
                  <option value="Prayer books" <?php if($book->book_category=="Prayer books") echo "selected" ?> >Prayer books</option>
                  <option value="Fantasy" <?php if($book->book_category=="Fantasy") echo "selected" ?> >Fantasy</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Writer Name</label>
            <div class="col-sm-10">
                <input name="writername" type="text" value="{{$book->book_writer_name}}" class="form-control" placeholder="">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Book Cover Photo</label>
            <div class="col-sm-10">
                <input type="file" class="form-control-file" name="bookpic" value="{{$book->book_picture}}">
                <img src="/UploadImage/bookImage/{{$book->book_picture}}" width="100px" alt="">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">First Release Year</label>
            <div class="col-sm-10">
                <input name="releaseYear" value="{{$book->book_release_year}}" type="text" class="form-control" placeholder="">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Publishers</label>
            <div class="col-sm-10">
                <input name="publisher" value="{{$book->book_publishers }}" type="text" class="form-control" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Language</label>
            <div class="col-sm-10">
                <select class="form-control" name="language">
                  <option value="Bangla" <?php if($book->book_language=="Bangla") echo "selected" ?>>Bangla</option>
                  <option value="English" <?php if($book->book_language=="English") echo "selected" ?>>English</option>
                  <option value="Arabic" <?php if($book->book_language=="Arabic") echo "selected" ?>>Arabic</option>
                  <option value="Hindi" <?php if($book->book_language=="Hindi") echo "selected" ?>>Hindi</option>
               </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Country</label>
            <div class="col-sm-10">
                <select class="form-control" name="country">
                  <option value="Bangladesh" <?php if($book->book_counrty=="Bangladesh") echo "selected" ?>>Bangladesh</option>
                  <option value="India" <?php if($book->book_counrty=="India") echo "selected" ?>>India</option>
                  <option value="America" <?php if($book->book_counrty=="America") echo "selected" ?>>America</option>
                  <option value="Russian" <?php if($book->book_counrty=="Russian") echo "selected" ?>>Russian</option>
               </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Summary</label>
            <div class="col-sm-10">
                <textarea name="summary" class="form-control">{{$book->book_summary}}</textarea>
            </div>
        </div>



        <div class="form-group row">
            <span class="col-sm-2"></span>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Update Book</button>
            </div>
        </div>
    </form>

@endsection
