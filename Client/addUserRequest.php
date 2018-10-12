<?php>
include_once '../loginfirst.php';
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
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>

    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Microfinance</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="clienthome.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="viewprofile.php">View Personal Data</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="loanapplication.php">Apply for loan</a>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0" action="../logout.php">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
          </form>
        </div>
      </nav>
    </header>

    <main role="main">
      <div style="margin-top:100px;">

      </div>
      <div class="banner">
         <h1>Add User Request</h1>
      </div>
      <form action="addUserRequest.php" method="POST">
            User ID: <input type="text" name="userID" required="userID"/> <br/> <br/>
            UserName:  <input type="text" name="userName" required="userName"/> <br/> <br/>
            Enter your request:<br/> <textarea rows="4" cols="50" name="request" required="required"> </textarea><br/> <br/>
            <input type="submit" value="SUBMIT"/>
      </form>
      <?php
      include_once '../dbOperations/dbconnect.php';
         if($_SERVER["REQUEST_METHOD"] == "POST"){

             $dataconnect = new DbConnect();
             $link = $dataconnect->connect(); //Connect to database.

         $userID = htmlentities($_POST['userID']);
         $name = ($_POST['userName']);
         $request =($_POST['request']);
         $date = date('Y-m-d H:i:s');
         $status = "pending";
         $qry = mysqli_query($link,"INSERT INTO userRequest (userID, name, request, date, status) VALUES ('$userID','$name', '$request', '$date', ' $status')");

   if($qry){
   Print '<script>alert("Successfully Recorded!");</script>'; //
   Print '<script>window.location.assign("addUserRequest.php");</script>';
}
}

?>
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
