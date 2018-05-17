<?php
$message = '';
require_once './class/busSchedule.php';
$busSchedule = new busSchedule();

$query_result = $busSchedule->select_all_bus_schedule();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bus Schedule</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="{{asset('public/frontEnd/{{asset('public/frontEnd/{{asset('public/frontEnd/images/')}}/')}}/')}}/icons/favicon.ico"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <!--===============================================================================================-->
    </head>
    <body>

        <div class="limiter">
            <div class="container-table100">
                <div class="wrap-table100">
                    <div class="table100">
                        <h2 class="title">Daffodil Bus Schedule</h2>
                        <hr class="title-uline">
                        <table>
                            <thead>
                                <tr class="table100-head text-center">
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sl = 1;
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
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>




        <!--===============================================================================================-->	
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/bootstrap/js/popper.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="js/main.js"></script>

    </body>
</html>
