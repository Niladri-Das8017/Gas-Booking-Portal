<?php
	session_start();

	#flag check
	if ($_SESSION["state"] != "active") {

		header('location:Login & Registration.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

		<title> Update Account </title>
		
		<style>
		
			body{
				background: linear-gradient(rgba(0, 0, 50, 0.5),rgba(0, 0, 50, 0.5)), url(image.jpg);
			}
			h1{
				text-align: Center;
				color: rgb(230, 138, 0);
				font-size: 50px;
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
		</style>
	</head>

	<!--Body Part-->
	<body>

		<div class="container">

			<h1>Update Account</h1>

			<div class="login-box">
				<div class="row">
					<div class="col-md-3"></div>

					<div class="col-md-6 center">
					
						<form action="Update Process.php" method="post">
							<div class="form-group">
								<label for="uname"><b>User-Name:</b></label>
								<input type="text" id="uname" name="uname" class="form-control" placeholder="Full Name" pattern="^[A-Z][a-z]+\s[A-Z][a-z]+$">
								
							</div>
							<div class="form-group">

								<label for="phone"><b>Mobile No.</b></label>

								<input type="tel" id="phone" name="phone" class="form-control" placeholder="Mobile Number" pattern="[0-9]{10}">

								<span style="font-size: 15px">(Must input 10 digit)</span>

							</div>
							<div class="form-group">
								<label for="add"><b>Address:</b></label>
								<input type="text" id="add" name="add" class="form-control" placeholder="Permanent Address">
							</div>

							<div class="form-group">
								<input type="hidden" id="reg" name="reg" class="form-control" value="yes">
							</div>

							<input type="hidden" name="ph" value=<?php echo $_POST['ph'] ?>>
							
							<button type="submit" class="btn btn-primary">Update</button>

						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>