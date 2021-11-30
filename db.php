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
            font-size: .75em;
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
        if (isset($_SESSION['user'])) {
            echo 'Welcome  ' . $_SESSION['user'] . "<br>";
        } else {
            header("Location: index.php");
            exit;
        }
        ?><br>
        <a class="btn" href="roommatebrowse.php"><strong>View roommates</strong></a>

        <a class="btn" href="Inbox.php"><strong>View Inbox</strong></a>
        <br><br>
        <h1>Sample results</h1>
        <?php
// Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $counter = 0;
        $sql = "SELECT id, name, score1, score2, score3, score4, score5 FROM students1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            echo '<table class="center">';
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $url = "delrow.php?id=$id";
                $urla = "addnewscore.php?id=$id";
                $link = "<a class='btna' href ='$url'>Delete</a>";
                $linka = "<a class='btna' href ='$urla'>Rate Me</a>";

                if (round($row["score1"]) == 1) {
                    $cleanliness = 'Slovenly / 1';
                } elseif (round($row["score1"]) == 2) {
                    $cleanliness = 'Messy / 2';
                } elseif (round($row["score1"]) == 3) {
                    $cleanliness = 'Average / 3';
                } elseif (round($row["score1"]) == 4) {
                    $cleanliness = 'Clean / 4';
                } else {
                    $cleanliness = 'Spotless / 5';
                }
                if (round($row["score2"]) == 1) {
                    $studious = 'Never / 1';
                } elseif (round($row["score2"]) == 2) {
                    $studious = 'Occasionally / 2';
                } elseif (round($row["score2"]) == 3) {
                    $studious = 'Average / 3';
                } elseif (round($row["score2"]) == 4) {
                    $studious = 'Often / 4';
                } else {
                    $studious = 'Constant / 5';
                }
                if (round($row["score3"]) == 1) {
                    $sociability = 'Hermit / 1';
                } elseif (round($row["score3"]) == 2) {
                    $sociability = 'Rare guest / 2';
                } elseif (round($row["score3"]) == 3) {
                    $sociability = 'Occasional guest / 3';
                } elseif (round($row["score3"]) == 4) {
                    $sociability = 'Weekly guest / 4';
                } else {
                    $sociability = 'Host / 5';
                }
                if (round($row["score4"]) == 1) {
                    $bedtime = '8PM or earlier / 1';
                } elseif (round($row["score4"]) == 2) {
                    $bedtime = '10PM / 2';
                } elseif (round($row["score4"]) == 3) {
                    $bedtime = 'Midnight / 3';
                } elseif (round($row["score4"]) == 4) {
                    $bedtime = '2AM/4';
                } else {
                    $bedtime = '4AM or later / 5';
                }
                if (round($row["score5"]) == 1) {
                    $sharing = 'Share everything / 1';
                } elseif (round($row["score5"]) == 2) {
                    $sharing = 'Share most things / 2';
                } elseif (round($row["score5"]) == 3) {
                    $sharing = 'Share some things / 3';
                } elseif (round($row["score5"]) == 4) {
                    $sharing = 'Ask first / 4';
                } else {
                    $sharing = 'Does not share / 5';
                }if ($_SESSION['user'] === 'admin') {
                    #echo " Name: " . $row["name"] . "<br> Cleanliness " . round($row["score1"]) . "/5  Studiousness " . round($row["score2"]) . "/5  Sociablility " . round($row["score3"]) . "/5  Bedtime " . round($row["score4"]) . "/5  sharing " . round($row["score5"]) . "/5  " . " $linka " . "$link  <br>";
                    echo " <tr><td><strong>Name: " . $row["name"] . "</strong><br></td><td> <strong>Cleanliness:</strong> " . $cleanliness . "<br></td><td>  <strong>Studiousness:</strong> " . $studious . " <br></td><td> <strong>Sociablility:</strong> " . $sociability . "<br></td><td>  <strong>Bedtime:</strong> " . $bedtime . "</td><td><br>  <strong>Sharing:</strong> " . $sharing . "<br><br></td><th> " . "$link " . " </th><th><br>" . " $linka " . "<br></th></tr>  ";
                    #echo "<td> Name: " . $row["name"] . " Cleanliness: " . $cleanliness . "  Studiousness " . $studious . "/5  Sociablility " . round($row["score3"]) . "/5  Bedtime " . round($row["score4"]) . "/5  sharing " . round($row["score5"]) . "/5 <br></td> " . " $linka " . " <br> " . " <br>";
                } else {
                    echo " <tr><td><strong>Name: " . $row["name"] . "</strong><br></td><td> <strong>Cleanliness:</strong> " . $cleanliness . "<br></td><td>  <strong>Studiousness:</strong> " . $studious . " <br></td><td> <strong>Sociablility:</strong> " . $sociability . "<br></td><td>  <strong>Bedtime:</strong> " . $bedtime . "</td><td><br>  <strong>Sharing:</strong> " . $sharing . "<br><br></td><th> <td>" . " $linka " . "</td><br></th></tr>  ";
                    if ($counter < 4) {
                        $counter += 1;
                        #echo "<h1>$counter</h1>";
                    } else {
                        break;
                    }
                }
            }
            echo '</table>';
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>

        <form action="skills.php" method="post">
            <br>
            <label for="name">Name</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="score1">Cleanliness 1-5(1 =least clean 5 = cleanest</label><br>
            <input type="number" id="score1" name="score1" min="1" max="5"><br><br>
            <label for="score2">Do you study Rarely(1) to Often(5)</label><br>
            <input type="number" id="score2" name="score2"min="1" max="5"><br><br>
            <label for="score3">Do you plan to have guest Rarely(1) to Often(5) </label><br>
            <input type="number" id="score3" name="score3"min="1" max="5"><br><br>
            <label for="score4">Do you go to bed early(1) or Late(5)</label><br>
            <input type="number" id="score4" name="score4"min="1" max="5"><br><br>
            <label for="score5">Do you prefer to share groceries(1) or Hands off(5)</label><br>
            <input type="number" id="score5" name="score5"min="1" max="5"><br><br>

            <button class="btn" formaction="addnew.php" >Add New Score</button>

        </form>
    </body>
</html>
