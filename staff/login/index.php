<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Login | LNU - Student Admission and Information System</title>
  </head>
  <body>



  <div class="content">
    <div class="container">
      <div class="card">
        <div class="row">
          <div class="col-md-6 order-md-2 contents">
            <img src="images/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-6 contents">
            <div class="row justify-content-center">
              <div class="col-md-12">
                <div class="mb-4">
                <h3>Sign In to <strong>LNU - SAIS</strong></h3>
                <p class="mb-4">Please use a verified account in order to sign in to the
                  Student Admission and Information System.</p>
              </div>
              <form action="be/login.php" method="post" enctype="multipart/form-data">
                <div class="form-group first">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" name="username" id="username">

                </div>
                <div class="form-group last mb-4">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password">
                </div>
                <small for="role">Login As</small>
                <div class="form-group last mb-4">
                  <select class="form-control" name="role" id="role">
                    <option value="0">Admin - MIS</option>
                    <option value="1">Admission</option>
                    <option value="2">Examination Officer</option>
                    <option value="3">Unit Head</option>
                    <option value="4">Interviewer</option>
                  </select>
                </div>
                <div class="d-flex mb-5 align-items-center">
                  <label class="control control--checkbox mb-0"><span class="caption">Remember Me</span>
                    <input type="checkbox" checked="checked" name="remember"/>
                    <div class="control__indicator"></div>
                  </label>
                  <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                </div>

                <button type="submit" name="login" class="btn text-white btn-block btn-primary">Log In</button>

                <span class="d-block text-left my-4 text-muted"> Here are the account types</span>

                <div class="social-login">
                  <a href="#" class="facebook">

                  </a>
                  <a href="#" class="twitter">

                  </a>
                  <a href="#" class="google">

                  </a>
                </div>
              </form>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>