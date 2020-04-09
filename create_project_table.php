 <?php
	session_start();
	$servername = "localhost:3306";
	$username = "root";
	$password = "azvuFSLFdmJ8";
	$dbname = "homeofficedb";


	$project = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  $project = test_input($_POST["project"]);
	}

	echo "<br/>" . $project . "<br/>";

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$sql = "CREATE TABLE " . $project . "(
				ID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				description TEXT NOT NULL,
				task_types INT(5) NOT NULL,
				start DATE NOT NULL,
				end DATE NOT NULL,
				worker INT(6) NOT NULL,
				comment TEXT,
				attachment VARCHAR(200)
			)"; 

	echo "<br/>" . $sql . "<br/>";
	echo "<br/>" . $_SESSION["type"] . "<br/>";
	//CHECK ADMIN SESSION AND CONNECT TO SQL

	if($_SESSION["type"] > 1) {
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			echo "Connect error";
			die("Connection failed: " . $conn->connect_error);
		}

	
		if ($conn->query($sql) === TRUE) {
			echo $project . "table created successfully<br/>";
			echo "<a href=project_form.html?" . $project . ">Töltsd ki a projekt részleteit!</a>";
		} else {
			echo "Error creating table: " . $project . " " . $conn->error;
		}

		$conn->close();
	}
?> 
