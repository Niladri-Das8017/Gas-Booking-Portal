<?php
	session_start();
	if ($_SESSION["admin"] != "active") {

		header('location:Admin Login.php');
	}
	if (!isset($_POST['ph'])) {
		header('location:Admin.php');
	}

	
	include("Connection.php");

	$phone = $_POST['ph'];

	$s = "SELECT * FROM user WHERE phone = $phone ";
	$result = mysqli_query($con, $s);
	$row = mysqli_fetch_assoc($result);

	$name = $row['uname'];
	
	$s1 = "DELETE FROM user WHERE phone = $phone ";

	mysqli_query($con, $s1);

	$_SESSION['del'] = "User account named ".$name." has deleted";

	header('location:Admin.php');

?>