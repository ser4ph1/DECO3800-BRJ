<?php
	session_start();
	include("connect.php");
	header('Content-Type: application/json');
	$username =  $mysqli->real_escape_string($_POST["usernamesignup"]);
	$password =  $mysqli->real_escape_string($_POST["passwordsignup"]);
	$validRegistration = true;

	if($username == "" || $password == "")
	{
		//empty input
		echo("1 or more input is blank<br>");
		$validRegistration = false;
		$success = false;
	}
	$query = "select * from users where username = '$username'";
	$result = $mysqli->query($query);
	$rows = mysqli_num_rows($result);
	if($rows != 0)
	{
		// throw non unique username
		//echo("non unique username<br>");
		$validRegistration = false;
		$success = false;
	}
		
	//account is actually registerable case
	if ($validRegistration == true)
	{
		$success = true;
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
		$query = "INSERT INTO USERS VALUES (?, ?)";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param("ss", $username, $hashed_password);
		$stmt->execute();
		$stmt->close();

	}
	echo json_encode(["success" => $success]);
	$mysqli->close();

?>