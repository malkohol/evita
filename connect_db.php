<?php
	$servername = "localhost:3306";
	$username = "root";
	$password = "azvuFSLFdmJ8";
	$dbname = "homeofficedb";

	// Create connection
	echo "<br/>start connect<br/>";
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

?>
