<?php
include_once("config.php");
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
$username = $_GET["username"];
$pass     = $_GET["pass"];
$verifycode = "";

$sql    = "SELECT * FROM users WHERE username = '" . $username . "'";
$select = mysql_query($sql);
if (mysql_num_rows($select) > 0) {
    $sql    = "SELECT * FROM users WHERE username = '" . $username . "' AND password = '" . $pass . "'";
    $select = mysql_query($sql);
    if (mysql_num_rows($select) > 0) {
        $verifycode = "v1";
        
    } else {
        $verifycode = "in";
        
    }
} else {
    $verifycode = "pnf";
  
}

echo $_GET['callback'] . "(" . json_encode(array(
    "username" => $username,
    "verified" => $verifycode
)) . ");";
?>