<?php
$message = '';
 if(isset($_POST['btn'])){
     require_once '../class/login.php';
     $login = new Login();
     $message = $login->admin_login_check($_POST);
 }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Login Page</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap3.css" rel="stylesheet">
  </head>

  <body>
      <div class="container">
          <div class="row">
              <div class="col-md-offset-4 col-md-8">
                  <div class="well" style="margin-top: 10px; padding: 50px 40px;; ">
                      <h2 class="text-center text-success">Please Use Valid Email and Password</h2>
                      <h4 class="text-center text-danger"><?php if(isset($message)){
                            echo $message;
                            unset($message);
                      } ?></h4>
                      <hr>
                      <form class="form-horizontal" action="" method="POST">
                          <div class="form-group">
                              <label class="control-label col-md-3">Email Address:</label>
                              <div class="col-md-9">
                                  <input class="form-control" type="email" name="email_address" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="control-label col-md-3">Password:</label>
                              <div class="col-md-9">
                                  <input class="form-control" type="password" name="password" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-md-offset-3 col-md-9">
                                  <input class="btn btn-success" type="submit" name="btn" value="Login">
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>

      <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
      <script src="../vendor/bootstrap/js/bootstrap3.min.js"></script>
  </body>
</html>
