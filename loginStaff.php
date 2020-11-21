<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  	header("location: index.php");
  	exit;
}
 
// Include config file
include_once "config.php";
 
// Define variables and initialize with empty values
$email = $password = $staffId = "";
$email_err = $password_err = $staffId_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter Email.";
    } else{
        $email = trim($_POST["email"]);
	}
	
	// Check if staffId is empty
    if(empty(trim($_POST["staffId"]))){
        $staffId_err = "Please enter Staff ID.";
    } else{
        $staffId = trim($_POST["staffId"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT StaffID, Name, Email, Password, Type FROM Staff WHERE Email = ? OR StaffID = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_email,$param_staffId);
            
            // Set parameters
			$param_email = $email;
			$param_staffId = $staffId;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if email or staffId exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $staffId, $staffName, $email, $hashed_password, $type);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
							$_SESSION["staffId"] = $staffId;
							$_SESSION["staffName"] = $staffName;
							$_SESSION["email"] = $email;
							$_SESSION["type"] = $type;                              
                            
                            // Redirect user to welcome page
                            header("location: index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
					$email_err = "No account found with that Email.";
					$staffId_err = "No account found with that Staff ID.";
                }
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
				background-image: url("imgs/nursing.png");
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
            	<header>
			    	<nav>
							<div class="header"></br>
								  <img src="imgs/logo.png" style="width:10%">
							</div>

							<div class="header">

							</div>
							<div class="header">
								<div class="header-right">
									<a href="index.php"> <i class="glyphicon glyphicon-home"></i>HOME</a>
								</div>
							</div>
					 </nav>
            	</header>
	         
         	</head>              
     		<body>
            	<div class="bg-img">     
					<main>	<br/>	   
                    	<div id="page-wrapper">
	                 		<section id="region-main" class="col-12">
								<div align = "center">
									<form method="POST" action=" "> 
										<div class="imgcontainer">
											<img src="imgs/doctor.png" alt ="logo" style="width:100px">  
										</div>
										<div>
											<label for="email"><b>Email</b></label>
											<input type="text" placeholder="Enter Email" title="No Space is allowed" 
												name="email" value="<?php echo $email ?>"></br>
												<?php echo $username_err; ?>
										</div>

										<div>
											<label for="staffId"><b>Staff ID</b></label>
											<input type="text" placeholder="Enter Staff ID" title="No Space is allowed" 
												name="staffId" value="<?php echo $email ?>"></br>
												<?php echo $username_err; ?>
										</div>
										
										<div>
											<label for="psw"><b>Password</b></label>
											<input type="password" placeholder="Enter Password" name="password" required></br>
											<?php echo $password_err; ?>
										</div>
										
							
										<button type="submit" class="loginbtn">Login </button>
										<label>
											<input type="checkbox" checked="checked" name="remember"> Remember me</br>
											<span class="psw">Forgot <a href="reset_password.php">password?</a></span>		 
										</label></br></br></br>
									</form>
								</div>
						    </section> 
			            </div>
           			</main>
            	</div>
       		</body>  
		</html>

