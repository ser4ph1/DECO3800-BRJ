<?php
session_start();
include("connect.php");
header('Content-Type: application/json');
$username =  mysql_real_escape_string($_POST["username"]); //should be sanatised before input
$password = $_POST["password"]; //is crypted so doesnt need to be sanatised

$query = "select password from users where username = '$username'";
$result = $mysqli->query($query);
$rows = mysqli_num_rows($result);
if($rows == 0 )
{
	echo ("failed login");
	$authority = false;
}
else
{

	while(list($passwords) = $result->fetch_row()) {
		if(password_verify($password, $passwords)){
			$_SESSION['username'] = $username;
			echo json_encode(['authority' => true, 'username' => $_POST['username']]);
				die();
			 //set session as logged in and redirect
			}else{
				echo("Failed login attempt");
			}
	}
}
$mysqli->close();

?>