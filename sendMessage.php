<?php

session_start();
$servername = "us-cdbr-east-04.cleardb.com";
$username = "b0dcb3da6bfea5";
$password = "e7b37955";
$dbname = "heroku_8f1ffd4429f5f04";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id = $_GET['id'];
$user = $_SESSION['user'];
$sql = "SELECT name FROM students WHERE id='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $n = $row['name'];
    }
    if ($conn->query($sql) === TRUE) {
        header("Location: db.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$sql = "INSERT INTO messages (sender,message,recipient) VALUES ( '$user','Would you like to be my roommate?' ,'$n')";

if ($conn->query($sql) === TRUE) {

    header("Location: roommatebrowse.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

    