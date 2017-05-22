<?php
	session_start();
	include("connect.php");
	header('Content-Type: application/json');
	$BookID = $_POST["BookID"];
	$success = true;
	//query
	$query = "select quantity from books where bookid = '$BookID'";
	$request = $mysqli->query($query);
	$service = $request->fetch_assoc();
	$QuantityOfBook = $service['quantity'];
	if($QuantityOfBook<1){
		$success=false;
	}
	if($success==true){
		$query = "UPDATE BOOKS SET QUANTITY = QUANTITY - 1 WHERE BOOKID = ?;";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param("i",$BookID);
		$stmt->execute();
		$stmt->close();
	}
	$Response = array('success' => $success,'BookID'=>$BookID);
	echo json_encode($Response);
	$mysqli->close();
?>