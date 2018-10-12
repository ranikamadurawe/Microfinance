<?php
    require_once '../Classes/rep.php';
    require_once '../dbOperations/dbconnect.php';
    require_once '../dbOperations/session.php';
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
                <li class="nav-item active">
                    <a class="nav-link" href="rephome.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="createstakeholder.php">Create new client</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="viewpdetails.php">View Personal Info</a>
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
    <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017-2018 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
    </footer>
</main>
</body>
</html>
