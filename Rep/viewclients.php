<?php
require_once '../Classes/rep.php';
require_once '../dbOperations/dbconnect.php';
require_once '../dbOperations/session.php';
require_once '../login/checklogin.php';
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Clients Page</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          <link href="../css/custom.css" rel="stylesheet">
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
                    <a class="nav-link" href="rephome.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="viewclients.php">View my Clients</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="createstakeholder.php">Create Stakeholder <span
                                class="sr-only"></span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="viewpdetails.php">View Personal Info <span
                                class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form class="form-inline mt-2 mt-md-0" action="../login/logout.php">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
            </form>
        </div>
    </nav>
</header>

<main role="main">

    <div class="py-5 text-center" style="margin-top: 30px;">
        <h2>View my clients</h2>
    </div>

    <div>


        <?php

        $dataconnect = new DbConnect();
        $database = $dataconnect->connect();

        //$uid = $_SESSION['uid'];


        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $rep_id = $_SESSION['rep']->getRepId();
        $result = mysqli_query($database, "SELECT * FROM clients WHERE rep_id='$rep_id'");


        echo "<table class='table'>
      <thead>
      <tr>
      <th>Client id</th>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Email</th>
      <th>Telephone</th>
      <th>Address</th>
      </tr>
      </thead>
      <tbody>";

        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['client_id'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['tele_phone'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td> <form action='profile.php' method='post'><input type='hidden' name='name' value='", $row['client_id'], "'><input class='btn btn-primary btn-sm' type='submit' name='submit' value='View'></form>";
            echo "</tr>";
        }
        echo "</tbody></table>";
        ?>
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
<script src="../js/vendor/jquery/jquery.min.js"></script>
    <script src="../js/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
