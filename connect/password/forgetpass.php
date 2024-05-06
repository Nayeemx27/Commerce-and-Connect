<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="img/gshares.png">
    <title>G SHARE | REST PASSWORD</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
  </head>

  <body>
    <div class="container d-flex flex-column"> 
      <div class="row align-items-center justify-content-center
          min-vh-100">
        <div class="col-12 col-md-8 col-lg-4">
          <div class="card shadow-sm">
            <div class="card-body">
              <div class="mb-4">
                <h5>Forgot Password?</h5>
                <p class="mb-2">Enter your registered email ID to reset the password
                </p>
              </div>
              <form method="post" action="../password/forgotpassaction.php">
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" id="email" class="form-control" name="email" placeholder="Enter Your Email"
                    required="">
                </div>
                <div class="mb-3 d-grid">
                  <button type="submit" name="reset" class="btn btn-primary">
                    Reset Password
                  </button>
                </div>
                <span>Don't have an account? <a class="text-decoration-none" href="../Auth/registrationPage.html">sign in</a></span>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>