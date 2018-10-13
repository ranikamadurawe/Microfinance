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
                    <a class="nav-link" href="adminhome.php">Home</a>
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
    <div style="margin-top:100px;">

    </div>
    <h1>Welcome Admin</h1>


    <div id="content" class="col-lg-10 col-sm-10">

        <div class="container">
            <div class="py-5 text-center" style="margin-top: 30px;">
                <h2>Grant Access</h2>
            </div>
            <div class="row">
                <div class="col-md-8 order-md-1">

                    <?php
                    require_once '../dbOperations/dbconnect.php';

                    $dataconnect = new DbConnect();
                    $link = $dataconnect->connect();
                    $query = "SELECT * FROM pendingclients  ";
                    $result = mysqli_query($link, $query);

                    echo "<table class='table'>
                          <thead>
                          <tr>
                              <th><b>Pending ID</b></th>
                              <th><b>Client First Name</b></th>
                              <th><b>Client Last Name</b></th>
                              <th><b>Client Username</b></th>
                              <th><b>Client Birthday</b></th>
                              <th><b>Client Address</b></th>
                              <th><b>Create/Remove Account</b></th>


                          </tr>
                          </thead>
                          <tbody>";

                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['pending_id'] . "</td>";
                        echo "<td>" . $row['first_name'] . "</td>";
                        echo "<td>" . $row['last_name'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['bday'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td><form action='../dbOperations/addUser.php' method='post'><input type='hidden' name='name' value='", $row['pending_id'], "'><input class='btn btn-primary btn-sm' type='submit' name='submit' value='Grant'></form>
                              <form action='../dbOperations/RemoveRequest.php' method='post'><input type='hidden' name='name' value='", $row['pending_id'], "'><input class='btn btn-primary btn-sm' type='submit' name='submit' value='Remove'></form></td>";


                    }
                    echo "</tbody></table>";


                    ?>


                </div>


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
