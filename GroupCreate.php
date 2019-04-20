<?php
    $db = DB::connect();
    header('Content-Type: application/json');
    $runningType = $_POST["runningType"];
    $runningAvailability = $_POST["runningDays"];
    $runningTime = $_POST["runningTime"];

    $query = "INSERT INTO walkhealthy.Group (locationId, runningType, runningAvailability, runningTime ) VALUES (2, '$runningType','$runningAvailability', '$runningTime')";

    $report = fopen('../log.txt', 'a');
    fwrite($report, "\n\n");
    fwrite($report, "$runningAvailability");
    fwrite($report, "\n\n");
    fwrite($report, "$runningType");
    fwrite($report, "\n\n");
    fwrite($report, "$query");
    fclose($report);
    /*
    if(mysqli_real_query($db, $query)){
        $response = ['success' => true];
        $response = json_encode($response);
    }
    else{
        $response = ['success' => false];
        $response = json_encode($response);
        $report = fopen('../log.txt', 'a');
        fwrite($report, "\n\n");
        fwrite($report, mysqli_error($db));
        fclose($report);
    }

    mysqli_close($db);
    echo $response;
*/
    ?>
