<html>
    <style>
        body {
            font-size: 1.3em;
            /*
            background: rgba(70,22,107,1) 0%;
            */
            background: linear-gradient(45deg, rgba(219,159,17,1) 19%, rgba(70,22,107,1) 80%);
        }
        table{
            font-size: 1em;
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
        input { 
            font-size: 18px;
        }
    </style>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body><?php
        session_start();
        $servername = "us-cdbr-east-04.cleardb.com";
        $username = "b0dcb3da6bfea5";
        $password = "e7b37955";
        $dbname = "heroku_8f1ffd4429f5f04";
        echo '<h1>Welcome  ' . $_SESSION['user'] . "</h1><br>";?>
        
        <a class="btn" href="db.php"><strong>Home</strong></a>
        
        

        <a class="btn" href="Inbox.php"><strong>View Inbox</strong></a>
        <br><br>
            <?php
// Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT id, name, score1, score2, score3, score4, score5 FROM students";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            echo '<table>';
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $url = "delrow.php?id=$id";
                $urla = "addnewscore.php?id=$id";
                $urlb = "sendMessage.php?id=$id";
                $link = "<a class='btn' href ='$url'>Delete</a>";
                $linka = "<a class='btn' href ='$urla'>Add new Rating</a>";
                $linkb = "<a class='btn' href ='$urlb'>Request Roommate</a>";
                
                    if (round($row["score1"]) == 1) {
                        $cleanliness = 'Slovenly';
                    } elseif (round($row["score1"]) == 2) {
                        $cleanliness = 'Messy';
                    } elseif (round($row["score1"]) == 3) {
                        $cleanliness = 'Average';
                    } elseif (round($row["score1"]) == 4) {
                        $cleanliness = 'Clean';
                    } else {
                        $cleanliness = 'Spotless';
                    }
                    if (round($row["score2"]) == 1) {
                        $studious = 'Never';
                    } elseif (round($row["score2"]) == 2) {
                        $studious = 'Occasionally';
                    } elseif (round($row["score2"]) == 3) {
                        $studious = 'Average';
                    } elseif (round($row["score2"]) == 4) {
                        $studious = 'Often';
                    } else {
                        $studious = 'Constant';
                    }
                    if (round($row["score3"]) == 1) {
                        $sociability = 'Hermit';
                    } elseif (round($row["score3"]) == 2) {
                        $sociability = 'Rare guest';
                    } elseif (round($row["score3"]) == 3) {
                        $sociability = 'Occasional guest';
                    } elseif (round($row["score3"]) == 4) {
                        $sociability = 'Weekly guest';
                    } else {
                        $sociability = 'Host';
                    }
                    if (round($row["score4"]) == 1) {
                        $bedtime = '8PM or earlier';
                    } elseif (round($row["score4"]) == 2) {
                        $bedtime = '10PM';
                    } elseif (round($row["score4"]) == 3) {
                        $bedtime = 'Midnight';
                    } elseif (round($row["score4"]) == 4) {
                        $bedtime = '2AM';
                    } else {
                        $bedtime = '4AM or later';
                    }
                    if (round($row["score5"]) == 1) {
                        $sharing = 'Share everything';
                    } elseif (round($row["score5"]) == 2) {
                        $sharing = 'Share most things';
                    } elseif (round($row["score5"]) == 3) {
                        $sharing = 'Share some things';
                    } elseif (round($row["score5"]) == 4) {
                        $sharing = 'Ask first';
                    } else {
                        $sharing = 'Does not share';
                    }
                    if ($_SESSION['user'] === 'admin') {
                    #echo " Name: " . $row["name"] . "<br> Cleanliness " . round($row["score1"]) . "/5  Studious " . round($row["score2"]) . "/5  Sociablility " . round($row["score3"]) . "/5  Bedtime " . round($row["score4"]) . "/5  sharing " . round($row["score5"]) . "/5  " . " $linka " . "$link  <br>";
                    echo " <tr><td> <strong>Name: " . $row["name"] ."</strong><td><strong>ID: " . $row["id"] . "</strong><br></td><td> <strong>Cleanliness:</strong> " . $cleanliness . "<br></td><td>  <strong>Studious:</strong> " . $studious . " <br></td><td> <strong>Sociablility:</strong> " . $sociability . "<br></td><td>  <strong>Bedtime:</strong> " . $bedtime . "</td><td><br>  <strong>Sharing:</strong> " . $sharing . "</td>" ." <td>$link " . "</td><br></th></tr>  ";
                    #echo "<td> Name: " . $row["name"] . " Cleanliness: " . $cleanliness . "  Studious " . $studious . "/5  Sociablility " . round($row["score3"]) . "/5  Bedtime " . round($row["score4"]) . "/5  sharing " . round($row["score5"]) . "/5 <br></td> " . " $linka " . " <br> " . " <br>";
                } else {
                    echo " <tr><td><strong>ID: " . $row["id"] . "</strong><br></td><td> <strong>Cleanliness:</strong> " . $cleanliness . "<br></td><td>  <strong>Studious:</strong> " . $studious . " <br></td><td> <strong>Sociablility:</strong> " . $sociability . "<br></td><td>  <strong>Bedtime:</strong> " . $bedtime . "</td><td><br>  <strong>Sharing:</strong> " . $sharing . "</td>"." <td>$linkb " ;
                }
            }
            echo '</table>';
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>


    </body>
</html>
