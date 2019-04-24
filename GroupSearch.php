<?php
    require 'DB.php';
    header('Content-Type: application/json');

    //connect to db using connection method in DB.php
    $db = DB::connect();

    //to store parameters for where clause
    $where = "";


    //really gross looking check for populated search parameters:

    //if running type is specified
    if(!empty($_POST["runningType"])) {
        //remove ending comma from kris's lovely string building
        $runningType =  rtrim($_POST["runningType"], ",");
        //add runningType to query string
        $where .= "runningType='$runningType' AND ";
    }
    //if running type is not specified, do nothing
    else {
        $where .= "";
    }

    //if running days are specified
    if(!empty($_POST["runningDays"])) {
        //remove ending comma from kris's lovely string building
        $runningAvailability = rtrim($_POST["runningDays"], ",");
        //add runningAvailability to query string
        $where .= "runningAvailability='$runningAvailability' AND ";
    }
    //if running days are not specified, do nothing
    else {
        $where .= "";
    }

    //if running time is specified
    if(!empty($_POST["runningTime"])) {
        $runningTime = $_POST["runningTime"];
        //add runningTime to query string
        $where .= "runningTime='$runningTime' AND ";
    }
    //if running time is not specified, do nothing
    else {
        $where .= "";
    }

    //build the query with added search parameters - groups always have a location value of 2 (until location retrieval works)
    $query = "SELECT groupName, numberOfMembers, groupDescription, runningType, runningAvailability, runningTime FROM walkhealthy.Group WHERE " . $where . "locationId=2";
    //execute the query and get the result
    $result = mysqli_query($db, $query);

    //if there's a result, send the retrieved rows as a response to the app
    if ($result) {
        //array to hold query results
        $result_set = array();

        //will keep fetching rows from query results until there are no more rows
        //each row is fetched as an associative array - column names are the keys
        while ($row = mysqli_fetch_assoc($result)) {
            //add row array to results array (sorry)
            array_push($result_set, $row);
        }

        //send results to the app as a json response
        echo(json_encode($result_set));
    }
    //if there's not a result, send a facetious response to the app
    else {
        echo("*gasp* No groups were found matching your criteria!");
    }

    //free the result set
    mysqli_free_result($result);
    //close db connection
    mysqli_close($db);
?>