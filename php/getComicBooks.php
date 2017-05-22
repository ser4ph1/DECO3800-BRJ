<?php
	session_start();
	include("connect.php");
	$success = true;
	
	$sql = "SELECT bookid, title, author, genre, price, quantity FROM books WHERE genre LIKE '%comic%' ORDER BY title";
	
	$result = $mysqli->query($sql);
	echo "<table>";
	echo "<tr>";
	echo "<th>Book ID</th>";
	echo "<th>Title</th>";
	echo "<th>Author</th>";
	echo "<th>Price</th>";
	echo "<th>Quantity</th>";
	echo "</tr>";
	
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "<th>".$row["bookid"]."</th>";
			echo "<th>".$row["title"]."</th>";
			echo "<th>".$row["author"]."</th>";
			echo "<th>$".$row["price"]."</th>";
			echo "<th>".$row["quantity"]."</th>";
			echo "<th>";
			echo "<button class='comicClick' name='orderingForm' value='".$row["bookid"]."'>$".$row["price"]."</button>";
			echo "</th>";
			echo "</tr>";
		}
		$success = true;
	} else {
		echo "0 results";
		$success = false;
	}
	echo "</table>";
	$mysqli->close();
?>