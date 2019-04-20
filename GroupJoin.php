<?php
    require 'DB.php';
    header('Content-Type: application/json');
    
    $db = DB::connect();
    
    $user = $_POST["userId"];   // User wishing to join group
    $group = $_POST["groupId"];   // Group to join
    $date = $_POST["joinDate"]; // Date user joined (retrieved from system)

    $query = "INSERT INTO walkhealthy.GroupMember VALUES ($user, $group, $date)";
    
    if (mysqli_query($db, $query)) {
        echo "true";
    }
    else {
        echo "false";
    }
?>