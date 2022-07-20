<?php
session_start();
if ($_SESSION["admin"] != "active") {

	header('location:Admin Login.php');
}


include("Connection.php");


$aid = $_SESSION['aid'];
$psw = $_POST['npsw'];
$cpsw = $_POST['cpsw'];
$npsw = sha1($psw);

if ($psw!=$cpsw) {

	$_SESSION['psw_msg']="Password dose not matched";
	header('location: Admin.php');

}
else{

	$s1 = "UPDATE `admin` SET `psw` = '$npsw' WHERE `admin`.`aid` = '$aid' ";

	mysqli_query($con, $s1);
	$_SESSION['psw_msg'] = "Password successfully updated";

	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
		<!--Form Auto Submit-->
		<form name="myForm" id="myForm" action="Admin Verification.php" method="post">
			<input type="hidden" name="aid" value=<?php echo $aid; ?>>
			<input type="hidden" name="psw" value=<?php echo $psw; ?>>
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
	<?php
}

?>
	