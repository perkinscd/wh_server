<?php
    require 'DB.php';
    header('Content-Type: application/json');

    $db = DB::connect();

    $runningType = $_POST["runningType"];   // Type of running
    $runningAvailability = $_POST["runningDays"];   // Running Days
    $runningTime = $_POST["runningTime"];   // Running Times

    //remove ending comma from kris's lovely string building
    rtrim($runningAvailability, ",");
    rtrim($runningType, ",");

    //to store parameters for where clause
    $where = "";

    //really gross looking check for populated search parameter
    if(!empty($runningType) && !is_null($runningType)) {
        $where .= "runningType=$runningType AND ";
    }

    //another really gross looking check for populated search parameter
    if(!empty($runningAvailability) && !is_null($runningAvailability)) {
        $where .= "runningAvailability=$runningAvailability AND ";
    }

    //last really gross looking check for populated search parameter
    if(!empty($runningTime) && !is_null($runningTime)) {
        $where .= "runningTime=$runningTime AND ";
    }

    $query = "SELECT groupName, numberOfMembers, groupDescription, runningType, runningAvailability, runningTime FROM walkhealthy.Group WHERE " . $where . "locationId=2";
    $result = mysqli_query($db, $query);

    if ($result) {
        $result_set = array();

        // Fetch multiple rows
        while ($row = mysqli_fetch_assoc($result)) {
            // Add to results
            array_push($result_set, $row);
        }

        // Send results
        echo($result_set);
    }
    else {
        echo("false");
    }

    // Free result set
    mysqli_free_result($result);
    mysqli_close($db);
?>