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

    <title>View user request</title>

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
    <div style="margin-top:100px;">

    </div>

    <div class="col-md-12">
        <div class="address">
            <form action="viewUserRequest.php" method="GET">
                <label for="search">Search</label>
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for date..">
                <div class="timetable" style="overflow-x:auto;">
                    <table id="myTable" class="table">
                        <tr>
                            <th>Date</th>
                            <th>UserID</th>
                            <th>Name</th>
                            <th>Request</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "microfinance";

                        // Create connection
                        $con = new mysqli($servername, $username, $password, $dbname);


                        $counter = 0;

                        $result = mysqli_query($con, "SELECT * FROM userrequests");
                        while ($row = mysqli_fetch_array($result)){
                        ?>
                        <tr>
                            <td> <?php echo $row['date']; ?>
                                <input type="hidden" value="<?php echo $row['date']; ?>" name="date[]">
                            </td>
                            <td> <?php echo $row['user_id']; ?>
                                <input type="hidden" value="<?php echo $row['user_id']; ?>" name="userID[]">
                            </td>
                            <td> <?php echo $row['name']; ?>
                                <input type="hidden" value="<?php echo $row['name']; ?>" name="name[]">
                            </td>
                            <td> <?php echo $row['request']; ?>
                                <input type="hidden" value="<?php echo $row['request']; ?>" name="request[]">
                            </td>
                            <td><?php echo $row['status']; ?>
                                <input type="hidden" value="<?php echo $row['status']; ?>" name="status[]">
                            </td>
                            <td>
                            </td>
                            <td>
                                <?php
                                echo "<a href='../dbOperations/changeStatus.php?status=pending&reqID=" . $row['request_id'] . "' class='btn'>Pending</a>
       <a href='../dbOperations/changeStatus.php?status=done&reqID=" . $row['request_id'] . "' class='btn'>Done</a>";
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <button class="btn btn-primary" type="submit">Exit</button>
        </div>
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
<script>
    function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    foreach ($_POST['attendance_status'] as $id => $attendance_status) {
        $admission_number = $_POST['admission_number'][$id];
        $date = date("Y-m-d");
        $qry = mysqli_query($con, "SELECT name,class FROM student WHERE admission_number='$admission_number'");
        $crow = mysqli_fetch_array($qry);
        $name = $crow['name'];
        $class = $crow['class'];
        $i = 0;
        $j = 0;
        $i++;
        $Result = mysqli_query($con, "INSERT INTO attendence(admission_number,name,class,attended,date) VALUES ('$admission_number','$name','$class','$attendance_status','$date')");
        if ($Result) {
            $j++;
        }

    }
    if ($i == $j) {
        Print '<script>alert("Attendence recorded successfully!");</script>';
        echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"1; 'hometeacher.php'\">";
    } else {
        Print '<script>alert("An Error Occured while recoding!");</script>';
        echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"1; 'studentattendence.php'\">";
    }
}
?>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>
