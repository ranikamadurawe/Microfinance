

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
              <a class="nav-link" href="adminhome.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="araccounts.php">Accept Revoke Accounts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="viewdetails.php">View Personal Info</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="newemployee.php">Create New Employee</a>
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
      <h1>Welcome Admin</h1>

      <div class="col-md-12">
     <div class="address">
           <form action="viewUserRequest.php" method="GET">
              <label for="search">Search</label>
              <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for date..">
              <div class="timetable" style="overflow-x:auto;">
              <table id="myTable">
             <tr>
              <th>Date</th>
              <th>UserID</th>
              <th>Name</th>
              <th>Request</th>
              <th>Status</th>
              </tr>
              <?php
              $servername = "localhost";
              $username = "madnisal";
              $password = "password";
              $dbname = "my_db";

              // Create connection
              $con = new mysqli($servername, $username, $password, $dbname);


              $counter=0;

              $result = mysqli_query($con, "SELECT * FROM UserRequest");
              while($row=mysqli_fetch_array($result)){
              ?>
              <tr>
              <td> <?php echo $row['date']; ?>
              <input type="hidden" value="<?php echo $row['date']; ?>" name="date[]">
              </td>
              <td> <?php echo $row['userID']; ?>
              <input type="hidden" value="<?php echo $row['userID']; ?>" name="userID[]">
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
              echo "<a href='dbOperations/changeStatus.php?status=pending&userID=".$row['userID']."' class='btn'>Pending</a>
       <a href='dbOperations/changeStatus.php?status=done&userID=".$row['userID']."' class='btn'>Done</a>";
              }
              ?>
              </td>
              </tr>
              </table>
              </div>
           <button type="submit">Exit</button></div>
        </form>
</div>
  </div>
</div>
      <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017-2018 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
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
       if($_SERVER['REQUEST_METHOD'] == "POST"){
          foreach($_POST['attendance_status'] as $id=>$attendance_status){
             $admission_number=$_POST['admission_number'][$id];
             $date=date("Y-m-d");
             $qry=mysqli_query($con,"SELECT name,class FROM student WHERE admission_number='$admission_number'");
             $crow=mysqli_fetch_array($qry);
             $name=$crow['name'];
             $class=$crow['class'];
             $i=0;
             $j=0;
             $i++;
             $Result=mysqli_query($con,"INSERT INTO attendence(admission_number,name,class,attended,date) VALUES ('$admission_number','$name','$class','$attendance_status','$date')");
             if($Result){
                $j++;
             }

          }if($i==$j){
             Print '<script>alert("Attendence recorded successfully!");</script>';
             echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"1; 'hometeacher.php'\">";
          }else{
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
