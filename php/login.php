<?php
session_start();
include("connect.php");
header('Content-Type: application/json');
$username =  mysql_real_escape_string($_POST["username"]);
$password = $_POST["password"];
$query = "select password from USERS2 where USERNAME = '$username' or EMAIL = '$username'";
$result = $mysqli->query($query);
$rows = mysqli_num_rows($result);
if($rows == 0 ){
	$authority = false;
}else{
	while(list($passwords) = $result->fetch_row()) {
		if(password_verify($password, $passwords)){
			$query = "select USERNAME from USERS2 where USERNAME = '$username' or EMAIL = '$username'";
			$request = $mysqli->query($query);
			$service = $request->fetch_assoc();
			$_SESSION['username'] = $service['USERNAME'];
			$authority=true;
			}else{
				$authority=false;
			}
	}
}
echo json_encode(['authority' => $authority]);
$mysqli->close();

?>