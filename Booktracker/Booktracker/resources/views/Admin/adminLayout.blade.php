<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Book Tracker - Admin</title>
        <link rel="stylesheet" href="{{asset('css/master.css')}}">
        <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Custom fonts for this template-->
        <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
    </head>
    <body>

        <!-- Menubar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-dark" id="id_1">
            <a id="logo_main" class="navbar-brand" href="{{route('summary')}}">Book Tracker</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav" id="navbar_link">
                    <a class="nav-item nav-link li_space font-weight-light" href="{{route('summary')}}">Home</a>
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
                    <h2 class="my-4 font-weight-light"> <span class="badge badge-secondary">Admin Logged - @yield('user_fullname')</span> </h2>
                    <div class="list-group">
                        <a href="{{route('summary')}}" class="list-group-item @yield('summary_page')">
                            <i class="fa fa-fw fa-list-alt"></i>
                            Summay
                        </a>
                        <a href="{{route('showUserList')}}" class="list-group-item @yield('userlist_page')">
                            <i class="fa fa-fw fa-address-book"></i>
                            All User List
                        </a>
                        <a href="{{route('blockeduserList')}}" class="list-group-item @yield('blocked_user_page')">
                            <i class="fa fa-fw fa-lock"></i>
                            Blocked User List
                        </a>
                        <a href="{{route('bookListAdmin')}}" class="list-group-item @yield('all_book_page')">
                            <i class="fa fa-fw fa-book"></i>
                            All Books
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
