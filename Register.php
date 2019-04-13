<?php
	//post variables: email, password, name, years, distance, pace, hours, minutes, type, availability


	require 'DB.php';
	$db = DB::connect();
    $response = "";

    mysqli_set_charset($db, 'utf8');
	$query = "INSERT INTO walkhealthy.User (locationId, displayName, yearsActive, runningType, runningAvailability, runningDistance, runningPace, runningTime)
		VALUES (1, {$_POST['name']}, {$_POST['years']}, {$_POST['type']}, {$_POST['availability']}, {$_POST['distance']}, {$_POST['pace']}, {$_POST['time']})";



	$query = mysqli_real_escape_string($db, $query);



	if (mysqli_real_query($db, $query)){
		$id = mysqli_insert_id($db);
		$password = $_POST['password'];
		$salt = random_bytes(32);
		$hash = hash('sha256', ($password . $salt));
		$query = "INSERT INTO walkhealthy.Login (username, passwordHash, passwordSalt) VALUES ({$_POST['email']}, $hash, {$salt})";
		$query = mysqli_real_escape_string($db, $query);

		if(!mysqli_real_query($db, $query)){
		    $query = "DELETE FROM walkhealthy.User WHERE userId = $id";
            $query = mysqli_real_escape_string($db, $query);
            mysqli_real_query($db, $query);

            $response = "innerfalse";
        }else{$response = "true";}

	}else{$response = "outerfalse";}

	echo $response;

?>