<?php
	session_start();
	if ($_POST['reg'] != "yes") {

		header('location:Login & Registration.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width = device-width, initial-scale = 1">

		<title>Registration Process  </title>
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

		<style>
			body{
				background: linear-gradient(rgba(0,0,50,0.5),rgba(0,0,50,0.5)),url(image.jpg);
				padding: 0px;
				margin: 0px;

			}
			.no{
				color: red;
			}
			.yes{
				color: #fff;
			}
			p1{
				color: yellow;
				font-size: 20px;
			}


			a:link, a:visited {
				background-color: #00ccff;
				color: white;
				padding: 14px 25px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
			}

			a:hover, a:active {
			  background-color: #00a3cc;
			}
			.container{
				width: 500px;
				height: 500px;
				position: relative;
			}
			.text{
				position: relative;
				text-align: center;
				top: 30%;
			}

		</style>
	</head>

	<!--body part-->
	<body>
		<div class="container">
			<div class="text">
				<?php


				include("Connection.php");

				$uname = $_POST['uname'];
				$phone = $_POST['phone'];
				$add = $_POST['add'];

				$s = "select * from user where phone = '$phone' ";

				$result = mysqli_query($con, $s);

				$num = mysqli_num_rows($result);

				if($num == 1)
				{
					?>
					<h1 class="no">
						User Already Exist! This Mobile No. is used by another one.
					</h1>
					<?php
				}
				else
				{
					//insert values
					$reg = "INSERT INTO user (uname,phone,uadd) VALUES ('{$uname}', '{$phone}', '{$add}')";
					if(mysqli_query($con, $reg)){
						//echo "success!!!";
				
					}
					else{
						echo("Error description: " . mysqli_error($con));
					}


					$s = "select * from user where phone = $phone";
					$result = mysqli_query($con, $s);
					$row = mysqli_fetch_assoc($result);
					?>

					<h1 class="yes">
						<?php
						echo"Hello ";
						echo $row['uname'];
						echo "<br>";
						?>
					</h1>
					<p1>
						<strong>We are happy to see you here.We hope, you will enjoy our service. You can log in to <b><i>Booking</i></b> page
						by clicking the log in link below.You just have to put your mobile number to log in.</strong>
					</p1>

					<?php

				}
				?>
				<br>
				<a href= "Login & Registration.php">User Login</a>
			</div>
		</div>
	</body>
</html>