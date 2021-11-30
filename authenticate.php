<?php

session_start();
$servername = "us-cdbr-east-04.cleardb.com";
$username = "b0dcb3da6bfea5";
$password = "e7b37955";
$dbname = "heroku_8f1ffd4429f5f04";
$user = $_POST['username'];
#$email = $_POST['email'];
$pwd = $_POST['pwd'];
#echo $pwd."<br>";
#$demotxt = '$2y$10$mYLNhuQTR8txWlLI6ltNEuCLcASSpupFVEYgRsZf/kHaGNaYwtdKW';
#echo $demotxt."<br>";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT password FROM users Where user = '$user'";
//if ($user === 'user'){
//$sql = "SELECT password FROM users WHERE username = 'user' ";
//}elseif ($user ==='admin'){
//    $sql = "SELECT password FROM users WHERE username = 'admin' ";
//}

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$hashedPass = $row['password'];
#echo $row['password'] .'<br>';
#echo $pwd;

if ($result->num_rows > 0) {
    // output data of each row
    if (password_verify($pwd, $hashedPass)) {
        $_SESSION['user'] = $user;
        header("Location: db.php");
    } else {
        $_SESSION['error'] = 'Invalid username or password';
        #header("Location: login.php");
    }
} else {
    echo "0 results";
}
$conn->close();
