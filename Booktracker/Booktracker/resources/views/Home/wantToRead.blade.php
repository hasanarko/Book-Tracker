@extends('Layouts.HomeLayout')

@section('user_fullname')
    {{session('user')->user_fullname}}
@endsection

@section('want_to_read_page')
    active
@endsection

@section('content')
    <h1 id="page-heading">Want To Read Book List</h1>
    <hr>
    <div class="">

        <div id="msg_padding">
            @include('Include.error')
        </div>

        <table class="table table-bordered">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Book Name</th>
                <th scope="col">Category </th>
                <th scope="col">Writer</th>
                <th scope="col">Action</th>
            </tr>
            <tbody>
                <?php $i=1 ?>
                @foreach($wantToReadBooks as $key => $book)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$book->book_name}}</td>
                        <td>{{$book->book_category}}</td>
                        <td>{{$book->book_writer_name}}</td>

                        <td> <a type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal{{$key}}" data-whatever="@mdo">Completed</a> </td>
                    </tr>

                    <div class="modal fade" id="exampleModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Are you sure that you have completed this book ?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form method="post" action="{{route('removeToCompleteList')}}">
                                @csrf
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Book : {{$book->book_name}} </label>

                                <input type="hidden" name="user_id" value="{{session('user')->user_id}}">
                                <input type="hidden" name="book_id" value="{{$book->book_id}}">
                            </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Completed</button>
                                </div>
                            </form>
                          </div>

                        </div>
                      </div>
                    </div>

                @endforeach
            </tbody>
        </table>

    </div>
    <!-- /.row -->
@endsection
