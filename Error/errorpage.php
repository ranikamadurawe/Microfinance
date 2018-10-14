
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>page not found</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="css/Custom.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>

    <header>
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="#">Micro Finance</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
      
        <!-- Links -->
        <ul class="navbar-nav mrl-auto">
          <?php
              session_start();
              if(isset($_SESSION['type'])){
                if($_SESSION['type']=='client'){
                  echo ' <li class="nav-item">
                  <a class="nav-link" href="../Client/clienthome.php">Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="../Client/loanapplication.php">Apply for loan</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="../Client/addUserRequest.php">Add Request</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="../Client/viewprofile.php">View my Personal Data</a>
              </li>';
              }else if($_SESSION['type']=='rep'){
                  echo '           <li class="nav-item">
                  <a class="nav-link" href="../Rep/rephome.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="../Rep/viewclients.php">View my Clients</a>
              </li>
              <li class="nav-item ">
                  <a class="nav-link" href="../Rep/createstakeholder.php">Create Stakeholder <span
                              class="sr-only"></span></a>
              </li>
              <li class="nav-item ">
                  <a class="nav-link" href="../Rep/viewpdetails.php">View Personal Info <span
                              class="sr-only">(current)</span></a>
              </li>';
              }else if($_SESSION['type']=='officer'){
                  echo '           <li class="nav-item">
                  <a class="nav-link" href="../Officer/officerhome.php">Home</a>
              </li>
              <li class="nav-item ">
                  <a class="nav-link" href="../Officer/viewloanrequests.php">View Loan Requests <span
                              class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item ">
                  <a class="nav-link" href="../Officer/viewpdetails.php">View Personal Info <span
                              class="sr-only">(current)</span></a>
              </li>';
              }else if($_SESSION['type']=='manager'){ 
                  echo ' <li class="nav-item">
                  <a class="nav-link" href="../Manager/managerhome.php">Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="../Manager/viewloanrequests.php">View Loan Requests <span
                              class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="../Manager/viewpdetails.php">View Personal Info <span
                              class="sr-only">(current)</span></a>
              </li>';
              }else if($_SESSION['type']=='admin'){
                  echo '                <li class="nav-item">
                  <a class="nav-link" href="../Admin/adminhome.php">Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="../Admin/araccounts.php">Accept Revoke Accounts</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="../Admin/viewdetails.php">View Personal Info</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="../Admin/viewUserRequest.php">View User Requests</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="../Admin/newemployee.php">Create New Employee</a>
              </li>';
              }
              }else{
                echo '  
                <li class="nav-item active">
    
                </li>
                <li class="nav-item">
    
                </li>
                <li class="nav-item">
    
                </li>
              ';
              }
          ?>
 
      
          <!-- Dropdown -->
          
        </ul>
        <?php
          if(isset($_SESSION)){
            echo '            <form class="form-inline mt-2 mt-md-0" action="../login/logout.php">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
        </form>';
          }else{
            echo '          <form class="form-inline mt-2 mt-md-0" action="../login/login.php">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button>
          </form>';
          }
        ?>
      </div>
      </nav>
    </header>

     <div class="jumbotron">
            <center><h1 class="display-4">Sorry ! </h1></center>    
            <center><h1 class="display-4">Page you requested is not found. Please click on the link below to go to home page.</h1></center>
            <br>
            <?php
              if(isset($_SESSION['type'])){
                if($_SESSION['type']=='client'){
                  echo '<center><a class="btn btn-primary btn-lg" href="../Client/clienthome.php" role="button">Home</a>';
                }else if($_SESSION['type']=='rep'){
                  echo '<center><a class="btn btn-primary btn-lg" href="../Rep/rephome.php" role="button">Home</a>';
                }else if($_SESSION['type']=='officer'){
                  echo '<center><a class="btn btn-primary btn-lg" href="../Officer/officerhome.php" role="button">Home</a>';
                }else if($_SESSION['type']=='manager'){ 
                  echo '<center><a class="btn btn-primary btn-lg" href="../Manager/managerhome.php" role="button">Home</a>';
                }else if($_SESSION['type']=='admin'){
                  echo '<center><a class="btn btn-primary btn-lg" href="../Admin/adminhome.php" role="button">Home</a>';
                }
              }else{
                echo '<center><a class="btn btn-primary btn-lg" href="../index.php" role="button">Home</a>';
              }
            ?>

            
            </center>
      </div>


     <!-- Footer -->
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
      <!-- Footer -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="js/vendor/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="js/vendor/holder.min.js"></script>
  </body>
</html>
