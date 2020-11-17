<?php
// Include config file
var_dump($_POST);
require_once "config.php";
 
// Define variables and initialize with empty values
$email = $pwd = $pwd_repeat = $role = $staffId ="";
$email_err = $pwd_err = $pwd_repeat_err  = $role_err = $staffId_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a Email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE Email = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "1. Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    // Validate Staff ID
    if(empty(trim($_POST["staffId"]))){
        $role_err = "Please enter a Staff ID.";
    } else if(strlen(trim($_POST["staffId"])) < 4){
        $staffId_err = "Staff ID must  have atleast 4 characters.";
    } else{
        $staffId = trim($POST["staffId"]);
    }


    // Validate Role
    if (empty($_POST["role"])) {
        $role_err= "<p style='color:red; font-weight:bold'>Gender is required";
  
    }else {
        // check if user selected male or female
        if (!preg_match("/Nurse|Doctor/",$role)) {
           $role_err= "<p style='color:red; font-weight:bold'>Please select Male or Female";
        }
    }

    // Validate password
    if(empty(trim($_POST["pwd"]))){
        $pwd_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["pwd"])) < 6){
        $pwd_err = "Password must have atleast 6 characters.";
    } else{
        $pwd = trim($_POST["pwd"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["pwd_err"]))){
        $pwd_err_err = "Please confirm password.";     
    } else{
        $pwd_err = trim($_POST["pwd_err"]);
        if(empty($pwd_err) && ($pwd != $pwd_err)){
            $pwd_err_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($email_err) && empty($pwd_err) && empty($pwd_repeat) && empty($role_err) && empty($staffId_repeat)   ){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (Email, StaffID, Password, Role) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_email, $param_staffId, $param_pwd, $param_role);
            
			// Set parameters
			$param_staffId = $staffId;
			$param_role = $role;
            $param_email = $email;
            $param_pwd = password_hash($pwd, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "2. Something went wrong. Please try again later.";
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
                	<img src="logo.png" alt ="logo" style="width:10%"> 
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
												<h1>Sign Up</></h1>
												<p><font color="yellow">Please fill in this form to create an account.</font></p>
												
												<div <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
													<label>Email address</label> </br>
													<input type="text" placeholder="Enter Email" name="email" required></br>
													<span class="help-block"><?php echo $email_err; ?></span>
												</div>

                                                <div <?php echo (!empty($staffId_err)) ? 'has-error' : ''; ?>">
                                                    <label>Staff ID:</label> </br>
                                                    <input type="text" placeholder="Enter Staff ID" name="staffId" required></br>
                                                </div>

                                                <div <?php echo (!empty($role_err)) ? 'has-error' : ''; ?>">
                                                <label for="cars">Choose a Role:</label>
                                                    <select name="role" id="role">
                                                        <option <?php if($role=='') echo 'selected'; ?>  value="">SELECT A ROLE</option>
                                                        <option <?php if($gender=='Doctor') echo 'selected'; ?> value="Doctor">Doctor</option>
                                                        <option <?php if($gender=='Nurse') echo 'selected'; ?> value="Nurse">Nurse</option>
                                                    </select>
                                                </div>

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
											  	<label>
													<input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"><font color="yellow"> Remember me</font></br>
											 	</label>

											  	<p><font color="yellow">By creating an account you agree to our</font> <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

											   <div class="clearfix">
													<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
													<button type="submit" class="signupbtn">Sign Up</button>
												</div>
												<p>Already have an account? <a href="login.php">Login here</a>.</p>
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