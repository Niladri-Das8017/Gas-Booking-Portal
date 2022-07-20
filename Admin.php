<?php
	session_start();
	if ($_SESSION["admin"] != "active") {

		header('location:Admin Login.php');
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

		<title> Admin Page</title>
		<style>

			/*Style the body*/
			body{
				background: linear-gradient(rgba(0, 0, 50, 0.5),rgba(0, 0, 50, 0.5)), url(wok-ring.jpg);
				background-size: cover;
				font-family: Arial, Helvetica, sans-serif;
				margin: 0px auto;
			}
			
			/* Style the header */
			header {
				background-color: rgba(255, 0, 0, 0.45);
				padding: 40px;
				text-align: center;
				color: white;
			}
			h2{
				color: rgb(204, 136, 0);
				font-family: arial;
			}
			p1{
				color: white;
			}
			/*Style the table*/
			table{
				width: 100%;
			}

			.scroll {
			    height: 200px;
			    overflow-y: scroll;
			    width: 100%;
			}

			/*To hide scrollbar*/
			::-webkit-scrollbar {
 			   width: 0px;
    		background: transparent; /* make scrollbar transparent */
			}

			/*Style The Search Box*/
			.search-box {
				position: absolute;
				height: 50px;
				border-radius: 40px;
				background: rgb(255, 255, 255);
			}

			.search-box:hover > .search-txt {
				width: 500px;
				padding: 0 6px;
				padding-left: 20px;
			}

			.search-box:hover > .search-btn {
				background: rgba(255, 153, 255, 0);
				color: rgb(2, 117, 216);
				border: 1px;

			}
			.search-txt:focus{
				width: 500px;
				padding: 0 6px;
				padding-left: 20px;
			}
			.search-txt:focus + .search-btn{
				background: rgba(255, 153, 255, 0);
				color: rgb(2, 117, 216);
				border: 1px;
			}

			.search-btn {
				float: right;
				width: 50px;
				height: 50px;
				border-top-color: rgb(255, 0, 0);
				border-left-color: rgb(255, 0, 0);
				border-bottom-color: rgb(0, 255, 0);
				border-right-color: rgb(0, 255, 0);
				border-radius: 50%;
				background: rgb(2, 117, 216);
				display: flex;
				justify-content: center;
				align-items: center;
				transition: 0.4s;
				color: rgb(255, 255, 255);
				cursor: pointer;
			}

			.search-btn > i {
				font-size: 20px;
			}

			.search-txt {
			border: none;
			background: none;
			outline: none;
			float: left;
			padding: 0px;
			font-size: 16px;
			transition: 0.4s;
			line-height: 50px;
			width: 0px;
			font-weight: solid;
			}

			.mhead{
				background-color: rgba(240,104,0,0.5);
			}
			.dhead{
				background-color: rgba(255, 0, 0, 0.55);
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

		
		<!--Database Connection-->
		<?php

			include("Connection.php");

			$aid = $_SESSION['aid'];

			$s = "SELECT * FROM admin WHERE aid = '$aid' ";

			$result = mysqli_query($con, $s);
			$row = mysqli_fetch_assoc($result);


		?>
		<div class="container">

			<h2> 
				Welcome <?php echo $row['aname'];?>
			</h2>			

			<!--Log Out Button-->
			<a href="Admin Logout.php" class="btn btn-primary float-right">Logout</a>

			<!--Reset Password Button-->
			<button type="button" class="btn btn-warning float-right" data-toggle="modal" data-target="#update">Reset Passward</button>
			<!--Update Modal-->
	 			<div class="modal fade" id="update">	
	 				<div class="modal-dialog modal-dialog-centered">
	 					<div class="modal-content">

	 						<!--Modal Header-->
	 						<div class="modal-header mhead">
	 								<h1 class="modal-title">Reset Password</h1>
	 							<button type="button" class="close" data-dismiss="modal">&times</button><!--X button-->
	 						</div>

	 						<div class="modal-body mbody">
 	 						<form action="Admin Update.php" method="post">

								<div class="form-group">
									<label for="npsw"><b>New Passward</b></label>
									<input type="password" id="npsw" name="npsw" class="form-control" required>
									
								</div>
								<div class="form-group">

									<label for="cpsw"><b>Confirm Passward</b></label>

									<input type="password" id="cpsw" name="cpsw" class="form-control" required>

								</div>

								<button type="submit" class="btn btn-warning">Reset</button>

							</form>
	 						</div>
	 					</div>
	 				</div>

			</div>

			<!--Search Bar-->
			<form action="Admin.php" method="get">
				<div class="search-box">
					<input type="tel" id="search" name="search" class="search-txt" pattern="[0-9]{10}" placeholder="Search user" required >
					<button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
				</div>		
			</form>
			<br>
			<br>
			<!--Delete Messege-->
			<?php
			if (isset($_SESSION['del'])) {
				?>
						<div class="alert alert-danger alert-dismissible">
    						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    						<strong><?php echo $_SESSION['del']; ?></strong> 
  						</div>
						
					<?php
					$_SESSION['del'] = NULL;
			}
			?>

			<!--Passward Reset Messege-->
			<?php
			if (isset($_SESSION['psw_msg'])) {
				if($_SESSION['psw_msg']=="Password successfully updated"){
				?>		
						<br>
						<div class="alert alert-warning alert-dismissible">
    						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    						<strong><?php echo $_SESSION['psw_msg']; ?></strong> 
  						</div>
						
					<?php
				}
				else{
				?>		
						<br>
						<div class="alert alert-danger alert-dismissible">
    						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    						<strong><?php echo $_SESSION['psw_msg']; ?></strong> 
  						</div>
						
					<?php
				}
					$_SESSION['psw_msg'] = NULL;
			}
			?>


			<!--User Data-->
			<?php
				if (isset($_GET['search'])) {

					$phone = $_GET['search'];
					$s1 = "SELECT * FROM user WHERE phone=$phone";
					$result1 = mysqli_query($con,$s1);
					$num1 = mysqli_num_rows($result1);
					echo "<br>";

					if ($num1==1) {

					?>
						<table class="table table-warning table-hover">
							<thead>
								<tr>
									<th>User Name</th>
									<th>Mobile No</th>
									<th>Address</th>
								</tr>
							</thead>
							<tbody>
								<?php

								$row1 =mysqli_fetch_assoc($result1);
								echo "<tr><td>".$row1['uname']."</td><td>".$row1['phone']."</td><td>".$row1['add']."</td></tr>"

								?>
							</tbody>
						</table>

						<!--Delete Button-->
						<button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#delete">Delete User</button>
						<!--Modal-->
		 	 			<div class="modal fade" id="delete">	
		 	 				<div class="modal-dialog modal-dialog-centered">
		 	 					<div class="modal-content">

		 	 						<!--Modal Header-->
		 	 						<div class="modal-header dhead">
		 	 								<h1 class="modal-title">Delete Account</h1>
		 	 							<button type="button" class="close" data-dismiss="modal">&times</button><!--X button-->
		 	 						</div>

		 	 						<form action="delete.php" method="post">
			 	 						<!--Modal Body-->
			 	 						<div class="modal-body">

											<p2 style="font-weight: bold">Are you sure you want to delete this account?</p2>

											<input type="hidden" name="ph" value=<?php echo $phone ?>>

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
									<table class="table table-danger table-hover">
							

									<?php
										
										$s2 = "SELECT * FROM booking WHERE phone = '$phone' ";
										$result2 = mysqli_query($con, $s2);
										$num2 = mysqli_num_rows($result2);

										if ($num2>0) {

									?>
										<thead>
											<tr>
												<th>Booking Id</th>
												<th>Date</th>
											</tr>
										</thead>
										<tbody>

											<?php
											while($row2 =mysqli_fetch_assoc($result2)){

												echo "<tr><td>".$row2['bid']."</td><td>".$row2['date']."</td></tr>";
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
					}
					else{

						?>
						<div class="alert alert-warning alert-dismissible">
    						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    						<strong>No Such User!</strong> 
  						</div>
						
					<?php
					}
				}


			?>

		</div>

	</body>
</html>