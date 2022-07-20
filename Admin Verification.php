<?php

session_start();

include("Connection.php");

$aid = $_POST['aid'];
$psw = sha1($_POST['psw']);

$s = "select * from admin where aid = '$aid' && psw = '$psw' ";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1)
{
	$_SESSION["admin"] = "active";
	$_SESSION["aid"] = $aid; 
	header('location:Admin.php');

}
else
{
	$_SESSION["admin"] = NULL;
	$_SESSION['verification'] = "Faild to verify";
	header('location:Admin Login.php');
}

?>