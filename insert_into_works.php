<?php
	include 'connect_db.php';
	//require 'connect_db.php';

	$projectnameErr = $clientErr = $tasksErr = $projectmanagerErr = $startErr = $endErr = $priceErr = "";
	$sql =  $projectname = $client = $tasks = $projectmanager = $start = $end = $price = "2";

	echo "<br/>" . $projectname . "<br/>";
	echo "<br/>" . $_POST["projectname"] . "<br/>";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(empty($_POST["projectname"])) {
			$projectnameErr = "Projectname is required";
		} else {
			$projectname = test_input($_POST["projectname"]);
		}
		if(empty($_POST["client"])) {
			$clientErr = "Client is required";
		} else {
			$client = test_input($_POST["client"]);
		}
		if(empty($_POST["tasks"])) {
			$tasksErr = "Tasks is required";
		} else {
			$tasks = test_input($_POST["tasks"]);
		}
		if(empty($_POST["projectmanager"])) {
			$projectmanagerErr = "Projectmanager is required";
		} else {
			$projectmanager = test_input($_POST["projectmanager"]);
		}
		if(empty($_POST["start"])) {
			$startErr = "Start is required";
		} else {
			$start = test_input($_POST["start"]);
		}
		if(empty($_POST["end"])) {
			$endErr = "End is required";
		} else {
			$end = test_input($_POST["end"]);
		}
		if(empty($_POST["price"])) {
			$priceErr = "Price is required";
		} else {
			$price = test_input($_POST["price"]);
		}	
	}

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}


	$sql = "INSERT INTO works (projectname, client, tasks, projectmanager, start, end, price) VALUES ('" . $projectname . "', '" . $client . "','" . $tasks . "','" . $projectmanager . "','" . $start . "','" . $end . "','" . $price . "')";

	echo "<br/>" . $sql . "<br/>";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?>
