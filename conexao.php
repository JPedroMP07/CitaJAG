<?php
$host = "localhost";
$db = "u813875533_citajag";
$user = "u813875533_citajag_admin";
$pass = "Desenvolvedora#JPC0715";

$mysqli = new mysqli($host, $user, $pass, $db);
if($mysqli->connect_errno){
    die("Falha de conexão");
}

?>