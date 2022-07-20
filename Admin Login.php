
<?php
	session_start();

		if (isset($_SESSION["admin"])&&$_SESSION["admin"] == "active") {

		header('location:Admin.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

		<title> Admin Login </title>
		<style>
			body{
			background: linear-gradient(rgba(0, 0, 50, 0.5),rgba(0, 0, 50, 0.5)), url(image.jpg);
		}
		.login-box{
			max-width: 700px;
			float: none;
			margin: 90px auto;
		}
		.center{
			background-color: rgba(211, 211, 211, 0.5);
			padding: 10px;

		}
		h1{
			text-align: Center;
			color: red;
			font-size: 50px;
		}
		</style>
	</head>

	<!--Body Part-->
	<body>
		<div class="container">	

			<a href="Index.php" style="text-decoration: none">

					<h1>Calcutta Oil & Gas Agency</h1>

			</a>
			
			<div class="login-box">
				<div class="row">
					<div class="col-md-3"></div>

					<div class="col-md-6 center">
					
						<h2>The Adminstrator</h2>
					
						<form action="Admin Verification.php" method="post">
							<div class="form-group">
								<label for="aid"><b>Admin-id:</b></label>

								<input type="text" maxlength="10" id="aid" name="aid" class="form-control" required>

								<label for="psw"><b>Password:</b></label>

								<input type="password" id="psw" name="psw" class="form-control" required>
							</div>

							<button type="submit" class="btn btn-primary">Login</button>

							<!--Verification faild messege-->
							<?php
							if ( isset($_SESSION['verification'])) {
							?>						
								<div class="alert alert-danger alert-dismissible">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								    <strong>
								    <?php
								    echo $_SESSION['verification'];
								    $_SESSION['verification']=NULL;
								     
								     ?>	
								     </strong>
									</div>
								<?php
							}
							?>
						
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>