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
require_once '../class/busSchedule.php';
$busSchedule = new busSchedule();



if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $message = $busSchedule->delete_bus_schedule($id);
}

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}

$query_result = $busSchedule->select_all_bus_schedule();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>View Student Info</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../vendor/bootstrap/css/bootstrap3.css" type="text/css" rel="stylesheet">
        <script>
            function checkDelete(){
                var check=confirm("Are You sure to delete this !");
                if(check){
                    return true;
                }else{
                    return false;
                }
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
                    <li><a href="../dashboard.php">Add Schedule</a></li>
                    <li><a href="mange_Schedule.php">Manage Schedule</a></li>
                    <li><a href="registration.php">Registration</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="">Welcome <strong><?php echo $_SESSION['admin_name']; ?></strong></a></li>
                    <li><a href="?logout=logout">Log Out</a></li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-success text-center"><?php echo $message; ?></h2>
                    <div class="well">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th class="column1">S/n</th>
                                    <th class="column1">Time</th>
                                    <th class="column">Bus Name</th>
                                    <th class="column">Bus Type</th>
                                    <th class="column">From</th>
                                    <th class="column">To</th>
                                    <th class="column">Seat</th>
                                    <th class="column">Driver Name</th>
                                    <th class="column">Driver Contact</th>
                                    <th class="column">Helper Name</th>
                                    <th class="column6">Helper Contact</th>
                                    <th class="column6">Action</th>
                            </tr>
                            <?php $sl = 1;
                                while ($bus_schedule = mysqli_fetch_assoc($query_result)) {
                                ?>
                                <tr>
                                    <td class="column"><?php echo $sl++; ?></td>
                                        <td class="column"><?php echo $bus_schedule['time']; ?></td>
                                        <td class="column"><?php echo $bus_schedule['bus_name']; ?></td>
                                        <td class="column"><?php echo $bus_schedule['bus_type']; ?></td>
                                        <td class="column"><?php echo $bus_schedule['start_from']; ?></td>
                                        <td class="column"><?php echo $bus_schedule['arrive_to']; ?></td>
                                        <td class="column"><?php echo $bus_schedule['seat_number']; ?></td>
                                        <td class="column"><?php echo $bus_schedule['driver_name']; ?></td>
                                        <td class="column"><?php echo $bus_schedule['driver_contact']; ?></td>
                                        <td class="column"><?php echo $bus_schedule['helper_name']; ?></td>
                                        <td class="column"><?php echo $bus_schedule['helper_contact']; ?></td>
                                    <td>
                                        <a href="edit_schedule.php?id=<?php echo $bus_schedule['id']; ?>" class="btn btn-success" title="Edit">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        <a href="?delete=<?php echo $bus_schedule['id']; ?>" class="btn btn-danger" title="Delete" onclick="return checkDelete();">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>



        <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap3.min.js"></script>
    </body>
</html>


