<?php

	include 'connect_db.php';

	$sql =  $fname = $lname = $uname = $pw = $mail = $phone = $type = $title = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	    $fname = test_input($_POST["firstname"]);
		$lname = test_input($_POST["lastname"]);
		$uname = test_input($_POST["username"]);
		$pw = test_input($_POST["password"]);
		$mail = test_input($_POST["email"]);
		$phone = test_input($_POST["phone"]);
		$type = test_input($_POST["type"]);
		$title = test_input($_POST["title"]);
	}

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$salted_pw = "hzd45rd5f3" . $pw . "zft765uzgfgwu";
	//PASSWORD_BCRYPT is 60 character
	$hashed_pw = password_hash($salted_pw, PASSWORD_BCRYPT);

	$sql = "INSERT INTO users (firstname, lastname, username, password, email, phone, type, title) VALUES ('" . $fname . "', '" . $lname . "','" . $uname . "','" . $hashed_pw . "','" . $mail . "','" . $phone . "','" . $type . "','" . $title . "')";

	echo "<br/>" . $sql . "<br/>";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?>


