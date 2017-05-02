<?php
session_start();
header("Content-Type: text/plain");
$success = true;
if (isset($_SESSION['username'])) {
	$success = true;
	//echo json_encode(["success" => $success]);
}else{
	$success = false;
	//echo json_encode(["success" => $success]);
}
echo json_encode($success);
?>