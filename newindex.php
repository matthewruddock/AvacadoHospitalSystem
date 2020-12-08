<?php
session_start();
if(!isset($_SESSION['type'])){
  $_SESSION['type']='Guest';
  header("location:index.php");
}
 ?>

 <!DOCTYPE html>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<!-- Add icon library -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style>
			* {box-sizing: border-box;}
			body {
				margin: 0;
				font-family: Arial, Helvetica, sans-serif;
			}

			.header {
				overflow: hidden;
				background-color: #f1f1f1;
				padding: 0px 10px;
			}

			.header a {
			  	float: left;
				color: black;
				text-align: center;
				padding: 12px;
				text-decoration: none;
				font-size: 12px;
				line-height: 12px;
				border-radius: 4px;
			}

			.header a.logo {
				font-size: 20px;
				font-weight: bold;
			}

			.header a:hover {
				background-color: #ddd;
				color: black;
			}

			.header a.active {
				background-color: dodgerblue;
				color: white;
			}

			.header-right {
				float: right;
			}

			@media screen and (max-width: 500px) {
				.header a {
					float: none;
					display: block;
					text-align: left;
				}

				.header-right {
					float: none;
				}
			}
			.bg-img {
			/* The image used */
				background-image: url("imgs/amcbackground1.JPG");
				min-height: 580px;
				/* Center and scale the image nicely */
				background-repeat: no-repeat;
				background-size: cover;
				position: relative;
			}
		</style>

        <html>
       		<head>
          		<meta name="viewport" content="width=device-width, initial-scale=1">
      			<style>
						body {font-family: Arial, Helvetica, sans-serif;}
						form {border: 3px solid black;  width: 30%; background-color: white;}

						input[type=text], input[type=password] {
						  width: 70%;
						  padding: 12px 20px;
						  margin: 8px 0;
						  display: inline-block;
						  border: 1px solid #ccc;
						  box-sizing: border-box;
						}

						button {
						  background-color: #4CAF50;
						  color: white;
						  padding: 14px 20px;
						  margin: 8px 0;
						  border: none;
						  cursor: pointer;
						  width: 20%;
						}

						button:hover {
						  opacity: 0.8;
						}

						.cancelbtn {
						  width: auto;
						  padding: 10px 18px;
						  background-color: #f44336;
						}

						.imgcontainer {
						  text-align: center;
						  margin: 24px 0 12px 0;
						}

						img.avatar {
						  width: 40%;
						  border-radius: 50%;
						}

						.container {
						  padding: 1px;
						}

						span.psw {
						  float: right;
						  padding-top: 8px;
						}

						/* Change styles for span and cancel button on extra small screens */
						@media screen and (max-width: 100px) {
						  span.psw {
							 display: block;
							 float: none;
						  }
						  .cancelbtn {
							 width: 50%;
						  }
						}
           		</style>
				<style>
					table {
					  width:100%;
					}
					table, th, td {
					  border: 1px solid black;
					  border-collapse: collapse;
					}
					th, td {
					  padding: 15px;
					  text-align: left;
					}
					#t01 tr:nth-child(even) {
					  background-color: #eee;
					}
					#t01 tr:nth-child(odd) {
					 background-color: #fff;
					}
					#t01 th {
					  background-color: black;
					  color: white;
					}
					</style>
            	<header>
			    	<nav>
							<div class="header"></br>
								  <img src="imgs/logo.png" style="width:10%">
							</div>

							<div class="header">

							</div>
							<div class="header">

							</div>

					 </nav>

            	 <div class="bg-img">
				 </br>

         	</head>

			<body>

			<table id="t01">
  <tr>
    <th><a href="appointment.php">View Appointment</a></th>
    <th><a href="registerPatient.php">Register Patient</a></th>
    <th><a href="logPatient.php">Log Patient</a></th>
	<th><a href="searchPatient.php">Search Patient</a></th>
	<th><a href="BMI.php">BMI</a></th>
	<th><a href="editProfile.php">Edit Profile</a></th>
    <?php if($_SESSION["type"]=="Admin"){
      echo "<th><a href='manageAccount.php'>Manage Account</a></th>";
    }?>
<th><a href='logout.php'>Log out </a></th>

  </tr>
  <tr>





























			</body>
