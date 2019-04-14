<?php
	//post variables: email, password, name, years, distance, pace, hours, minutes, type, availability


	require 'DB.php';
	$db = DB::connect();
    $response = "";
    $file = fopen('../log.txt', 'w');
    mysqli_set_charset($db, 'utf8');
	$query = "INSERT INTO walkhealthy.User (locationId, displayName, yearsActive )
		VALUES (2, '{$_POST['name']}', {$_POST['years']})";



	//$query = mysqli_real_escape_string($db, $query);



	if (mysqli_real_query($db, $query)){

		$id = mysqli_insert_id($db);
		$password = $_POST['password'];
		$salt = random_bytes(32);
        fwrite($file, "0");

		$hash = hash('sha1', ($password . $salt));
		fwrite($file, "1");
		$query = "INSERT INTO walkhealthy.Login (userId, username, passwordHash, passwordSalt) VALUES ($id, '{$_POST['email']}', '$hash', '{$salt}')";
		//$query = mysqli_real_escape_string($db, $query);
        fwrite($file, "2");
		if(!mysqli_real_query($db, $query)){
		    $query = "DELETE FROM walkhealthy.User WHERE userId = $id";
            //$query = mysqli_real_escape_string($db, $query);
            mysqli_real_query($db, $query);

            $response = "innerfalse";
            $error = mysqli_error($db);
            fwrite($file, $error);
        }else{$response = "true";}

	}else{$response = "outerfalse";
        $error = mysqli_error($db);
        fwrite($file, $error);

	}
    fclose($file);
	echo $response;

?>