<?php
require_once '../login/checklogin.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="../css/custom.css" rel="stylesheet">

    <title>Create new User</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
</head>
<body>

<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Microfinance</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                    <a class="nav-link" href="adminhome.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="araccounts.php">Accept Revoke Accounts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="viewdetails.php">View Personal Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="viewUserRequest.php">View User Requests</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="newemployee.php">Create New Employee</a>
                </li>
            </ul>
            <form class="form-inline mt-2 mt-md-0" action="../login/logout.php">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
            </form>
        </div>
    </nav>
</header>

<main role="main">


    <div class="container">
        <div class="py-5 text-center" style="margin-top: 30px;">
            <h2>Create new Employee</h2>
        </div>


        <div class="row">
            <div class="col-md-8 order-md-1">
                <form class="needs-validation" novalidate action="../dbOperations/createEmployee.php" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" name="fname" class="form-control" id="firstName" placeholder="" value=""
                                   required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" name="lname" class="form-control" id="lastName" placeholder="" value=""
                                   required>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="username">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input type="text" class="form-control" name="uname" id="username" placeholder="Username"
                                   required>
                            <div class="invalid-feedback" style="width: 100%;">
                                Users desired Username is required
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">NIC</label>
                        <input type="text" class="form-control" id="nic" name="nic" placeholder="123456789V"
                               pattern="[0-9]{9}[vV]" required>
                        <div class="invalid-feedback">
                            Please enter a valid NIC
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
                        <div class="invalid-feedback">
                            Please enter a valid email address
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St"
                               required>
                        <div class="invalid-feedback">
                            Please enter the Address
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address2">Phone</label>
                        <input type="tel" class="form-control" id="tel" name="phone" placeholder="Valid phone Number"
                               required pattern="0[0-9]{9}">

                        <div class="invalid-feedback">
                            Please enter a phone number for client
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address2">Phone</label>
                        <input type="date" class="form-control" id="bdate" name="bday" placeholder="Valid birthday">
                        <div class="invalid-feedback">
                            Please enter a valid day
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="address2">Gender</label>
                        <label class="radio-inline form-control">
                            <input type="radio" name="gender" value="M" checked>Male
                        </label>
                        <label class="radio-inline form-control">
                            <input type="radio" name="gender" value="F">Female
                        </label>
                    </div>

                    <div class="mb-3">
                        <label for="address2">Employee type</label>
                        <label class="radio-inline form-control">
                            <input type="radio" name="etype" value="admin" checked>Administrator
                        </label>
                        <label class="radio-inline form-control">
                            <input type="radio" name="etype" value="rep">Representative
                        </label>
                        <label class="radio-inline form-control">
                            <input type="radio" name="etype" value="officer">Officer
                        </label>
                        <label class="radio-inline form-control">
                            <input type="radio" name="etype" value="manager">Manager
                        </label>
                    </div>

                    <!--<div class="mb-3">
                      <label for="address2">Birthday</label>
                      <input type="tel" class="form-control" id="datepicker" name="bday">
                      <div class="invalid-feedback">
                        Please enter a valid Phone number
                      </div>
                    </div>-->


                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Create new Employee</button>
                </form>
            </div>
        </div>


    </div>

<div style="height:50px">
</div>

      <footer class="page-footer font-small mdb-color lighten-3 pt-4">

<!-- Footer Links -->
<div class="container text-center text-md-left">

  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-md-4 col-lg-3 mr-auto my-md-4 my-0 mt-4 mb-1">

      <!-- Content -->
      <h5 class="font-weight-bold text-uppercase mb-4">Footer Content</h5>
      <p>Here you can use rows and columns here to organize your footer content.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit amet numquam iure provident voluptate esse
        quasi, veritatis totam voluptas nostrum.</p>

    </div>
    <!-- Grid column -->

    <hr class="clearfix w-100 d-md-none">

    <!-- Grid column -->
    <div class="col-md-2 col-lg-2 mx-auto my-md-4 my-0 mt-4 mb-1">

      <!-- Links -->
      <h5 class="font-weight-bold text-uppercase mb-4">About</h5>

      <ul class="list-unstyled">
        <li>
          <p>
            <a href="#!">PROJECTS</a>
          </p>
        </li>
        <li>
          <p>
            <a href="#!">ABOUT US</a>
          </p>
        </li>
        <li>
          <p>
            <a href="#!">BLOG</a>
          </p>
        </li>
        <li>
          <p>
            <a href="#!">AWARDS</a>
          </p>
        </li>
      </ul>

    </div>
    <!-- Grid column -->

    <hr class="clearfix w-100 d-md-none">

    <!-- Grid column -->
    <div class="col-md-4 col-lg-3 mx-auto my-md-4 my-0 mt-4 mb-1">

      <!-- Contact details -->
      <h5 class="font-weight-bold text-uppercase mb-4">Address</h5>

      <ul class="list-unstyled">
        <li>
          <p>
            <i class="fa fa-home mr-3"></i> New York, NY 10012, US</p>
        </li>
        <li>
          <p>
            <i class="fa fa-envelope mr-3"></i> info@example.com</p>
        </li>
        <li>
          <p>
            <i class="fa fa-phone mr-3"></i> + 01 234 567 88</p>
        </li>
        <li>
          <p>
            <i class="fa fa-print mr-3"></i> + 01 234 567 89</p>
        </li>
      </ul>

    </div>
    <!-- Grid column -->

    <hr class="clearfix w-100 d-md-none">

    <!-- Grid column -->
    <div class="col-md-2 col-lg-2 text-center mx-auto my-4">

      <!-- Social buttons -->
      <h5 class="font-weight-bold text-uppercase mb-4">Follow Us</h5>

      <!-- Facebook -->
      <a type="button" class="btn-floating btn-fb">
        <i class="fa fa-facebook"></i>
      </a>
      
    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

</div>
<!-- Footer Links -->

<!-- Copyright -->
<div class="footer-copyright text-center py-3">© 2018 Copyright:
  <a href=""> MicroFinance</a>
</div>
<!-- Copyright -->

</footer>
</main>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../js/vendor/jquery/jquery.min.js"></script>
    <script src="../js/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict';

        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

</body>
</html>
