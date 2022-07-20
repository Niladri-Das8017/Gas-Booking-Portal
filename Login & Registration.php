<?php
	session_start();
	if (isset($_SESSION["state"])&&$_SESSION["state"] == "active") {

		header('location:Booking.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width = device-width, initial-scale = 1">

	<title>Login or Registration  </title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<style>

		body{
			background: linear-gradient(rgba(0, 0, 50, 0.5),rgba(0, 0, 50, 0.5)), url(image.jpg);
		}
		.login-box{
			max-width: 700px;
			float: none;
			margin: 90px auto;
		}
		.left{
			background-color: rgba(211, 211, 211, 0.5);
			padding: 10px;
		}
		.right{
			background: #fff;
			padding: 10px;
		}
		h1{
			text-align: Center;
			color: red;
			font-size: 50px;
		}

	</style>
</head>

<body>
	
	<div class="container">	
		<a href="Index.php" style="text-decoration: none">
			<h1>Calcutta Oil & Gas Agency</h1>
		</a>

		<div class="login-box">
			<div class="row">
				<div class="col-md-6 left">

					<h2>Login here</h2>

					<form action="Login Verification.php" method="post">
						<div class="form-group">

							<label for="phone"><b>Mobile No.</b></label>

							<input type="tel" id="phone" name="phone" class="form-control" pattern="[0-9]{10}" required>

							<span style="font-size: 15px">(Must input 10 digit)</span>

						</div>
						<button type="submit" class="btn btn-primary">Login</button>
						
						<!--Log in faild meessege-->
						<?php
						if ( isset($_SESSION["error"])) {
						?>						
							<div class="alert alert-danger alert-dismissible">
    						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							    <strong>
							    <?php
							    echo $_SESSION["error"];
							    $_SESSION["error"] = NULL;
							     
							     ?>	
							     </strong>
	  						</div>
  						<?php
  						}
						?>

					</form>
				</div>

				<div class="col-md-6 right">

					<h2>Register here</h2>

					<form action="Registration process.php" method="post">

						<div class="form-group">
							<label for="uname"><b>User-Name:</b></label>
							<input type="text" id="uname" name="uname" class="form-control" placeholder="Full Name" pattern="^[A-Z][a-z]+\s[A-Z][a-z]+$" required>
							
						</div>
						<div class="form-group">

							<label for="phone"><b>Mobile No.</b></label>

							<input type="tel" id="phone" name="phone" class="form-control" placeholder="Mobile Number" pattern="[0-9]{10}" required>

							<span style="font-size: 15px">(Must input 10 digit)</span>

						</div>
						<div class="form-group">
							<label for="add"><b>Address:</b></label>
							<input type="text" id="add" name="add" class="form-control" placeholder="Permanent Address" required>
						</div>

						<div class="form-group">
							<input type="hidden" id="reg" name="reg" class="form-control" value="yes">
						</div>
						
						<button type="submit" class="btn btn-primary">Register</button>
						
					</form>
				</div>
				
			</div>
		</div>




	</div>
</body>
</html>