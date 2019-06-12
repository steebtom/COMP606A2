<?php

error_reporting(0);

$user = "root";
$password = "";
$database = "php2";
$host = "localhost";

$mysqli = mysqli_connect($host, $user, $password, $database);
if ($mysqli == false)
{
  header("location: index.php");
}

$mysqli->autocommit(true);

error_reporting(E_ALL);

?>
