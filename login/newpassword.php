

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>New Password</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../css/view.css" rel="stylesheet">
  </head>
  <body>

    
    <main role="main">

        <div class="py-5 text-center" >
        <h1>Your first login Please change your password</h1>
        </div>

      


      <form method="post" novalidate class="form-password" action="../dbOperations/changepassword.php">
        <div  class="py-5 text-center"><h2 class="h3 mb-3 font-weight-normal">New password form</h2></div>

        
        <div  >
          <label for="inputEmail" class="sr-only">New Password</label>
          <input type="password" id="inputpassword" class="form-control" name="inputpassword" placeholder="Password" required autofocus>
          <div class="invalid-feedback">
            Required
          </div>
        </div>
        <div >
          <label for="inputPassword" class="sr-only">Reconfirm Password</label>
          <input type="password" id="inputPassword2" class="form-control" name="inputpassword2" placeholder="Reconfirm Password" required>
          <div class="invalid-feedback">
            Required
          </div>
        </div>
        <div style="height:10px;">
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Change Password</button>
      </form>


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
          var forms = document.getElementsByClassName('form-password');
          console.log("ds");
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                console.log("Rda");
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
