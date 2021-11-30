<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['error'])) {
    echo $_SESSION['error'];
}
?>
<html>
    <style>
        body {
            font-size:2em;
            background: linear-gradient(45deg, rgba(219,159,17,1) 19%, rgba(70,22,107,1) 80%);
            background-size: 2000px 2000px ;
            /*background-repeat: no-repeat;*/
            text-align: center;
            vertical-align: bottom;

        }
        td{
            border: 3px solid black;
            text-align:center;
            vertical-align: middle;
            padding: 2em;
        }
        .btn {
            color:white;
            padding: .5em .5em;

            background: black;
            transition: background .5s;
            border-radius: 1em;
            font-size: 1em;
        }
         .btna {
            color:white;
            padding: .3em .3em;
            background: black;
            transition: background .5s;
            border-radius: 5em;
            display: block;
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
    <body>
        <p>
        <table>

            <tr>
                <td> 
                    <br>
                    <form action="authenticate.php" method="POST">
                        Username: <input type="text" name="username">
                        <br>
                        Password: <input type="password" name="pwd"><br>
                        <a class="btn" href="signup.php"><strong>Register</strong></a>
                        <input class="btn" type="submit"/>
                    </form>
                    <br>
                </td>

        </table>

    </p>
</body>
</html>

