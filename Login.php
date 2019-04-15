<?php
//POST -> email, password

define('KEY_LENGTH', 10);
require 'DB.php';

$db = DB::connect();
mysqli_set_charset($db, 'utf8');
$query = "SELECT * FROM walkhealthy.Login WHERE username = '{$_POST['email']}''";
//$query =  mysqli_escape_string($db, $query);
$result = mysqli_query($db, $query);
if ($result){
	$result = mysqli_fetch_assoc($result);
	$salt = $result['passwordSalt'];
	$hash = $result['passwordHash'];
	if($hash == hash('sha256', ($_POST['password'] . $salt))){
		$response = $result['loginId'];
		$response .= ',' . 'asdflkjh';//random_bytes(KEY_LENGTH); //still can't use random_bytes for some reason
		echo $response;
	}else{echo'false';}
}else{echo 'false';}


?>
