<?php
include_once("config.php");
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
$fname     = ucwords($_GET["username"]);
$score    = $_GET["score"];
$sql = "INSERT INTO scores (name,score)
values('" . $fname . "','" . $score . "')";
mysql_query($sql);
echo $_GET['callback'] . "(" . json_encode(array(
    "fname" => $fname
)) . ");";

?>