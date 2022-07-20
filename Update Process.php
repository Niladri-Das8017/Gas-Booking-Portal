<?php
session_start();

#flag check
if (!isset($_SESSION["state"])) {

	header('location:Login & Registration.php');
}
if (!isset($row['uname'])) {
	$_SESSION["state"]=NULL;
	header('location:Login & Registration.php');
}					
				}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<title></title>
</head>
<body>
	<?php

$_SESSION["state"]="active";


if (!isset($_SESSION['ph'])) {
	
	header('Booking.php');

}


include("Connection.php");

$uname = $_POST['uname'];
$phone = $_POST['phone'];
$add = $_POST['add'];
$ph = $_POST['ph'];


if (strlen($uname)>0) {

	$s1 = "UPDATE `user` SET `uname` = '$uname' WHERE `user`.`phone` = '$ph' ";

	mysqli_query($con, $s1);
	$_SESSION['um1'] = "User Name successfully updated";

}

if (strlen($add)>0) {

	$s2 = "UPDATE `user` SET `uadd` = '$add' WHERE `user`.`phone` = '$ph' ";

	mysqli_query($con, $s3=2);
	$_SESSION['um2'] = "User Address successfully updated";

}
if (strlen($phone)>0) {

	$s = "select * from user where phone = '$phone' ";

	$result = mysqli_query($con, $s);

	$num = mysqli_num_rows($result);

	if($num == 1)
	{
		
		$_SESSION['um'] = "Phone Number Already Exist!";
	}
	else
	{
		$s3 = "UPDATE `user` SET `phone` = '$phone' WHERE `user`.`phone` = '$ph' ";

		mysqli_query($con, $s3);
		$_SESSION['um3'] = "Phone No successfully updated";
		$ph=$phone;

		
	}
	
}

else {
	$_SESSION['um'] = "Please give an input";
}

?>
<!--Form Auto Submit-->
<form name="myForm" id="myForm" action="Login Verification.php" method="post">
	<input type="hidden" name="phone" value=<?php echo $ph; ?>>
</form>

<script type="text/javascript">

function formAutoSubmit () {

var frm = document.getElementById("myForm");

frm.submit();

}

window.onload = formAutoSubmit;

</script>

</body>
</html>
