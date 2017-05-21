<?php
	session_start();
	include("connect.php");
	$search =  $mysqli->real_escape_string($_POST["searchKey"]);
	$sql = "SELECT bookid, author, genre, title, quantity FROM books WHERE TITLE LIKE '%$search%' OR AUTHOR LIKE '%$search%' OR GENRE LIKE '%$search%' ORDER BY TITLE";
	$result = $mysqli->query($sql);
	echo "<table>";
	echo "<tr>";
	echo "<th>BookID</th>";
	echo "<th>Title</th>";
	echo "<th>Author</th>";
	echo "<th>Genre</th>";
	echo "<th>Quantity</th>";
	echo "</tr>";
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "<th>".$row["bookid"]."</th>";
			echo "<th>".$row["title"]."</th>";
			echo "<th>".$row["author"]."</th>";
			echo "<th>".$row["genre"]."</th>";
			echo "<th>".$row["quantity"]."</th>";
			echo "</tr>";
		}
	} else {
		echo "0 results";
	}
	echo "</table>";
	$mysqli->close();
?>