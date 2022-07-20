<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gas";

$con = mysqli_connect($servername, $username, $password, $dbname);

if(!$con)
{
	die("connection faliour because".mysqli_connect_error());
}
?>