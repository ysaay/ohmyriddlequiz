<?php
include_once("config.php");
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
$fname     = ucwords($_GET["fullname"]);
$email     = $_GET["email"];
$username  = $_GET["username"];
$password  = $_GET["pass"];
$sql = "INSERT INTO users (username,password,name,email)
values('" . $username . "','" . $password . "','" . $fname . "','" . $email . "')";
mysql_query($sql);
echo $_GET['callback'] . "(" . json_encode(array(
    "fname" => $fname
)) . ");";

?>