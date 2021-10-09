<?php
//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("mysql://b0dcb3da6bfea5:e7b37955@us-cdbr-east-04.cleardb.com/heroku_8f1ffd4429f5f04?reconnect=true"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
 header("Location: db.php");
?>