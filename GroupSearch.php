<?php
        require 'DB.php';
        header('Content-Type: application/json');
        $db = DB::connect();
        $runningType = $_POST["runningType"];
        $runningMonths = $_POST["runningMonths"];
        $runningAvailability = $_POST["runningDays"];
        $runningTime = $_POST["runningTime"];

        $query = "SELECT * FROM walkhealthy.Group WHERE runningType=$runningType AND runningAvailability=$runningMonths";

?>