<?php

session_start();
$servername = "us-cdbr-east-04.cleardb.com";
$username = "b0dcb3da6bfea5";
$password = "e7b37955";
$dbname = "heroku_8f1ffd4429f5f04";
$user = $_POST['username'];
$pwdv = $_POST['pwdv'];
$pwd = $_POST['pwd'];
#echo $pwd."<br>";
#$demotxt = '$2y$10$mYLNhuQTR8txWlLI6ltNEuCLcASSpupFVEYgRsZf/kHaGNaYwtdKW';
#echo $demotxt."<br>";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (!($pwd === $pwdv)) {
    $_SESSION['error'] = "Passwords do not match!";
    header("Location: signup.php");
    exit;
}
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "Select user FROM users WHERE user=$user";
$result = $conn->query($sql);

if ($result) {
    $_SESSION['error'] = "Username already in use!";
    header("Location: signup.php");
    exit;
}
$pwd = password_hash($pwd, PASSWORD_DEFAULT);
$sql = "INSERT INTO users (user,password)
VALUES ('$user','$pwd')";

//if ($user === 'user'){
//$sql = "SELECT password FROM users WHERE username = 'user' ";
//}elseif ($user ==='admin'){
//    $sql = "SELECT password FROM users WHERE username = 'admin' ";
//}
if ($conn->query($sql) === TRUE) {
    header("Location: login.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
#echo $row['password'] .'<br>';
#echo $pwd;
//if ($result->num_rows > 0) {
//  // output data of each row
//  if ($pwd ===$row['password']){
//    $_SESSION['user'] = $user;
//    #header("Location: db.php");
//} else {
//    $_SESSION['error'] = 'Invalid username or password';
//    #header("Location: login.php");
//}
//} else {
//  echo "0 results";
//}
$conn->close();
