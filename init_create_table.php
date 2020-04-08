 <?php
	$servername = "localhost:3306";
	$username = "root";
	$password = "azvuFSLFdmJ8";
	$dbname = "homeofficedb";


	$task;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  $task = test_input($_POST["task"]);
	}

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	switch($task) {
			case "users" : $sql = "CREATE TABLE users(
				ID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				firstname VARCHAR(100) NOT NULL,
				lastname VARCHAR(100) NOT NULL,
				username VARCHAR(20) NOT NULL,
				password VARCHAR(100) NOT NULL,
				email VARCHAR(50) NOT NULL,
				phone VARCHAR(30) NOT NULL,
				type INT(5) NOT NULL,
				title VARCHAR(50) NOT NULL
				)"; 
				break;
			case "works" : $sql = "CREATE TABLE works(
				ID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				projectname VARCHAR(100) NOT NULL,
				client INT(10) NOT NULL,
				tasks INT(5) NOT NULL,
				projectmanager VARCHAR(100) NOT NULL,
				start DATE NOT NULL,
				end DATE NOT NULL,
				price INT(10) NOT NULL
				)"; 
				break;
			case "task_types" : $sql = "CREATE TABLE task_types(
				ID INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				name VARCHAR(100) NOT NULL,
				description VARCHAR(10000) NOT NULL
				)"; 
				break;
			default: echo "Maci fasz";
	}

	//CHECK CREATOR SESSION AND CONNECT TO SQL

	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		echo "Connect error";
		die("Connection failed: " . $conn->connect_error);
	}

	
	if ($conn->query($sql) === TRUE) {
		echo $task . "table created successfully";
	} else {
		echo "Error creating table: " . $task . " " . $conn->error;
	}

	$conn->close();
?> 
