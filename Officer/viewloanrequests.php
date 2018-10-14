<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>View Loan Requests</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="../css/custom.css" rel="stylesheet">

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
                    <a class="nav-link" href="officerhome.php">Home</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="viewloanrequests.php">View Loan Requests <span
                                class="sr-only">(current)</span></a>
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
    <div style="margin-top:100px;">

    </div>
    <h1>Loan Requests</h1>
    <div id="loan_list">
        <?php
        require_once '../login/checklogin.php';
        if (isset($_GET['loan_id']) && !empty($_GET['loan_id'])) {
            $loan_id = $_GET['loan_id'];
            file_put_contents('/var/www/html/god.txt', "------------------".PHP_EOL, FILE_APPEND);
            $query = "SELECT `client_id`, CONCAT(`first_name`, ' ', `last_name`), `approved`" .
                "FROM `clients` NATURAL JOIN `loanapplications`" .
                "WHERE `loan_id` = '$loan_id' " .
                "LIMIT 1";

            $dbconn = mysqli_connect("localhost", "jester","mafia","microfinance");
            $result = mysqli_fetch_row(mysqli_query($dbconn, $query));
            if ($result) {
                $customer_id = $result[0];
                $customer_name = $result[1];
                $approved_status = $result[2];
                if (isset($_GET['approve'])) {
                    $query = "UPDATE `loanapplications`" .
                        "SET `approved` = 'approved'" .
                        "WHERE `loan_id` = '$loan_id' " .
                        "LIMIT 1";
                    $aproval_status = "approved";
                } else if (isset($_GET['reject'])) {
                    $query = "UPDATE `loanapplications`" .
                        "SET `approved` = 'rejected'" .
                        "WHERE `loan_id` = '$loan_id' " .
                        "LIMIT 1";
                    $aproval_status = "disaproved";
                } else if (isset($_GET['reset'])) {
                    $query = "UPDATE `loanapplications`" .
                        "SET `approved` = 'pending' " .
                        "WHERE `loan_id` = '$loan_id' " .
                        "LIMIT 1";
                    $aproval_status = "Reset";
                }else if (isset($_GET['verify'])){
                    $query = "UPDATE `loanapplications`" .
                    "SET `approved` = 'verified' " .
                    "WHERE `loan_id` = '$loan_id' " .
                    "LIMIT 1";
                $aproval_status = "Verified";
                }
                
                file_put_contents('/var/www/html/god.txt', "setv".isset($_GET['verify']).PHP_EOL, FILE_APPEND);
                file_put_contents('/var/www/html/god.txt', "setv".isset($_GET['loan_id']).PHP_EOL, FILE_APPEND);
                $result = mysqli_query($dbconn, $query);
                mysqli_close($dbconn);
                if ($result) {
                    echo "</br>"
                        . "<div align='center'>Customer $customer_id, $customer_name's loan application $loan_id has $aproval_status Successfully.</div>"
                        . "<br>"
                        . "<div align='right'><a class='_button' href='viewloanrequests.php'><-Back to List</a></div>";
                }
            }
            ?>
            <?php
        } else {
            ?>

            <div id="Search bar" align="right">
                <form action="" method="GET">
                    <input required id="search_id" name="search_id" type="text" placeholder="Customer ID">
                    <input class="btn btn-primary" type="submit" value="Search">
                </form>
            </div>
            </br>

            <?php
            if (isset($_GET['search_id']) && !empty($_GET['search_id'])) {
                $search_text = $_GET['search_id'];
                $query = "SELECT `client_id`, `loan_id`, CONCAT(`first_name`, ' ', `last_name`), `approved`" .
                    "FROM `clients` NATURAL JOIN `loanapplications`" .
                    "WHERE `client_id` LIKE '$search_text%' OR CONCAT(`first_name`, ' ', `last_name`) LIKE '%$search_text%' OR `loan_id` LIKE '$search_text%'";
                echo "<div align='left'><a class='_button' href='viewloanrequests.php'><-Back to Full List</a></br></br></div>";
            } else {
                $query = "SELECT `client_id`, `loan_id`, CONCAT(`first_name`, ' ', `last_name`), `approved`" .
                    "FROM `clients` NATURAL JOIN `loanapplications`";
            }
            $dbconn =mysqli_connect("localhost", "jester","mafia","microfinance");
            $result = mysqli_query($dbconn, $query);
            mysqli_close($dbconn);
            if ($result) {
                echo '<table class="table">' .
                    '<tr><th>Client ID</th><th>Loan ID</th><th>Name</th><th>Current Status</th><th>Action</th></tr>';

                while ($customer = mysqli_fetch_row($result)) {
                    $status = $customer[3];
                    echo
                        '<tr>'
                        . '<td width="auto"><a class="_button" href="profile.php?client_id=' . $customer[0] . '">' . $customer[0] . '</a></td>'
                        . '<td width="auto""><a class="_button" href="viewloandetails.php?loan_id=' . $customer[1] . '">' . $customer[1] . '</a></td>'
                        . '<td width="auto"">' . $customer[2] . '</td>'
                        . '<td width="auto"">' . $status . '</td>'
                        . '<td align="center">';
                    if ($status == 'rejected' or $status == 'approved'){
                        echo 'loan has been processed by manager';
                    }else if ($status == 'pending') {
                        echo '<a class="_button" href="?loan_id=' . $customer[1] . '&verify=#">Verify</a></br>';
                    } else {
                        echo '</br><a class="_button" href="?loan_id=' . $customer[1] . '&reset=#">Reset</a>';
                    }
                    echo '</td>'
                        . '</tr>';
                }
                echo '</table>';

            }

        }
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
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>
