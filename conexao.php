<?php
$host = "localhost";
$db = "**************";
$user = "************";
$pass = "********";

$mysqli = new mysqli($host, $user, $pass, $db);
if($mysqli->connect_errno){
    die("Falha de conexão");
}

?>
