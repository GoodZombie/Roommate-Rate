<?php

session_start();
$servername = "us-cdbr-east-04.cleardb.com";
$username = "b0dcb3da6bfea5";
$password = "e7b37955";
$dbname = "heroku_8f1ffd4429f5f04";

$id = $_SESSION["id"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$score1 = $_SESSION["score1"];
$score2 = $_SESSION["score2"];
$score3 = $_SESSION["score3"];
$score4 = $_SESSION["score4"];
$score5 = $_SESSION["score5"];

$sql = "UPDATE students SET score1 ='$score1', score2='$score2',score3='$score3',score4='$score4',score5='$score5' WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("Location: db.php");
} else {
    echo "Error updating record: " . $conn->error;
}



$conn->close();
?>