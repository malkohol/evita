 <?php
$servername = "localhost:3306";
$username = "root";
$password = "azvuFSLFdmJ8";

echo "start";
// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
	echo "Connect error";
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE HomeOfficeDB";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
?> 

