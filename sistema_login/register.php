<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="./assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="./assets/images/favicon.ico" />

    <!-- Validacion de contraseñas -->
    <script>
function checkPasswordMatch() {
    var password = document.getElementById("exampleInputPassword1").value;
    var confirmPassword = document.getElementById("exampleConfirmPassword").value;
    var errorDiv = document.getElementById("passwordError");

    if (password !== confirmPassword) {
        errorDiv.textContent = "Las contraseñas no coinciden";
    } else {
        errorDiv.textContent = "";
    }
}

function validatePassword() {
    var password = document.getElementById("exampleInputPassword1").value;
    var confirmPassword = document.getElementById("exampleConfirmPassword").value;
    var errorDiv = document.getElementById("passwordError");

    if (password !== confirmPassword) {
        errorDiv.textContent = "Las contraseñas no coinciden";
        return false;
    } else {
        errorDiv.textContent = "";
        return true;
    }
}


    </script>
    <!-- Validacion de contraseñas -->

  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="./assets/images/logo.svg">
                </div>
                <h4>New here?</h4>
                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                <form class="pt-3" id="registerForm" method="post" action="sistema_login/register_process.php">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="name" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="last_name" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control form-control-lg" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password" placeholder="Password" onkeyup="checkPasswordMatch()">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg" id="exampleConfirmPassword" name="confirmPassword" placeholder="Confirm Password" onkeyup="checkPasswordMatch()">
                    </div>
                    <div id="passwordError" style="color: red;"></div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" onclick="validatePassword()">SIGN UP</button>
                    </div>
                    <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="/purple/inicio" class="text-primary">Login</a>
                    </div>
                </form>

              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="./assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>