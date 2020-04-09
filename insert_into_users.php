<?php
	//include 'connect_db.php';
	require 'connect_db.php';

	$fnameErr = $lnameErr = $unameErr = $pwErr = $mailErr = $phoneErr = $typeErr = $titleErr = "";
	$sql =  $fname = $lname = $uname = $pw = $mail = $phone = $type = $title = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(empty($_POST["firstname"])) {
			$fnameErr = "Firstname is required";
		} else {
			$fname = test_input($_POST["firstname"]);
		}
		if(empty($_POST["lastname"])) {
			$lnameErr = "Lastname is required";
		} else {
			$lname = test_input($_POST["firstname"]);
		}
		if(empty($_POST["username"])) {
			$unameErr = "Username is required";
		} else {
			$uname = test_input($_POST["username"]);
		}
		if(empty($_POST["password"])) {
			$pwErr = "Password is required";
		} else {
			$pw = test_input($_POST["password"]);
		}
		if(empty($_POST["email"])) {
			$mailErr = "Email is required";
		} else {
			$mail = test_input($_POST["email"]);
		}
		if(empty($_POST["phone"])) {
			$phoneErr = "Phone number is required";
		} else {
			$phone = test_input($_POST["phone"]);
		}
		if(empty($_POST["title"])) {
			$titleErr = "Title is required";
		} else {
			$title = test_input($_POST["title"]);
		}	
		$type = test_input($_POST["type"]);
	}

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	echo "<br/>" . $pw . "<br/>";

	$salted_pw = "hzd45rd5f3" . $pw . "zft765uzgfgwu";
	//PASSWORD_BCRYPT is 60 character
	$hashed_pw = hash('sha256', $salted_pw);

	$sql = "INSERT INTO users (firstname, lastname, username, password, email, phone, type, title) VALUES ('" . $fname . "', '" . $lname . "','" . $uname . "','" . $hashed_pw . "','" . $mail . "','" . $phone . "','" . $type . "','" . $title . "')";

	echo "<br/>" . $sql . "<br/>";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?>


