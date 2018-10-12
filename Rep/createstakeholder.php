

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
            <li class="nav-item active">
              <a class="nav-link" href="rephome.php">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="viewclients.php">View my Clients</a>
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




      <div class="container">
        <div class="py-5 text-center" style="margin-top: 30px;">
          <h2>Create new Client</h2>
        </div>


        <div class="row">
          <div class="col-md-8 order-md-1">
            <form class="needs-validation" novalidate action="../dbOperations/createStake.php" method="POST">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="firstName">First name</label>
                  <input type="text" name="fname" class="form-control" id="firstName" placeholder="" value="" required>
                  <div class="invalid-feedback">
                    Valid first name is required.
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="lastName">Last name</label>
                  <input type="text" name="lname" class="form-control" id="lastName" placeholder="" value="" required>
                  <div class="invalid-feedback">
                    Valid last name is required.
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <label for="username">Username</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                  </div>
                  <input type="text" class="form-control" name="uname" id="username" placeholder="Username" required>
                  <div class="invalid-feedback" style="width: 100%;">
                    Users desired Username is required
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <label for="address">NIC</label>
                <input type="text" class="form-control" id="nic" name="nic" placeholder="123456789V" pattern="[0-9]{9}[vV]"  required>
                <div class="invalid-feedback">
                  Please enter a valid NIC
                </div>
              </div>

              <div class="mb-3">
                <label for="email">Email <span class="text-muted">(Optional)</span></label>
                <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
                <div class="invalid-feedback">
                  Please enter a valid email address
                </div>
              </div>

              <div class="mb-3">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>
                <div class="invalid-feedback">
                  Please enter the Address
                </div>
              </div>

              <div class="mb-3">
                <label for="address2">Phone</label>
                <input type="tel" class="form-control" id="tel" name="phone" placeholder="Valid phone Number" required pattern="0[0-9]{9}">

                <div class="invalid-feedback">
                  Please enter a phone number for client
                </div>
              </div>

              <div class="mb-3">
                <label for="address2">Phone</label>
                <input type="date" class="form-control" id="bdate" name="bday" placeholder="Valid birthday" >
                <div class="invalid-feedback">
                  Please enter a valid day
                </div>
              </div>



              <div class="mb-3">
                <label for="address2">Gender</label>
                <label class="radio-inline form-control">
                    <input type="radio" name="gender" value="M" checked>Male
                  </label>
                  <label class="radio-inline form-control">
                    <input type="radio" name="gender" value="F" >Female
                  </label>
              </div>

              <!--<div class="mb-3">
                <label for="address2">Birthday</label>
                <input type="tel" class="form-control" id="datepicker" name="bday">
                <div class="invalid-feedback">
                  Please enter a valid Phone number
                </div>
              </div>-->



              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block" type="submit" >Create new Client</button>
            </form>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
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
