<?php 
	session_start();
	if(!isset($_SESSION["admin"]))
		$_SESSION["admin"] = "";

	if(!isset($_SESSION["state"]))
		$_SESSION["state"] = "";

?>


<!doctype html>
<html>

	<head>
		<title>Online Gas Booking System </title>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		
		<style>

			body{
				background: linear-gradient(rgba(0, 0, 50, 0.5),rgba(0, 0, 50, 0.5)), url(image.jpg);
				background-size: cover;
				font-family: Arial, Helvetica, sans-serif;
				margin: 0px auto;
			}
			/* Style the header */
			header {
				padding: 30px;
				background-color:rgba(17,17,17,0.8);
				color: white;
				text-align: center;
				z-index:1;
			}
			/*Style the div*/
			div{
				height : auto;
			} 
			/* Create two columns/boxes that floats next to each other */
			nav {
				float: left;
				width: 30%;
				padding: 20px;
			}
			/* Style the list inside the menu */
			nav ul {
				list-style-type: none;
				padding: 0;
			}
			/* Style the article */
			article {
				float: right;
				padding: 20px;
				width: 70%;
				background-color: rgba(211, 211, 211, 0.5);	
			}
			/* Clear floats after the columns */
			div:after{
				content: "";
				display: table;
				clear: both;
			}
			
			/* Style the footer */
			footer {
				position: fixed;
				left: 0;
				bottom: 0;
				width: 100%;
				padding: 15px;
				text-align: center;
				font-size: 20px;
				background-color: rgba(0, 0, 0, 0.5);
				color: white;
			}
			/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
			@media (max-width: 600px){
				nav,article{
					width: 100%;
					height: auto;
				}
			}
			h2{
				font-size: 25px;
				text-decoration: underline;
				font-weight: bolder;
			}
			h3{
				color: red;
				font-size: 25px;
				font-family: Arial Black;
				font-weight: bold;
				text-decoration: underline;
			}
			p1{
				color: #000000;
				font-size: 17px;
				font-family: Candara;
				font-weight: bold;
			}
			p2{
				color: #840406;
				font-size: 15px;
				font-family: Garamond;
			}
			a.two:link, a.two:visited {
				animation: blinker 1.75s linear infinite;
				background-color: #00ccff;
				color: white;
				padding: 14px 25px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
			}
			@keyframes blinker {  
				0% { opacity: 0; }
			}
			a.two:hover, a.two:active{
				animation: none;
				font-weight: bold;
				background-color: #00a3cc;
			}
			a.one:link, a.one:visited {
				background-color: #f44336;
				color: white;
				padding: 14px 25px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
			}

			a.one:hover, a.one:active {
			  background-color: red;

			}
			.three:link, .three:visited{
				color: #a6a6a6;
			}
			.three:hover, .three:active{
				color: #fff;
				font-weight: bolder;
			}


		 </style>

	</head>

	<!--Body Part-->
	<body>

		<header>
		<h1>Calcutta Oil & Gas Agency<h1>
		</header>

		<div>
			<nav>
				<ul>
					<li><a class="one" href= "Admin.php" target="_blank">Administrator Login</a></li>
					<br>
					<br>
					<li><a class="two btn" href= "Booking.php" target="_blank">Log in/Sign up</a></li>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<li><a class="three btn btn-dark" href= "Help Desk.html" target="_blank" style="text-decoration: none">Helpdesk</a></li>
				</ul>
			</nav>

			<article>
				<h2 >About</h2>
				<p1>
					&nbsp&nbspWelcome to Online Gas Boooking System. Our company is well-known as one of the greatest company providing 
					Liquified Petrolium Gas. We are here to provide service to you. If you are new here and want to have our service, 
					then hit on the "New Registration"button and register yourself. If you are unaware about the booking process you can 
					use the "Helpdesk".
				</p1>
				 <br><br><br><br><br><br>
				<h3>Allert!!!</h3>
				 <p2>
				 	&nbsp&nbspFor your safety, ask the delevery-man to check the gas cylender, if there is any leakage. Also check the waight 
					of the cylender. If any leakage occurs after the delevery, do not light the burner or any kind of flameable object and inform 
					us immidiately. You can contact us on this number: 9883338491 .
				 </p2>

			</article>
		</div>

		<footer>
		  <p3>Thanks for visiting</p3>
		</footer>

	</body>


</html>