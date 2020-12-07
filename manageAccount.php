<?php
  session_start();
  include_once "config.php";
?>
<!DOCTYPE html>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <html>
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
        </style>
        <style>
			body {
				font-family: Arial, Helvetica, sans-serif;
			}
			* {box-sizing: border-box;}

			/* Full-width input fields */
			input[type=text], input[type=password] {
				width: 30%;
				padding: 15px;
				margin: 5px 0 22px 0;
				display: inline-block;
				border: none;
				background: #f1f1f1;
			}

			/* Add a background color when the inputs get focus */
			input[type=text]:focus, input[type=password]:focus {
				background-color: #ddd;
				outline: none;
			}

			/* Set a style for all buttons */
			button {
				background-color: #4CAF50;
				color: white;
				padding: 7px 10px;
				margin: 8px 0;
				border: none;
				cursor: pointer;
				width: 50%;
				opacity: 0.9;
			}

			button:hover {
				opacity:1;
			}

			/* Extra styles for the cancel button */
			.cancelbtn {
				padding: 7px 10px;
				background-color: #f44336;
			}

			/* Float cancel and signup buttons and add an equal width */
			.cancelbtn, .signupbtn {
				float: left;
				width: 10%;
			}

			/* Add padding to container elements */
			.container {
				padding: 16px;
			}

			/* The Modal (background) */
			.modal {
				display: none; /* Hidden by default */
				position: fixed; /* Stay in place */
				z-index: 1; /* Sit on top */
				left: 0;
				top: 0;
				width: 50%; /* Full width */
				height: 50%; /* Full height */
				overflow: auto; /* Enable scroll if needed */
				background-color: #474e5d;
				padding-top: 50px;
			}

			/* Modal Content/Box */
			.modal-content {
				background-color: #fefefe;
				margin: 5% auto 10% auto; /* 5% from the top, 3% from the bottom and centered */
				border: 1px solid #888;
				width: 80%; /* Could be more or less, depending on screen size */
			}

			/* Style the horizontal ruler */
			hr {
				border: 1px solid #f1f1f1;
				margin-bottom: 25px;
			}

			/* The Close Button (x) */
			.close {
				position: absolute;
				right: 35px;
				top: 15px;
				font-size: 40px;
				font-weight: bold;
				color: #f1f1f1;
			}

			.close:hover, .close:focus {
				color: #f44336;
				cursor: pointer;
			}

			/* Clear floats */
			.clearfix::after {
				content: "";
				clear: both;
				display: table;
			}

			/* Change styles for cancel button and signup button on extra small screens */
			@media screen and (max-width: 300px) {
				.cancelbtn, .signupbtn {
					width: 100%;
				}

			}
        </style>
        <style>
			.bg-img {
				/* The image used */
				background-image: url("imgs/form_background.jpg");
				min-height: 580px;

				/* Center and scale the image nicely */
				background-position: center;
				background-repeat: no-repeat;
				background-size: cover;
				position: relative;
			}
        </style>

        <header>
			<nav>
            	<div class="header"></br>
                	<img src="imgs/logo.png" alt ="logo" style="width:10%">
                </div>

                <div class="header">

                </div>
                <div class="header">
					<div class="header-right">
                        <a href="newindex.php"> <i class="glyphicon glyphicon-home"></i>HOME</a>
                        <a href="logout.php">Logout</a>
                    </div>
			</nav>
		</header>
        <body>
            <div class="form">

                <h2>View Records</h2>
                <table width="100%" border="1" style="border-collapse:collapse;">
                    <thead>
                        <tr>
                            <th><strong>StaffID</strong></th>
                            <th><strong>Name</strong></th>
                            <th><strong>Email</strong></th>
                            <th><strong>Password</strong></th>
                            <th><strong>Type</strong></th>
                            <th><strong>Edit</strong></th>
                            <th><strong>Delete</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $select_query="SELECT * FROM Staff ORDER BY StaffID desc;";
                            $result = mysqli_query($conn,$select_query);
                            while($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td align="center"><?php echo $row["StaffID"]; ?></td>
                                <td align="center"><?php echo $row["Name"]; ?></td>
                                <td align="center"><?php echo $row["Email"]; ?></td>
                                <td align="center"><?php echo $row["Password"]; ?></td>
                                <td align="center"><?php echo $row["Type"]; ?></td>
                                <td align="center">
                                <a href="editAccount.php?id=<?php echo $row["StaffID"]; ?>">Edit</a>
                                </td>
                                <td align="center">
                                <a href="deleteAccount.php?id=<?php echo $row["StaffID"]; ?>">Delete</a>
                                </td>

                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </body>
        <!-- Footer -->

        <footer class="w3-container w3-padding-32 w3-light-grey w3-center">
        <h4>Footer</h4>
        <a href="#" class="w3-button w3-black w3-margin"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
        <div class="w3-xlarge w3-section">
            <i class="fa fa-facebook-official w3-hover-opacity"></i>
            <i class="fa fa-instagram w3-hover-opacity"></i>
            <i class="fa fa-snapchat w3-hover-opacity"></i>
            <i class="fa fa-pinterest-p w3-hover-opacity"></i>
            <i class="fa fa-twitter w3-hover-opacity"></i>
            <i class="fa fa-linkedin w3-hover-opacity"></i>
        </div>

        <p>Powered by <a href="Rover.html" title="W3.CSS" target="_blank" class="w3-hover-text-green">Rover</a></p>
        </footer>
</html>
