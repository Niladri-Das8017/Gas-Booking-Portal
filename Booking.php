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
		 
		<title> Booking Page</title>

		<style>

			/*Style the body*/
			body,.modal-content{
				background: linear-gradient(rgba(0, 0, 50, 0.5),rgba(0, 0, 50, 0.5)), url(wok-ring.jpg);
				background-size: cover;
				font-family: Arial, Helvetica, sans-serif;
				margin: 0px auto;
			}
			
			/* Style the header */
			header {
				background-color: rgba(255, 0, 0, 0.3);
				padding: 40px;
				text-align: center;
				color: white;
			}
			h2{
				color: white;
				font-family: arial;
			}
			/*Style the table*/
			table{
				width:100%;
			}

			.scroll {
			    height: 400px;
			    overflow-y: scroll;
			    width: 100%;
			}

			/*To hide scrollbar*/
			::-webkit-scrollbar {
 			   width: 0px;
    		background: transparent; /* make scrollbar transparent */
			}

			.modal-header{
				background-color: rgba(0, 0, 255, 0.4);
				text-align: center;
				color: white;
			}
			p1{
				font-size: 25px;
				color: rgba(255, 255, 255, 1);
				font-weight: bolder;
			}
			p2{
				font-size: 20px;
				color: rgba(189, 164, 101, 0.9);
				font-weight: strong;
			}
		</style>
	</head>
	
	<!--Body Part-->
	<body>
		

		<a href="Index.php" style="text-decoration: none">
			<header>
				<h1>Calcutta Oil & Gas Agency</h1>
			</header>
		</a>

		<div class="container">

			<!--Database Connection-->
			<?php

				include("Connection.php");

				$phone = $_SESSION['phone'];

				$s = "SELECT * FROM user WHERE phone = '$phone' ";

				$result = mysqli_query($con, $s);
				$row = mysqli_fetch_assoc($result);

				if (!isset($row['uname'])) {
					$_SESSION["state"]=NULL;
					header('location:Login & Registration.php');
					
				}
			?>


			<h2> 
				Welcome <?php echo $row['uname'];?>
			</h2>

			<!--Log Out Button-->
			<a href="Logout.php" class="btn btn-primary float-right">Logout</a>

			<!--Modal- Account-->
			<button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#account">My Account</button>
			<!--Modal-->
 	 			<div class="modal fade" id="account">	
 	 				<div class="modal-dialog modal-lg">
 	 					<div class="modal-content">

 	 						<!--Modal Header-->
 	 						<div class="modal-header">
 	 								<h1 class="modal-title">Account Info</h1>
 	 							<button type="button" class="close" data-dismiss="modal">&times</button><!--X button-->
 	 						</div>

 	 						<!--Modal Body-->
 	 						<div class="modal-body">
 	 							<form action="Update.php" class="float-right" method="post">

 	 								<input type="hidden" name="ph" value=<?php echo $phone ?>>
 	 								<button type="submit" class="btn btn-warning">Update</button>

 	 							</form>

								<p1>User Name: </p1><p2><?php echo $row['uname'];?></p2>
								<br>
								<p1>Mobile No: </p1><p2><?php echo $row['phone'];?></p2>
								<br>
								<p1>Address: </p1><p2><?php echo $row['uadd'];?></p2>
								<br>

 	 						</div>

 	 						<!--Modal Footer-->
 	 						<div class="modal-footer">
 	 							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
 	 						</div>
 	 						
 	 					</div>
 	 				</div>

				</div>

			<!--Booking Button-->
			<!--Phone no will be send through $_SESSION-->
			<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#booking">Booking</button>
			<!--Booking Modal-->
			<div class="modal fade" id="booking">	
		 		<div class="modal-dialog modal-dialog-centered">
		 			<div class="modal-content">

		 				<!--Modal Header-->
		 				<div class="modal-header">
		 	 				<h1 class="modal-title">Booking Confirmation</h1>
		 	 				<button type="button" class="close" data-dismiss="modal">&times</button><!--X button-->
		 	 			</div>

		 	 			<!--Modal Body-->
		 	 			<form action="Booking Process.php" method="post">
			 	 			<div class="modal-body">

								<p2 style="font-weight: bold">Press Yes to confirm request, otherwise press No</p2>

								<input type="hidden" name="booking" value="yes">								

	 						</div>

							<div class="modal-footer">
								<button type="submit" class="btn btn-danger">yes</button>
								<button type="button" class="btn btn-success" data-dismiss="modal">No</button>
							</div>
						</form>
		 	 						
 					</div>
 				</div>
			</div>

			<!--Colapsable History-->
			<button type="button" class="btn btn-warning" data-toggle="collapse" data-target="#history">Booking History</button>
 	 			<div id="history" class="collapse">
 	 				<div class="scroll">	

						<table class="table table-warning table-hover">
					

							<?php
								
								$s1 = "SELECT * FROM booking WHERE phone = '$phone' ";
								$result1 = mysqli_query($con, $s1);

								if (mysqli_num_rows($result1)>0) {

									?>
									<thead>
										<tr>
											<th>Booking Id</th>
											<th>Date</th>
										</tr>
									</thead>
									<tbody>
										<?php
										while($row1 =mysqli_fetch_assoc($result1)){

											echo "<tr><td>".$row1['bid']."</td><td>".$row1['date']."</td></tr>";
										}
										?>
									</tbody>
									<?php
								}

								else{
									?>
									<div class="alert alert-danger">
										<strong>No Booking Yet!</strong> 
									</div>
									<?php
								}

							?>

						</table>
					</div>
				</div>

			<?php
			if (isset($_SESSION['bid'])) {
				?>
						<div class="alert alert-success alert-dismissible">
    						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    						<strong>Booking Successfull. Your Booking ID is- <?php echo $_SESSION['bid']; ?></strong> 
  						</div>
						
					<?php
					$_SESSION['bid'] = NULL;
			}

			if (isset($_SESSION['um1'])) {
				?>
						<div class="alert alert-warning alert-dismissible">
    						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    						<strong><?php echo $_SESSION['um1']; ?></strong> 
  						</div>
						
					<?php
					$_SESSION['um1'] = NULL;
			}
			if (isset($_SESSION['um'])) {
				?>
						<div class="alert alert-danger alert-dismissible">
    						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    						<strong><?php echo $_SESSION['um']; ?></strong> 
  						</div>
						
					<?php
					$_SESSION['um'] = NULL;
			}			
			if (isset($_SESSION['um3'])) {
				?>
						<div class="alert alert-warning alert-dismissible">
    						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    						<strong><?php echo $_SESSION['um3']; ?></strong> 
  						</div>
						
					<?php
					$_SESSION['um3'] = NULL;
			}			
			if (isset($_SESSION['um2'])) {
				?>
						<div class="alert alert-warning alert-dismissible">
    						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    						<strong><?php echo $_SESSION['um2']; ?></strong> 
  						</div>
						
					<?php
					$_SESSION['um2'] = NULL;
			}

									
			?>	
			
		</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	</body>
</html>