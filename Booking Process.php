<?php
	session_start();
	if ($_SESSION["state"] != "active") {

		header('location:Login & Registration.php');
	}
	elseif (isset($_POST["booking"])&&$_POST["booking"] != "yes") {
		header('location:Login & Registration.php');
	}
	else {


		include("Connection.php");

		$phone = $_SESSION['phone'];

		$s = "INSERT INTO booking (phone,date) values ($phone,NOW())";
		$s1 ="SELECT bid FROM booking where phone = $phone and date = NOW() ";

		mysqli_query($con, $s);
		

		$result = mysqli_query($con, $s1);
		$row =mysqli_fetch_assoc($result);

		$_SESSION['bid'] = $row['bid'];
		header('location:Booking.php');
				
}
?>