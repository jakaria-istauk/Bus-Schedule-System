<?php

class busSchedule {
   protected $connection;

    public function __construct() {
        $host_name = 'localhost';
        $user_name = 'root';
        $password = '';
        $db_name = 'bus_info';
        $this->connection = mysqli_connect($host_name, $user_name, $password, $db_name);

        if (!$this->connection) {
            die('Connection Fail' . mysqli_error($this->connection));
        }
    }
    
     public function save_bus_schedule($data) {
        $sql = "INSERT INTO tbl_bus_schedule (time, bus_name, bus_type, start_from, arrive_to, seat_number, driver_name, driver_contact, helper_name, helper_contact) "
                . "VALUES('$data[time]', '$data[bus_name]', '$data[bus_type]', '$data[start_from]', '$data[arrive_to]', '$data[seat_number]', '$data[driver_name]', '$data[driver_contact]', '$data[helper_name]', '$data[helper_contact]')";

        if (mysqli_query($this->connection, $sql)) {
            $message = "Bus Schedule Saved Successfully";
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->connection));
        }
    }
    
    public function select_all_bus_schedule(){
        $sql = "SELECT * FROM tbl_bus_schedule ORDER BY id DESC";

        if (mysqli_query($this->connection, $sql)) {
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->connection));
        }
    }
    
    public function select_bus_schedule_by_id($id) {
        $sql = "SELECT * FROM tbl_bus_schedule WHERE id = '$id'";

        if (mysqli_query($this->connection, $sql)) {
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->connection));
        }
    }
    
    public function update_bus_schedule($data, $id) {
        $sql = "UPDATE tbl_bus_schedule SET time = '$data[time]', bus_name = '$data[bus_name]', "
                . "bus_type = '$data[bus_type]', start_from = '$data[start_from]', arrive_to = '$data[arrive_to]', "
                . "seat_number = '$data[seat_number]', driver_name = '$data[driver_name]', driver_contact = '$data[driver_contact]', "
                . "helper_name = '$data[helper_name]', helper_contact = '$data[helper_contact]' WHERE id = '$id'";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Bus Schedule Updated Successfully';
            header('Location: mange_Schedule.php');
        } else {
            die('Query problem'.mysqli_error($this->connection));
        }
    }
    
    public function delete_bus_schedule($id) {
        $sql = "DELETE FROM tbl_bus_schedule WHERE id = '$id'";

        if (mysqli_query($this->connection, $sql)) {
            $message = 'Bus Schedule deleted Successfully';
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->connection));
        }
    }
}
