<?php
session_start();
if ($_SESSION['admin_id'] == NULL) {
    header('Location: index.php');
}

if (isset($_GET['logout'])) {
    require_once '../class/login.php';
    $login = new Login();
    $login->admin_logout();
}

$message = '';
if (isset($_POST['btn'])) {
    require_once '../class/login.php';
    $reg_admin = new Login();
    $message = $reg_admin->save_admin_info($_POST);
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

    <title>Registration Page</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap3.css" rel="stylesheet">
    <script type='text/javascript'>
            function lattersonly(input){
                var regrex = /[^a-z ]/gi;
                input.value = input.value.replace(regrex, "");
            }
        </script>
  </head>

  <body>
      <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Blog Info</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="dashboard.php">Add Schedule</a></li>
                    <li><a href="mange_Schedule.php">Manage Schedule</a></li>
                    <li><a href="registration.php">Registration</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="">Welcome <strong><?php echo $_SESSION['admin_name']; ?></strong></a></li>
                    <li><a href="?logout=logout">Log Out</a></li>
                </ul>
            </div>
        </nav>
      
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
                              <label class="control-label col-md-3">Name:</label>
                              <div class="col-md-9">
                                  <input class="form-control" type="text" name="admin_name" onkeyup="lattersonly(this)" required>
                              </div>
                          </div>
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
