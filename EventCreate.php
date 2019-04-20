<?php
$db = DB::connect();
header('Content-Type: application/json');
$userId = $_POST['userId'];
date_default_timezone_set('America/Indiana/Indianapolis');
$eventName = $_POST['eventName'];
$eventDescription = $_POST['eventDescription'];
$eventTime = $_POST['eventTime'];
$eventDate = $_POST['eventDate'];
$runType = $_POST['runningType'];
$minDistance = $_POST['minDistance'];
$maxDistance = $_POST['maxDistance'];
$timestamp = date('Y-m-d H:i:s');

$query = "INSERT INTO walkhealthy.Event (userId, locationId, eventName, eventDescription, timestamp, eventDate, runningType, runningDistanceMin, runningDistanceMax ) " .
    "VALUES ($userId, 2, '$eventName','$eventDescription', '$timestamp', '$eventDate', '$runType', $minDistance, $maxDistance)";

$report = fopen('../log.txt', 'a');
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