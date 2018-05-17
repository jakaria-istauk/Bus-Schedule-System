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
if (isset($_POST['add'])) {
    require_once '../class/busSchedule.php';
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
        <link href="../vendor/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
        <link href="../vendor/bootstrap/css/font-awesome.min.css" type="text/css" rel="stylesheet">
        <script type='text/javascript'>
            function lattersonly(input){
                var regrex = /[^a-z ]/gi;
                input.value = input.value.replace(regrex, "");
            }
            function numbersOnly(input){
                var regrex = /[^0-9]/gi;
                input.value = input.value.replace(regrex, "");
            }
        </script>

    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark " style="margin-bottom: 50px;">
            <div class="container">
                <!-- Brand/logo -->
                <a class="navbar-brand" href="../view.php" target="_blank">Bus Schedule</a>

                <!-- Links -->
                <ul class="navbar-nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Add Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mange_Schedule.php">Manage Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registration.php">Registration</a>
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
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="time">Starting Time: </label>
                                        <input type="text" class="form-control" id="time" name="time"  placeholder="Enter Start Time" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="bus_name">Bus Name: </label>
                                        <input type="text" class="form-control" id="bus_name" name="bus_name"  placeholder="Enter Phone No" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="type">Bus Type:</label>
                                        <select class="form-control" name="bus_type" id="type" required>
                                            <option>----Select Bus Type----</option>
                                            <option value="Regular">Regular</option>
                                            <option value="Lab">Lab</option>
                                            <option value="Special">Special</option>
                                        </select>
                                    </div> 
                                    <div class="form-group">
                                        <label for="from">From:</label>
                                        <select class="form-control" name="start_from" id="from" required>
                                            <option>----Select one place----</option>
                                            <option value="Dhanmondi Campus">Dhanmondi Campus</option>
                                            <option value="Ashulia Campus">Ashulia Campus</option>
                                            <option value="Uttora Campus">Uttora Campus</option>
                                            <option value="Savar">Savar</option>
                                            <option value="Gazipur">Gazipur</option>
                                        </select>
                                    </div> 
                                    <div class="form-group">
                                        <label for="to">To:</label>
                                        <select class="form-control" name="arrive_to" id="to" required>
                                            <option>----Select one place----</option>
                                            <option value="Dhanmondi Campus">Dhanmondi Campus</option>
                                            <option value="Ashulia Campus">Ashulia Campus</option>
                                            <option value="Uttora Campus">Uttora Campus</option>
                                            <option value="Savar">Savar</option>
                                            <option value="Gazipur">Gazipur</option>
                                        </select>
                                    </div> 
                                </div>
                                <div class="col-md-6 col-sm-12">

                                    <div class="form-group">
                                        <label for="seat">Number of Seat: </label>
                                        <input type="text" class="form-control" id="seat" name="seat_number" onkeyup="numbersOnly(this)" placeholder="Enter number of Seat" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="driver">Driver Name: </label>
                                        <input type="text" class="form-control" id="driver" name="driver_name" onkeyup="lattersonly(this)" placeholder="Enter Driver Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="dcontact">Driver Contact: </label>
                                        <input type="text" class="form-control" id="dcontact" name="driver_contact" onkeyup="numbersOnly(this)" placeholder="Enter Driver Contact">
                                    </div>
                                    <div class="form-group">
                                        <label for="helper">Helper Name: </label>
                                        <input type="text" class="form-control" id="helper" name="helper_name" onkeyup="lattersonly(this)" placeholder="Enter Helper Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="hcontact">Helper Contact: </label>
                                        <input type="text" class="form-control" id="hcontact" name="helper_contact" onkeyup="numbersOnly(this)" placeholder="Enter Helper Contact">
                                    </div>

                                </div>
                            </div>
                            <input type="submit" name="add" class="btn btn-primary" value="Save Schedule">
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>



