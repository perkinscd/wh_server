<?php
    /*************************************************************
     * @Author:             Chelsie Perkins, perkinscd@etsu.edu
     * Date Created:        April 20, 2019
     * Date Last Modified:  April 24, 2019
     * Current State:       Non-functional / Testing
     *
     * @Purpose:
     * Allows a user to join a group by adding that user as a
     * GroupMember in the database.
     *************************************************************/

    require 'DB.php';
    header('Content-Type: application/json');
    
    $db = DB::connect();
    
    $user = $_POST["userId"];   // User wishing to join group
    $group = $_POST["groupId"];   // Group to join
    $date = $_POST["joinDate"]; // Date user joined (retrieved from system)

    $query = "INSERT INTO walkhealthy.GroupMember VALUES ($user, $group, '$date')";
    
    if (mysqli_query($db, $query)) {
        echo "success";
    }
    else {
        echo "oopsie";
    }
?>