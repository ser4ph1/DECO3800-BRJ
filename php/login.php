<?php
session_start();
include("connect.php");
header('Content-Type: application/json');
$username =  mysql_real_escape_string($_POST["username"]);
$password = $_POST["password"]; //is crypted so doesnt need to be sanatised
//end new
$query = "select password from users2 where username = '$username' or email = '$username'";
$result = $mysqli->query($query);
$rows = mysqli_num_rows($result);
if($rows == 0 )
{
	//echo ("failed login");
	$authority = false;
}
else
{
	while(list($passwords) = $result->fetch_row()) {
		if(password_verify($password, $passwords)){
			$query = "select username from users2 where username = '$username' or email = '$username'";
			$request = $mysqli->query($query);
			$service = $request->fetch_assoc();
			$_SESSION['username'] = $service['username'];
			$authority=true;
		
			 //set session as logged in and redirect
			}else{
				$authority=false;
				//echo("Failed login attempt");
			}
	}
}
echo json_encode(['authority' => $authority]);
$mysqli->close();

?>