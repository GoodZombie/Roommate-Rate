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
    echo '<h1>Welcome  ' . $_SESSION['user'] . "</h1><br>";
    ?>

    <a class="btn" href="db.php"><strong>Home</strong></a>

    <a class="btn" href="roommatebrowse.php"><strong>View roommates</strong></a>


    <br><br>
    <?php
    $sql = "SELECT id,sender,message,recipient FROM messages WHERE recipient='$user'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        echo "<table>";
        while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $url = "accept.php?id=$id";
                $link = "<a class='btna' href ='$url'><strong>Accept</strong></a>";
            echo "<tr><td>From: " . $row["sender"] . "</td><td>" . $row["message"] . "</td><td>" . $link . "</td><td>" . '<a class="btn" href="decline.php"><strong>Decline</strong></a>' . "</td></tr>";
        }
    } else {
        echo "0 results";
    }
    echo "</table>";
    $conn->close();
    ?>
    