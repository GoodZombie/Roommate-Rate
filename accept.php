<!DOCTYPE html>
<?php
session_start();
$servername = "us-cdbr-east-04.cleardb.com";
$username = "b0dcb3da6bfea5";
$password = "e7b37955";
$dbname = "heroku_8f1ffd4429f5f04";
?>
<html>
    <style>
        body {
            font-size: 2em;
            text-align: center;
            /*
            
            background: rgba(70,22,107,1) 0%;
            */
            background: linear-gradient(45deg, rgba(219,159,17,1) 19%, rgba(70,22,107,1) 80%);
        }
        table{
            font-size: 1.5em;
            background: linear-gradient(45deg, rgba(219,159,17,1) 19%, rgba(70,22,107,1) 80%);

        }
        td{
            border: 1px solid black;
            background-color: rgba(219,159,17,1);
            text-align:left;
            vertical-align: middle;
        }
        th{
            border: 1px solid black;
            text-align: center;
            vertical-align: middle;
        }
        .btn {
            color:white;
            padding: .3em .3em;
            background: black;
            transition: background .5s;
            border-radius: 5em;


        }
        .btn:hover{
            background:blue;
            cursor:pointer;
        }
        .btna {
            color:white;
            padding: .3em .3em;
            background: black;
            transition: background .5s;
            border-radius: 5em;
            display: block;


        }
        .center {
            margin-left: auto;
            margin-right: auto;
        }
        .btna:hover{
            background:blue;
            cursor:pointer;
        }
        input { 
            font-size: 18px;
        }
    </style>

    <?php
// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $user = $_SESSION['user'];
    $id = $_GET['id'];
    echo '<h1>Welcome  ' . $_SESSION['user'] . "</h1><br>";
    ?>




    <br><br>
    <?php
    $sql = "SELECT sender FROM messages WHERE id='$id'";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        // output data of each row
        $namev = $row["sender"];
        $sql = "SELECT id FROM students WHERE name='$namev'";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $url = "addnewscore.php?id=$id";
            header("Location: $url");
        }
    }

        $conn->close();
        ?>
   