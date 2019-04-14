<?php
        require 'DB.php';
        $db = DB::connect();

        if(mysqli_connect_errno()){
            echo "Group Search page workie.";
        }
        else{
            echo "Y U NO WORK.";
        }
        $runningType = $_GET["runningType"];
        $runningAvailability = $_GET["runningDays"];
        //$runningDistanceMin = $_GET["distMin"];
        //$runningDistanceMax = $_GET["distMax"];
        //$runningPaceMin = $_GET["paceMin"];
        //$runningPaceMax = $_GET["paceMax"];
        $runningTime = $_GET["runningTime"];


?>