<?php
// Include config file
session_start();
include_once "config.php";
if(isset($_SESSION['resultFlag']))
{
	foreach($_SESSION as $key => $value)	//store SESSION values in to local variables
	{
		$$key = $value;
	}
	session_destroy();		//destroys the session once the values are loaded. REFRESH to clear the fields
	session_start();
	$_SESSION['type']=$type;
	$_SESSION['staffId'] = $staffId;
	$_SESSION['staffName'] = $staffName;
}
else{
	// Define variables and initialize with empty values
	$email = $pwd = $pwd_repeat = $type = $staffId = $staffName="";
	$email_err = $pwd_err = $pwd_repeat_err  = $type_err = $staffId_err = $staffName_err="";
}


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a Email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT Email FROM Staff WHERE Email = ?";

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
                    $email_err = "<p style='color:red; font-weight:bold'>This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "<p style='color:red; font-weight:bold'>1. Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    // Validate Staff ID
    if(empty(trim($_POST["staffId"]))){
        $staffId_err = "Please enter a Staff ID.";
    } else if(strlen(trim($_POST["staffId"])) < 4){
        $staffId_err = "Staff ID must have atleast 4 characters.";
    } else{
        $staffId = trim($_POST["staffId"]);
	}

	// Validate Staff Name
    if(empty(trim($_POST["staffName"]))){
        $staffName_err = "Please enter a Staff Name.";
    } else{
        $staffName = trim($_POST["staffName"]);
    }


    // Validate type
    if (empty($_POST["type"])) {
        $type_err= "<p style='color:red; font-weight:bold'>Gender is required";

    }else {
        $type = trim($_POST["type"]);
        // check if user selected male or female
        if (!preg_match("/Nurse|Doctor/",$type)) {
           $type_err= "<p style='color:red; font-weight:bold'>Please select Male or Female";
        }
    }

    // Validate password
    if(empty(trim($_POST["pwd"]))){
        $pwd_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["pwd"])) < 6){
        $pwd_err = "<p style='color:red; font-weight:bold'>Password must have atleast 6 characters.";
    } else{
        $pwd = trim($_POST["pwd"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["pwd_err"]))){
        $pwd_err_err = "<p style='color:red; font-weight:bold'>Please confirm password.";
    } else{
        $pwd_err = trim($_POST["pwd_err"]);
        if(empty($pwd_err) && ($pwd != $pwd_err)){
            $pwd_err_err = "<p style='color:red; font-weight:bold'>Password did not match.";
        }
    }
    var_dump($_POST);
    // Check input errors before inserting in database
    if(empty($email_err) && empty($pwd_err)  && empty($staffName_err)   && empty($staffId_err) && empty($pwd_repeat)){

        // Prepare an insert statement
        $sql = "INSERT INTO Staff (StaffID, Name, Email, Password, Type) VALUES (?, ?, ?, ?,?)";

        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_staffId, $param_staffName, $param_email, $param_pwd, $param_type);

			// Set parameters
			$param_staffId = $staffId;
			$param_staffName = $staffName;
			$param_email = $email;
            $param_pwd = password_hash($pwd, PASSWORD_DEFAULT); // Creates a password hash
			$param_type = $type;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: loginStaff.php");
            } else{
                echo "<p style='color:red; font-weight:bold'>2. Something went wrong. Please try again later.";
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
        <header>
			<nav>
            	<div class="header"></br>
                	<img src="imgs/logo.png" alt ="logo" style="width:5%">
                </div>

					<div class="header-right">
                        <a href="index.php"> <i class="glyphicon glyphicon-home"></i>HOME</a>
                    </div>
			</nav>
		</header>
		</br>
		<body class="amc">
            <main>
	            <div id="page-wrapper">
	            	<section id="region-main" class="col-12">
						<div align = "center">
							<div style = "width:410px; border: solid 1px #333333; " align = "left">
								<div style = "margin:0px">
                                	<div class="bg-img">
								 		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
											<div class="container">
												<h1>Staff Sign Up</></h1>
												<p><font color="red">Please fill in this form to create an account.</font></p>

                                                <div <?php echo (!empty($staffId_err)) ? 'has-error' : ''; ?>">
                                                    <label>Staff ID:</label> </br>
                                                    <input type="text" placeholder="Enter Staff ID" name="staffId"></br>
                                                </div>

												<div <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
													<label>Email address</label> </br>
													<input type="text" placeholder="Enter Email" name="email" required></br>
													<span class="help-block"><?php echo $email_err; ?></span>
												</div>

												<div <?php echo (!empty($staffName_err)) ? 'has-error' : ''; ?>">
													<label>Name:</label> </br>
													<input type="text" placeholder="Enter Name" name="staffName" required></br>
													<span class="help-block"><?php echo $staffName_err; ?></span>
												</div>

                                                <div <?php echo (!empty($type_err)) ? 'has-error' : ''; ?>">
                                                <label for="type">Choose a type:</label>
                                                    <select name="type" id="type">
                                                        <option <?php if($type=='') echo 'selected'; ?>  value="">Choose a Type</option>
                                                        <option <?php if($type=='Admin') echo 'selected'; ?> value="Admin">Admin</option>
                                                        <option <?php if($type=='Doctor') echo 'selected'; ?> value="Doctor">Doctor</option>
                                                        <option <?php if($type=='Nurse') echo 'selected'; ?> value="Nurse">Nurse</option>
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
													<input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"><font color="red"> Remember me</font></br>
											 	</label>

											  	<p><font color="red">By creating an account you agree to our</font> <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

											   <div class="clearfix">
													<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
													<button type="submit" class="signupbtn">Sign Up</button>
												</div>
												<p>Already have an account? <a href="loginStaff.php">Login here</a>.</p>
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
