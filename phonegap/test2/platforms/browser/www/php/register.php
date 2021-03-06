<?php
	session_start();
	include("connect.php");
	header('Content-Type: application/json');
	$username =  $mysqli->real_escape_string($_POST["usernamesignup"]);
	$email =  $mysqli->real_escape_string($_POST["emailsignup"]);
	$address =  $mysqli->real_escape_string($_POST["addressignup"]);
	$password =  $mysqli->real_escape_string($_POST["passwordsignup"]);
	$passwordconfirm =  $mysqli->real_escape_string($_POST["passwordsignupconfirm"]);
	$validRegistration = true;
	$success = false;
	$nullFieldsError = false;
	$passwordConfirmError = false;
	$duplicateIndentifier = false;
	if($password!=$passwordconfirm){
		$validRegistration = false;
		$success = false;
		$passwordConfirmError=true;
	}
	if($username == "" || $password == "" || $email == "" || $address == "" || $passwordconfirm=="")
	{
		$validRegistration = false;
		$success = false;
		$nullFieldsError = true;
	}
	$query = "SELECT COUNT(*) FROM USERS2 WHERE USERNAME= ?";
	$stmt = $mysqli->prepare($query);
	$stmt->bind_param("s",$username);
	$stmt->execute();
	$stmt->bind_result($rows);
	$stmt->fetch();
	$stmt->close();
	if($rows != 0)
	{
		// throw non unique username
		$validRegistration = false;
		$success = false;
		$duplicateIndentifier = true;
	}
	$query = "SELECT COUNT(*) FROM USERS2 WHERE EMAIL= ?";
	$stmt = $mysqli->prepare($query);
	$stmt->bind_param("s",$email);
	$stmt->execute();
	$stmt->bind_result($rows);
	$stmt->fetch();
	$stmt->close();
	if($rows != 0)
	{
		$validRegistration = false;
		$success = false;
		$duplicateIndentifier = true;
	}
		
	//account is actually registerable case

	if ($validRegistration == true)
	{	
		$success = true;
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
		$query = "INSERT INTO USERS2 VALUES (?, ?, ?, ?)";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param("ssss", $username, $email, $address, $hashed_password);
		$stmt->execute();
		$stmt->close();
	}
	$Response = array('success' => $success, 'nullFields' => $nullFieldsError, 'passwordConfirm' => $passwordConfirmError, 'duplicateIndentifier' => $duplicateIndentifier);
	echo json_encode($Response);
	$mysqli->close();
?>