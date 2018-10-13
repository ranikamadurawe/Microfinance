<?php
include_once '../login/loginfirst.php';
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

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
                    <a class="nav-link" href="clienthome.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="loanapplication.php">Apply for loan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="addUserRequest.php">Add Request</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="viewprofile.php">View my Personal Data</a>
                </li>
            </ul>
            <form class="form-inline mt-2 mt-md-0" action="../login/logout.php">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
            </form>
        </div>
    </nav>
</header>

<main role="main">
    <div style="margin-top:100px;">

    </div>
    <div class="container">
    <h1>Apply for Loan</h1>

      <div class="row">
      <form  method ='POST' action="../dbOperations/loanApplication.inc.php">
      <p>Please fill in this form to apply for loan</p>
      <div class="mb-6">
      <label for="loan_amount"><b>loan amount</b></label><br>
      <input class="form-control" type="number" placeholder="Enter loan amount" name="loan_amount" required>
      </div>
      

       <div class="mb-6">
              <label for="interest_rate"><b>Interest_rate</b></label><br>
      <input class="form-control" disabled type="number" name="interest_rate" value=12.5>
      </div>


              <div class="mb-6">
              <label for="duration"> <b>Duration</b></label><br>
      <input class="form-control" type="number" name="duration" required><br> 
      </div>


              <div class="mb-6">
              <label for="start_date"> <b>Start date</b></label><br>
      <input class="form-control" type="date" placeholder="Enter start date of the loan" name="start_date" min="2018-01-01" max="2035-12-31" required><br> 
      </div>
 
      <button class="btn btn-primary" name= "submit" type="submit">Submit Application</button>
      </form>
      </div>
    </div>
    
      
      
    <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017-2018 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
    </footer>
</main>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>
