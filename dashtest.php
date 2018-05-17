<?php
session_start();
if ($_SESSION['admin_id'] == NULL) {
    header('Location: admin/index.php');
}

if (isset($_GET['logout'])) {
    require_once './class/login.php';
    $login = new Login();
    $login->admin_logout();
}
$message = '';
if (isset($_POST['add'])) {
    require_once './class/busSchedule.php';
    $busSchedule = new busSchedule();
    $message = $busSchedule->save_bus_schedule($_POST);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Dash Board</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="vendor/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
        <link href="vendor/bootstrap/css/font-awesome.min.css" type="text/css" rel="stylesheet">
        <script type='text/javascript'>
            function lattersonly(input){
                var regrex = /[^a-z ]/gi;
                input.value = input.value.replace(regrex, "");
            }
        </script>

    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark " style="margin-bottom: 50px;">
            <div class="container">
                <!-- Brand/logo -->
                <a class="navbar-brand" href="view.php" target="_blank">Bus Schedule</a>

                <!-- Links -->
                <ul class="navbar-nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Add Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Manage Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Welcome <strong><?php echo $_SESSION['admin_name']; ?></strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?logout=logout">Log Out <i class="fa fa-sign-out"></i></a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-success text-center"><?php echo $message; ?></h2>
                    <div class="well">
                        <form name="mainform" action="" method="post" onsubmit="return validateForm()">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="bus_name">Bus Name: </label>
                                        <input type="text" class="form-control" id="bus_name" name="bus_name" onkeyup="lattersonly(this)" placeholder="Enter Phone No" required>
                                    </div> 
                                    <div class="form-group">
                                        <label for="driver">Driver Name: </label>
                                        <input type="text" class="form-control" id="driver" name="driver_name" onkeyup="lattersonly(this)" placeholder="Enter Driver Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="helper">Helper Name: </label>
                                        <input type="text" class="form-control" id="helper" name="helper_name"  placeholder="Enter Helper Name">
                                    </div>

                                </div>
                            </div>
                            <input type="submit" name="add" class="btn btn-primary" value="Save Schedule" onclick="Validate()">
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>



