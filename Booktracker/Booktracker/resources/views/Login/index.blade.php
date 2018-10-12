<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Book Tacker - Login</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="css/login.css" rel="stylesheet">
</head>

<body class="bg-dark">
    <h1 class="font-weight-light" id="site_name">Book Tracker</h1>
    <div class="container align-items-center" id="form_body">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Login</div>
            <div class="card-body">
                <form method="post" action="login">
                    @csrf
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" name="username" type="text" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" name="password" type="password" placeholder="Password">
                    </div>
                    <input class="btn btn-primary btn-block" type="submit" value="Login">
                </form>
                <div class="text-center">
                    <a class="d-block small mt-3" href="{{route('registration')}}">Register an Account</a>
                </div>
                <br>
                @include('Include.error')
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
