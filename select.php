<?php

	include 'connect_db.php';

	$sql = "SELECT ID, firstname, lastname, title FROM users";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
		    //echo "id: " . $row["ID"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br/>";
			echo "<br/>";
			foreach($row as $value) {
				echo $value . " ";
			}
		}
	} else {
		echo "0 results";
	}
	$conn->close();

?>
