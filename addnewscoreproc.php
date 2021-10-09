<?php

session_start();
$servername = "us-cdbr-east-04.cleardb.com";
$username = "b0dcb3da6bfea5";
$password = "e7b37955";
$dbname = "heroku_8f1ffd4429f5f04";
$_SESSION["id"] = $_GET['id'];
$id = $_GET['id'];

#var_dump($_POST);
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT score1,score2,score3,score4,score5 FROM students WHERE id='$id'";
var_dump($sql);
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "score1: " . $row["score1"] . "score2: " . $row["score2"] . "score3: " . $row["score3"] . "score4: " . $row["score4"] . "score5: " . $row["score5"] . "<br>";
        $score1 = $row["score1"];
        $score2 = $row["score2"];
        $score3 = $row["score3"];
        $score4 = $row["score4"];
        $score5 = $row["score5"];
    }
} else {
    echo "0 results";
}
$nscore1 = $_POST["score1"];
$nscore2 = $_POST["score2"];
$nscore3 = $_POST["score3"];
$nscore4 = $_POST["score4"];
$nscore5 = $_POST["score5"];

$_SESSION["score1"] = ($score1 + $nscore1) / 2;
$_SESSION["score2"] = ($score2 + $nscore2) / 2;
$_SESSION["score3"] = ($score3 + $nscore3) / 2;
$_SESSION["score4"] = ($score4 + $nscore4) / 2;
$_SESSION["score5"] = ($score5 + $nscore5) / 2;
var_dump($_SESSION);
#header("Location: scoreupdate.php");
$conn->close();
?>

