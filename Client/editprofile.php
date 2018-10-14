<?php
require_once '../Classes/client.php';
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


    <script src="js/jquery.min.js"></script>
    <script src="../js/browsfile.js"></script>

    <title>Edit my profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="../css/custom.css" rel="stylesheet">
    <?php
    require_once "../Images.php";
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
<div id="content" class="col-lg-10 col-sm-10">
                <h1 align="center"><b>Edit Profile</b></h1>
                
        <div class="container">
        <div class=" row" align="center">
                    <div class="col-md-8">
                    </div>
                    <div class="col-md-2" align="right">
                        <a onclick="document.getElementById('id01').style.display='block'"" id="show-project-a">
                        <div class="img-box">
                            <div class="img" align="left">
                                <?php
                                $display = new Images('client');
                                $display->display();
                                ?>

                            </div>
                        </div>
                        </a>

                    </div>
                    <div class="col-md-8">
                    </div>

                    <!-- start popup form -->
                    <!-- The Modal -->
                    <div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'"
        class="close" title="Close Modal">&times;</span>

                        <!-- Modal Content -->
                        <form action=../dbOperations/dbchangeprofilepic.php method="POST" enctype="multipart/form-data"
                              class="modal-content animate">
                            <h1>Change Profile Photo</h1>
                            <div class="imgcontainer">
                                <?php
                                require_once '../dbOperations/dbconnect.php';

                                $dataconnect = new DbConnect();
                                $database = $dataconnect->connect();
                                $id = $_SESSION['client']->getId();
                                $query = "SELECT * FROM clients WHERE client_id='$id'";
                                $result = mysqli_query($database, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                    if ($row['photo'] != null) {
                                        echo '<img  height="300" width="300" alt="Avatar" src="data:photo;base64,' . $row['photo'] . '" >';
                                    } else {
                                        echo '<img  height="200" width="300" alt="Avatar" src="..\Images\db.png" alt="Avatar">';
                                    }
                                }
                                ?>
                            </div>

                            <div class="container" style="margin-top:10px; margin-bottom:10px;"
                            ">
                            <div>
                                <input type="file" name="image" class="btn btn-primary" id="fileLoader"
                                       style="display:none;"/></input>

                            </div>

                            <div class="col-md-8">

                                <input type="button" id="btnOpenFileDialog" value="Browse Photo"
                                       onclick="openfileDialog();"
                                       class="btn btn-primary"/>
                                <button type="submit" value="update" name="update" class="btn btn-primary">
                                    <span>Upload</span></button>

                                <button type="button" onclick="document.getElementById('id01').style.display='none'"
                                        class="btn btn-primary">Cancel
                                </button>

                            </div>

                            <div class="col-md-4">
                            </div>


                    </div>


                    </form>
                </div>
                <!-- end popup form -->

                <div class="col-lg-10">
                    <?php
                    $dataconnect = new DbConnect();
                    $database = $dataconnect->connect();
                    $id = $_SESSION['client']->getId();
                    $query = "SELECT * FROM clients WHERE client_id='$id'";

                    $result = mysqli_query($database, $query);

                    if ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <form action=../dbOperations/dbprofile.php method="POST" class="editprofile"
                              enctype="multipart/form-data">
                            <table style='margin-top:50px;' class="table">

                                <tr>
                                    <td class="lcolumn" width="20%"><label for="full name">First Name </label> :</td>
                                    <td><?php echo '<input type="textarea" class="form-control" name="firstname" value=' . $row['first_name'] . ' pattern="[A-Za-z]{2,}" title = "Name Only can Contains letters" class="add1" ></br>' ?></td>

                                </tr>
                                <tr>
                                    <td class="lcolumn" width="20%"><label for="full name">Last Name </label> :</td>
                                    <td><?php echo '<input class="form-control" type="textarea" name="lastname" value=' . $row['last_name'] . ' pattern="[A-Za-z]{2,}" title = "Name Only can Contains letters" class="add1" ></br>' ?></td>
                                </tr>

                                <tr>
                                    <td class="lcolumn"><label for="id">NIC Number </label> :</td>
                                    <td><?php echo '<label  name="nic" class="add1">' . $row['nic'] . '</label></br>' ?></td>
                                </tr>
                                <tr>
                                    <td class="lcolumn"><label for="email">E-Mail </label> :</td>
                                    <td><?php echo '<input class="form-control" type="text" name="email" value=' . $row['email'] . ' class="add1" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title ="example@example.domain"></br>' ?></td>
                                </tr>
                                <tr>
                                    <td class="lcolumn"><label for="birthday">Birthday </label> :</td>
                                    <td><?php echo '<label  name="birthday" class="add1">' . $row['birthday'] . '</label></br>' ?></td>
                                </tr>
                                <tr>
                                    <td class="lcolumn"><label for="gender">Sex </label> :</td>
                                    <td><?php echo '<label  name="gender" class="add1">' . $row['gender'] . '</label></br>' ?></td>
                                </tr>
                                <tr>
                                    <td class="lcolumn"><label>Maritual Status </label> :</td>
                                    <td><?php echo '<select name="position" class="form-control" placeholder="Maritual Status" required>
                            <option  value=""selected data-default hidden>Pleace Choose one</option>
                              <option value="Married" class="addop">Married</option>
                              <option value="Single" class="addop">Single</option>

                            </select></br>' ?></td>
                                </tr>
                                <tr>
                                    <td class="lcolumn"><label for="telephone">TP Number </label> :</td>
                                    <td><?php echo '<input  class="form-control" type="text" name="telephone" value=' . $row['tele_phone'] . ' class="add1" minlength="10" maxlength="10" pattern="[0-9]{2,}" title=" Only numbers can add "></br>' ?></td>
                                </tr>
                                <tr>
                                    <td class="lcolumn"><label for="accnum">Acc Number</label> :</td>
                                    <td><?php echo '<label  name="accnum" class="add1">' . $row['acc_no'] . '</label></br>' ?></td>
                                </tr>
                                <tr>
                                    <td class="lcolumn"><label for="branch">Branch </label> :</td>
                                    <td><?php echo '<label  name="branch" class="add1">' . $row['branch'] . '</label></br>' ?></td>
                                </tr>
                                <tr>
                                    <td class="lcolumn"><label for="adress">Address </label> :</td>
                                    <td><?php echo '<input class="form-control" type="text" name="address" value=' . $row['address'] . ' class="add1" ></br>' ?></td>
                                </tr>

                                <tr>
                                    <td class="bottom" colspan="2">
                                        <button type="submit" value="update" name="update" class="btn btn-primary">
                                            <span>UPDATE</span></button>
                                    </td>
                                </tr>

                            </table>
                        </form>
                        <?php
                    }
                    ?>

                </div>


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
<script type=text/javascript>
    function openfileDialog() {
        $("#fileLoader").click();
    }
</script>
</body>
</html>

