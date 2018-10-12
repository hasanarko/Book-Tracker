<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Book Tracker - Registration</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form method="post">
            @csrf
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label>Username*</label>
                <input name="username" class="form-control" type="text" placeholder="Enter username">
              </div>
              <div class="col-md-6">
                <label>User Full Name*</label>
                <input name="user_fullname" class="form-control" type="text" placeholder="Enter full name">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Password*</label>
                <input name="pass1" class="form-control" type="password" placeholder="Password">
              </div>
              <div class="col-md-6">
                <label>Confirm password*</label>
                <input name="pass2" class="form-control" type="password" placeholder="Confirm password">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label>Email*</label>
                <input name="email"class="form-control" type="email" placeholder="Enter email address">
              </div>
              <div class="col-md-6">
                <label>Phone</label>
                <input name="phone" class="form-control" type="tel" placeholder="Enter phone number">
              </div>
            </div>
          </div>
          <div class="form-group">
              <div class="form-row">
                  <div class="col-md-6">
                      <label>Address</label>
                      <textarea name="address" class="form-control" rows="2"></textarea>
                  </div>
                  <div class="col-md-6">
                      <label>City</label>
                      <select class="custom-select" name="city">
                        <option selected>Select City</option>
                        <option value="Dhaka">Dhaka</option>
                        <option value="Faridpur">Faridpur</option>
                        <option value="Gazipur">Gazipur</option>
                        <option value="Gopalganj">Gopalganj</option>
                        <option value="Jamalpur">Jamalpur</option>
                        <option value="Kishoreganj">Kishoreganj</option>
                        <option value="Madaripur">Madaripur</option>
                        <option value="Manikganj">Manikganj</option>
                        <option value="Munshiganj">Munshiganj</option>
                      </select>
                  </div>
              </div>
          </div>
          <input type="submit" class="btn btn-success btn-block" value="Register"></input>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="{{route('login')}}">Login Page</a>
        </div>
      </div>
    </div>

    @include('Include.error')

  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
