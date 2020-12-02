<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to index page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$pwd = $pwd_repeat = "";
$pwd_err = $pwd_repeat_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["pwd"]))){
        $pwd_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["pwd"])) < 6){
        $pwd_err = "Password must have atleast 6 characters.";
    } else{
        $pwd = trim($_POST["pwd"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["pwd_repeat"]))){
        $pwd_repeat_err = "Please confirm the password.";
    } else{
        $pwd_repeat = trim($_POST["pwd_repeat"]);
        if(empty($pwd_err) && ($pwd != $pwd_repeat)){
            $pwd_repeat_err = "Password did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($pwd_err) && empty($pwd_repeat_err)){
        // Prepare an update statement
        $sql = "UPDATE Staff SET Password = ? WHERE StaffID = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_staffId);
            
            // Set parameters
            $param_password = password_hash($pwd, PASSWORD_DEFAULT);
            $param_staffId = $_SESSION["staffId"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to index page
                session_destroy();
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
}
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
                        <a href="index.php"> <i class="glyphicon glyphicon-home"></i>HOME</a>
                    </div>
			</nav>
		</header>	      
		</br>
		<body>
            <main>
	            <div id="page-wrapper">
	            	<section id="region-main" class="col-12">
						<div align = "center">
							<div style = "width:410px; border: solid 1px #333333; " align = "left">
								<div style = "background-color:#333333; color:#FFFFFF; padding:0px;">
									<b></b>
								</div>
								<div style = "margin:0px">
                                	<div class="bg-img">
								 		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"> 
											<div class="container">
												<h1>Reset Password</></h1>
												<p><font color="yellow">Please fill out this form to reset your password.</font></p>
	
												<div <?php echo (!empty($pwd_err)) ? 'has-error' : ''; ?>">
               										<label>Password</label>	</br>
													<input type="password" placeholder="Enter Password" name="pwd" required></br>
													<span class="help-block"><?php echo $pwd_err; ?></span>
												</div>

												<div <?php echo (!empty($pwd_repeat_err)) ? 'has-error' : ''; ?>">
                									<label>Confirm Password</label>	</br>
													<input type="password" placeholder="Repeat Password" name="pwd_repeat" required></br>
													<span class="help-block"><?php echo $pwd_repeat_err; ?></span>
												</div>
											  
											   <div class="clearfix">
                                                     <input type="submit" class="btn btn-primary" value="Submit"> 
                                                    <a class="btn btn-link" href="index.php">Cancel</a>
												</div>
												
										    </div>          
								  		</form>
									</div>
								</div>
							</div>
						</div>
					</section> 
	            </div>                                                                              
        	</main>
		</body>
</html>

<?php 
 require "footer.php";

?>