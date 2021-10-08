<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE students (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
score1 DECIMAL(5,2) NOT NULL,
score2 DECIMAL(5,2) NOT NULL,
score3 DECIMAL(5,2) NOT NULL,
score4 DECIMAL(5,2) NOT NULL,
score5 DECIMAL(5,2) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Students created successfully";
  header("Location: db.php");
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>