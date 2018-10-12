<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="{{asset('css/master.css')}}">
        <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Custom fonts for this template-->
        <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
    </head>
    <body>

        <!-- Menubar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-dark" id="id_1">
            <a id="logo_main" class="navbar-brand" href="{{route('AllBooks')}}">Book Tracker</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav" id="navbar_link">
                    <a class="nav-item nav-link li_space font-weight-light" href="{{route('AllBooks')}}">Home</a>
                </div>

                <form class="form" id="login_reg_btn">
                    @csrf
                    <a class="btn btn-outline-success" href="{{route('logout')}}">Logout</a>
                </form>
            </div>
        </nav>

        <!-- Page Content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <h2 class="my-4 font-weight-light"> <span class="badge badge-secondary">User Logged - @yield('user_fullname')</span> </h2>
                    <div class="list-group">
                        <a href="{{route('AllBooks')}}" class="list-group-item @yield('all_books_page')">
                            <i class="fa fa-fw fa-folder"></i>
                            Browse All Books
                        </a>
                        <a href="{{route('MyAddedBooks')}}" class="list-group-item @yield('my_added_book_page')">
                            <i class="fa fa-fw fa-align-justify"></i>
                            My Added Books
                        </a>
                        <a href="{{route('wantToReadBooks')}}" class="list-group-item @yield('want_to_read_page')">
                            <i class="fa fa-fw fa-clock-o"></i>
                            Want To Read List
                        </a>
                        <a href="{{route('already_ReadBooks')}}" class="list-group-item @yield('read_page')">
                            <i class="fa fa-fw fa-book"></i>
                            Read
                        </a>
                        <a href="{{route('CollectedBookPage')}}" class="list-group-item @yield('my_collection_page')">
                            <i class="fa fa-fw fa-envelope"></i>
                            Books in my collection
                        </a>
                        <a href="{{route('AddBooks')}}" class="list-group-item @yield('add_book_page')">
                            <i class="fa fa-fw fa-plus-circle"></i>
                            Add New Books
                        </a>
                    </div>
                </div>
                <!-- /.col-lg-3 -->

                <div class="col-lg-9">
                    @yield('content')
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->


    <div class="footer">
        <p id="footerPadding">© 2018 Copyright: arabikabir.com</p>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin.min.js')}} "></script>

    </body>
</html>
