<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Profile</title>
    <?php
    require_once '../dbOperations/dbconnect.php';
    include_once "../Images.php";
    ?>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom styles for this template -->
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
            <a class="nav-link" href="loanapplication.php">Apply for loan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="addUserRequest.php">Add Request</a>
          </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0" action="../logout.php">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
        </form>
      </div>
    </nav>
  </header>

<main role="main">


    <div id="content" class="col-lg-10 col-sm-10">
        <h1 align="center"><b>Client Profile</b></h1>
        <div class="container">
          <div class=" row" align="center">
              <div class="col-md-8">
              </div>
              <div class="col-md-2" align="right">

                  <div>
                      <div class="img" align="left">
                          <?php
                          $display = new Images('client');
                          $display->display();
                          ?>

                      </div>
                  </div>


              </div>
              <div class="col-md-8">
              </div>

              <div class="col-lg-10" align="left">
                  <?php

                  //Get userid from session
                  //$provided_sname = trim( $_SESSION['name'] );

                  $dataconnect = new DbConnect();
                  $link = $dataconnect->connect();
                  //$query="select * from teacher where nic='{$_SESSION['nic']}'";
                  $query = "SELECT * FROM clients WHERE client_id = 1";
                  $result = mysqli_query($link, $query);

                  while ($row = mysqli_fetch_array($result)) {
                      ?>
                      <form action=../Client/editprofile.php method="POST">
                          <table style='margin-top:50px;' class="table">

                              <tr>
                                  <td class="lcolumn" width="20%"><label for="full name">Full Name </label> :</td>
                                  <td><?php echo '<label  name="fullname" class="add1">' . $row['first_name'] . ' ' . $row['lname'] . '</label></br>' ?></td>
                              </tr>
                              <tr>
                                  <td class="lcolumn" width="20%"><label for="id">ID Number </label> :</td>
                                  <td><?php echo '<label  name="nic" class="add1">' . $row['nic'] . '</label></br>' ?></td>
                              </tr>
                              <tr>
                                  <td class="lcolumn" width="20%"><label for="email">E-Mail </label> :</td>
                                  <td><?php echo '<label  name="email" class="add1">' . $row['email'] . '</label></br>' ?></td>
                              </tr>
                              <tr>
                                  <td class="lcolumn" width="20%"><label for="birthday">Birthday </label> :</td>
                                  <td><?php echo '<label  name="birthday" class="add1">' . $row['birthday'] . '</label></br>' ?></td>
                              </tr>
                              <tr>
                                  <td class="lcolumn" width="20%"><label for="gender">Sex </label> :</td>
                                  <td><?php echo '<label  name="gender" class="add1">' . $row['gender'] . '</label></br>' ?></td>
                              </tr>
                              <tr>
                                  <td class="lcolumn" width="20%"><label for="phone">TP Number </label> :</td>
                                  <td><?php echo '<label  name="phone" class="add1">' . $row['tele_phone'] . '</label></br>' ?></td>
                              </tr>
                              <tr>
                                  <td class="lcolumn" width="20%"><label for="adress">Address </label> :</td>
                                  <td><?php echo '<label  name="address" class="add1">' . $row['address'] . '</label></br>' ?></td>
                              </tr>
                          </table>
                          <button class="btn btn-primary" type="submit">Edit my Profile</button>

                      </form>
                      <?php
                  }
                  ?>

              </div>


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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
<script src="../../assets/js/vendor/holder.min.js"></script>
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
