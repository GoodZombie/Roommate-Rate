<html>
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
        #var_dump($_GET);
        $id = $_GET['id'];
        echo 'Welcome  ' . $_SESSION['user'] . "<br>";
// Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT id, name, score1, score2, score3, score4, score5 FROM students";
        $result = $conn->query($sql);

        $conn->close();
        ?>

        <form action="addnewscoreproc.php" method="post">
            <label for="score1">Cleanliness 1 =least clean 5 = cleanest</label><br>
            <input type="number" id="score1" name="score1"><br>
            <label for="score2">Do you study Rarely(1) to Often(5)</label><br>
            <input type="number" id="score2" name="score2"><br>
            <label for="score3">Do you plan to have guest Rarely(1) to Often(5) </label><br>
            <input type="number" id="score3" name="score3"><br>
            <label for="score4">Do you go to bed early(1) or Late(5)</label><br>
            <input type="number" id="score4" name="score4"><br>
            <label for="score5">Do you prefer to share groceries(1) or Hands off(5)</label><br>
            <input type="number" id="score5" name="score5"><br>
            <input type="hidden" id="id" name="id" value='<?php echo $id; ?>'>
            <button formaction="addnewscoreproc.php">Add New Score</button>

        </form>
    </body>
</html>
