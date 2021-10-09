<?php
$servername = "us-cdbr-east-04.cleardb.com";
$username = "b0dcb3da6bfea5";
$password = "e7b37955";
$dbname = "heroku_8f1ffd4429f5f04";
#var_dump($_POST);
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$n = $_POST["name"];
$score1 = $_POST["score1"];
$score2 = $_POST["score2"];
$score3 = $_POST["score3"];
$score4 = $_POST["score4"];
$score5 = $_POST["score5"];

        
$sql = "INSERT INTO students (name, score1, score2, score3, score4, score5)
VALUES ( '$n', $score1,$score2,$score3,$score4,$score5)";

if ($conn->query($sql) === TRUE) {
  
    header("Location: db.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
