@extends('Layouts.HomeLayout')

@section('user_fullname')
    {{session('user')->user_fullname}}
@endsection

@section('my_added_book_page')
    active
@endsection

@section('content')
    <h1 id="page-heading">My Added Books</h1>
    <hr>

    <div id="msg_padding">
        @include('Include.error')
    </div>

    <div class="row">
        @foreach($myBooks as $book)
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card h-100">
                    <a href="{{route('showBookinfo', ['id'=> $book->book_id])}}"><img class="card-img-top" src="/UploadImage/bookImage/{{$book->book_picture}}" width="100px" height="150px" alt="Not Found"></a>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{route('showBookinfo', ['id'=> $book->book_id])}}" class="">{{ $book->book_name }}</a>
                        </h5>
                        <p class="font-weight-light"> <span class="badge badge-primary"> Category : </span>  {{ $book->book_category }} </p>
                        <p class="font-weight-light"> <span class="badge badge-primary"> Writer : </span> {{ $book->book_writer_name }} </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- /.row -->
@endsection
