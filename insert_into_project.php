<?php
	include 'connect_db.php';
	//require 'connect_db.php';

	$projectnameErr = $descriptionErr = $task_typesErr = $startErr = $endErr = $workerErr = "";
	$sql =  $projectname = $description = $task_types = $start = $end = $worker = $comment = $attachment = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(empty($_POST["projectname"])) {
			$projectnameErr = "Projectname is required";
		} else {
			$projectname = test_input($_POST["projectname"]);
		}
		if(empty($_POST["description"])) {
			$descriptionErr = "Description is required";
		} else {
			$description = test_input($_POST["description"]);
		}
		if(empty($_POST["task_types"])) {
			$task_typesErr = "Task type is required";
		} else {
			$task_types = test_input($_POST["task_types"]);
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
		if(empty($_POST["worker"])) {
			$workerErr = "Worker is required";
		} else {
			$worker = test_input($_POST["worker"]);
		}
		$comment = test_input($_POST["comment"]);
		$attachment = test_input($_POST["attachment"]);	
	}

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$sql = "INSERT INTO " . $projectname . "(description, task_types, start, end, worker, comment, attachment) VALUES ('" . $description . "', '" . $task_types . "','" . $start . "','" . $end . "','" . $worker . "','" . $comment . "','" . $attachment . "')";

	echo "<br/>" . $sql . "<br/>";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully</br>";
		echo "<a href=project_form.html>További rész feladat hozzáadása</a>";
		echo "<a href=works_form.html>Ha felvitted az összes rész feladatot tölsd fel a munkát!</a></br>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?>
