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
    <div class="">
        <div class="row">
            <div class="col-12">

                <div class="" id="action-button">
                    <a class="btn btn-outline-info" href="{{route('editBook', ['id'=>$book->book_id])}}">Edit Book Information</a>
                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Delete Book</button>
                </div>

                <div id="msg_padding">
                    @include('Include.error')
                </div>

                <table class="table table-bordered">
                    <col width="20%">
                    <col width="60%">
                    <col width="20%">

                  <tbody>
                    <tr>
                      <th>Book Name</th>
                      <td>{{$book->book_name}}</td>
                      <td rowspan="9"><img id="bookImage" src="/UploadImage/bookImage/{{$book->book_picture}}" alt="Not Found"></td>
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
                       <th scope="row">Avg Rating</th>
                       <td>{{$book->book_rating}}</td>
                    </tr>
                    <tr>
                       <th scope="row">Summary</th>
                       <td>{{$book->book_summary}}</td>
                    </tr>
                  </tbody>
                </table>
            </div>

            <!-- Review -->
            <div class="col-12">
                <h2 class="font-weight-light">Review</h2>
                <br>
                <table class="table table-bordered">
                  <tbody>
                    @foreach($bookReview as $review)
                        <tr>
                          <td> <span class="badge badge-primary">{{$review->user_fullname}}</span>  {{$review->review}}</td>
                          <form action="{{route('deleteReview', ['reviewId'=> $review->id])}}" method="post">
                              @csrf
                              <td> <input class="btn btn-outline-danger" type="submit" value="Delete"></input> </td>
                              <input type="hidden" name="book_id" value="{{$review->book_id}}"></input>
                          </form>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Delete Conformation Modal -->
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
            <form method="post" action="{{route('deleteBookAdmin')}}">
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
    <!-- /.row -->
@endsection
