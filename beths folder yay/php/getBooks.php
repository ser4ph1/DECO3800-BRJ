<?php
	session_start();
	//include("connect.php");
	$success = true;
	
	$conn = new mysqli('localhost', 'root', 'secret', 'infs3202');
	$success = true;
	
	$sql = "SELECT bookid, title, author, genre, price, quantity FROM Books";
	$result = $conn->query($sql);
	
	//$success = false;
	
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "id: " . $row["bookid"]. " - Title: " . $row["title"] . " -  Author: " . $row["author"] . " - Genre: " . $row["genre"] . " - Price: " . $row["price"] . " - Quantity: " . $row["price]" . "<br>";
		}
		$success = true;
	} else {
		echo "0 results";
		$success = true;
	}
	
	echo json_encode(["success" => $success]);
	$conn->close();
?>