<?php session_start();

$user = $_POST['username'];
$pwd = $_POST['pwd'];


if ($pwd == "secret") {
    $_SESSION['user'] = $user;
    header("Location: db.php");
} else {
    header("Location: login.php");
}
