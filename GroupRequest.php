<?php
    require 'DB.php';
    header('Content-Type: application/json');

    $db = DB::connect();

    $user = $_POST["userId"];   // User wishing to join
    $group = $_POST["groupId"];   // Group to join
    $owner = null;  // Group owner (retrieved from database)
    $time = $_POST["timestamp"];    // Time of request initiation from user's system
    $message = $_POST["message"]; // Message to group owner

    // Get group owner
    $query = "SELECT userId FROM walkhealthy.GroupOwner WHERE groupId=$group";
    $result = mysqli_query($db, $query);

    if ($result) {
        $owner = $result['userId'];

        $newQuery = "INSERT INTO walkhealthy.Request VALUES ($user, $group, $owner, $time, $message)";

        if (mysqli_query($db, $newQuery)) {
            echo "true";
        } else {
            echo "false";
        }
    }
    else {
        echo("false");
    }


?>