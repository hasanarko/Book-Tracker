@extends('Admin.adminLayout')

@section('user_fullname')
    {{session('admin')->admin_fullname}}
@endsection

@section('all_book_page')
    active
@endsection

@section('content')
    <h1 id="page-heading">All Book List</h1>
    <hr>
    <div class="">

        <!-- Search Option-->
        <form class="row" method="post" action="{{route('searchBookAdmin')}}">
            @csrf
          <div class="form-group col-10">
            <input type="text" name="bookName" class="form-control" placeholder="Search Book">
          </div>
          <div class="col-2">
              <button type="submit" class="btn btn-outline-info btn-block">Search</button>
          </div>
        </form>

        <div id="msg_padding">
            @include('Include.error')
        </div>

        <table class="table table-bordered table-sm table-hover">
            <tr>
                <th scope="col">#</th>
                <th scope="col" class="make_text_center">Book Cover</th>
                <th scope="col" class="make_text_center">Book Name</th>
                <th scope="col" class="make_text_center">Writer</th>
                <th scope="col" class="make_text_center">Category</th>
                <th scope="col" class="make_text_center">Show Details</th>
            </tr>
            <tbody>
                @foreach($books as $key => $book)
                    <tr>
                        <td>{{++$key}}</td>
                        <td><img src="/UploadImage/bookImage/{{$book->book_picture}}" width="100px" height="150px" alt="Not Found"></td>
                        <td class="make_text_center">{{$book->book_name}}</td>
                        <td class="make_text_center">{{$book->book_writer_name}}</td>
                        <td class="make_text_center">{{$book->book_category}}</td>
                        <td class="make_text_center"><a href="{{route('showBookInfoAdmin', ['id'=> $book->book_id])}}" class="btn btn-success">Show</a> </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <!-- /.row -->
@endsection
