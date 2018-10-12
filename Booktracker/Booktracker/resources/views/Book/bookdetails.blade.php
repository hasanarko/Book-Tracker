@extends('Layouts.HomeLayout')

@section('user_fullname')
    {{session('user')->user_fullname}}
@endsection

@section('my_added_book_page')
    active
@endsection

@section('content')
    <h1 id="page-heading">Book Information</h1>
    <hr>
    <div class="">
        <div class="row">
            <div class="col-6">
                <div class="" id="action-button">
                    <a class="btn btn-outline-info" href="{{route('editBookinfo', ['id'=> $book->book_id])}}">Edit Book Information</a>
                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Delete Book</button>
                </div>

                <div id="msg_padding">
                    @include('Include.error')
                </div>

                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <th>Book Name</th>
                      <td>{{$book->book_name}}</td>
                    </tr>
                    <tr>
                      <th>Category</th>
                      <td>{{$book->book_category}}</td>
                    </tr>
                    <tr>
                      <th scope="row">Writer</th>
                      <td>{{$book->book_writer_name}}</td>
                    </tr>
                    <tr>
                      <th scope="row">First Published</th>
                      <td>{{$book->book_release_year}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Publisher</th>
                        <td>{{$book->book_publishers}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Language</th>
                        <td>{{$book->book_language}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Country</th>
                        <td>{{$book->book_counrty}}</td>
                    </tr>
                    <tr>
                       <th scope="row">Rating</th>
                       <td>{{$book->book_rating}}</td>
                    </tr>
                    <tr>
                       <th scope="row">Summary</th>
                       <td>{{$book->book_summary}}</td>
                    </tr>
                  </tbody>
                </table>
            </div>
            <div class="col-6">
                <img id="bookImage" src="/UploadImage/bookImage/{{$book->book_picture}}" width="" height="450px" alt="Not Found">
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are you sure want to Delete this book ?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="{{route('deleteBook')}}">
                @csrf
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Book : {{$book->book_name}} </label>
                <input type="hidden" name="book_id" value="{{$book->book_id}}">
            </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Delete Permanently</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection
