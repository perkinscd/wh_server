<?php
    require 'DB.php';
    header('Content-Type: application/json');

    $db = DB::connect();

    $runningType = $_POST["runningType"];   // Type of running
    $runningAvailability = $_POST["runningDays"];   // Running Days
    $runningTime = $_POST["runningTime"];   // Running Times
    $runningLocation = $_POST["locationId"]; // Group's location

    $query = "SELECT * FROM walkhealthy.Group WHERE runningType=$runningType AND runningAvailability=$runningAvailability AND runningTime=$runningTime";
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