@extends('Layouts.HomeLayout')

@section('user_fullname')
    {{session('user')->user_fullname}}
@endsection

@section('all_books_page')
    active
@endsection

@section('content')
    <h1 id="page-heading">Book Information</h1>
    <hr>
    <div class="">
        <div class="row">
            <div class="col-12">
                <div class="container" id="action-button">
                    <div class="row" id="importantBtn">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Post Review</button>

                        <form action="{{route('wantToReadRequest')}}" method="post">
                            @csrf
                            <input type="hidden" name="book_id" value="{{$book->book_id}}">
                            <input type="hidden" name="user_id" value="{{session('user')->user_id}}">
                            @if($alreadyInWantToReadList == null)
                                @if($bookWantToReadCheck != null)
                                    <button class="btn btn-outline-info" type="submit" name="button" disabled>Want to Read</button>
                                @else
                                    <button class="btn btn-outline-info" type="submit" name="button">Want to Read</button>
                                @endif
                            @else
                                <button class="btn btn-outline-info" type="submit" name="button" disabled>Want to Read</button>
                            @endif

                        </form>

                        <form action="{{route('alreadyReadRequest')}}" method="post">
                            @csrf
                            <input type="hidden" name="book_id" value="{{$book->book_id}}">
                            <input type="hidden" name="user_id" value="{{session('user')->user_id}}">
                            @if($bookWantToReadCheck == null)
                                @if($alreadyInWantToReadList != null)
                                    <button class="btn btn btn-outline-success" type="submit" name="button" disabled>Read</button>
                                @else
                                    <button class="btn btn btn-outline-success" type="submit" name="button">Read</button>
                                @endif
                            @else
                                <button class="btn btn btn-outline-success" type="submit" name="button" disabled>Read</button>
                            @endif
                        </form>
                    </div>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Review</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form method="post" action="{{route('submitReview')}}">
                                @csrf
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Book : {{$book->book_name}}</label>
                                <input type="hidden" name="user_id" value="{{session('user')->user_id}}">
                                <input type="hidden" name="book_id" value="{{$book->book_id}}">
                                <textarea name="review" class="form-control" rows="3" required></textarea>
                            </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                          </div>

                        </div>
                      </div>
                    </div>

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
                       <th scope="row">My Rating</th>
                       <td id="td_space">
                           <div class="row">
                               <div class="col-8">
                                   <form method="post" action="{{route('rateBook')}}">
                                       @csrf
                                       <div class="form-group">
                                        @if(count($bookRating) == 1)
                                        <p class="badge badge-warning">Rated</p>
                                        <select class="form-control" name="rating">
                                          <option <?php if($bookRating->myRating=="1") echo "selected" ?> >1</option>
                                          <option <?php if($bookRating->myRating=="2") echo "selected" ?> >2</option>
                                          <option <?php if($bookRating->myRating=="3") echo "selected" ?> >3</option>
                                          <option <?php if($bookRating->myRating=="4") echo "selected" ?> >4</option>
                                          <option <?php if($bookRating->myRating=="5") echo "selected" ?> >5</option>
                                        </select>
                                        @else
                                        <select class="form-control" name="rating">
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                          <option>4</option>
                                          <option>5</option>
                                        </select>
                                        @endif

                                      </div>
                                      <input type="hidden" name="bookId" value="{{$book->book_id}}">
                                      <div>
                                           <button type="submit" class="btn btn-primary">Rate it</button>
                                      </div>
                                  </form>
                               </div>

                           </div>
                       </td>
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
                        </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
