<?php
session_start();
$_SESSION["admin"] = "";
header("location: Admin Login.php");

?>