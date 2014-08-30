<?php
include_once("config.php");

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");

$username = $_GET["username"];

$usernamecode = "";
$sql    = "SELECT email FROM users WHERE username = '" . $username . "'";
$select = mysql_query($sql);
if (mysql_num_rows($select) > 0) {
    $usernamecode = "exists";
} else {
    $usernamecode = "notexists";
}
echo $_GET['callback'] . "(" . json_encode(array(
   
    "username" => $username,
    "uexists" => $usernamecode
)) . ");";
?>