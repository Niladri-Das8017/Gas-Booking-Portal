<?php

	session_start();

	include("Connection.php");
	
	$phone = $_POST['phone'];

	$s = "select * from user where phone = '$phone' ";

	$result = mysqli_query($con, $s);

	$num = mysqli_num_rows($result);

	if($num == 1)
	{
		$_SESSION["state"] = "active";
		$_SESSION["phone"] = $phone; 
		header('location:Booking.php');

	}
	else
	{
		$_SESSION["state"] = "";
		$_SESSION["error"] = "Mobile No. dose not matched.";
		header('location:Login & Registration.php');
	}

?>