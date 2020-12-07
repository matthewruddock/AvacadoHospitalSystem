   <?php
   include_once "config.php";
   session_start();
   if(isset($_SESSION['errflag']))
	{
		foreach($_SESSION as $key => $value)	//store SESSION values in to local variables
		{
			$$key = $value;
		}
		//session_destroy();		//destroys the session once the values are loaded. REFRESH to clear the fields
	}
	else
	{



		// default error message
		$fnerr = "";
		$lnerr = "";
		$pwerr = "";
		$emlerr = "";
		$mstaterr = "";
		$bioerr = "";
		$doberr = "";
		$imgerr = "";
		$err = " ";
    $TRN="";

	}
  session_destroy();
  session_start();
if(isset($staffId)){
  $_SESSION['type']=$type;
  $_SESSION['staffId'] = $staffId;
  $_SESSION['staffName'] = $staffName;}
  else

    $_SESSION['type']="Guest";
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
					   </style>
						<style>
					   .bg-img {
					  /* The image used */
					  background-image: url("imgs/appointment.jpg");

					  min-height: 580px;

					  /* Center and scale the image nicely */
					  background-position: ;
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
								<a href="newindex.php"> <i class="glyphicon glyphicon-home"></i>HOME</a>


                                </div>
				 </nav>

          </head>

     <body>
                       <div class="bg-img">

			<main>	<br/>
                    <div id="page-wrapper">

	                 <section id="region-main" class="col-12">

							   <div align = "center">

								 <form method="POST" >
										 <div class="imgcontainer">

										  </div>
                                           <label>Make An Appointment</label></br>

                      <label for="uname"><b>TRN</b></label>
    									<input type="number" placeholder="Enter TRN" title="No Space OR Letters are allowed" name="TRN" pattern="([\d]{9})" required></br>

                      <label for="uname"><b>First name</b></label>
											<input type="text" placeholder="Enter Firstname" title="No Space OR Numbers is allowed" name="fname" pattern="[a-zA-Z0-9]+" required></br>

											<label for="uname"><b>Last name</b></label>
											<input type="text" placeholder="Enter Lastname" title="No Space OR Numbers is allowed" name="lname" pattern="[a-zA-Z0-9]+" required></br>


											<label for="psw"><b>Date</b></label>
											<input type="date" placeholder="Enter date" name="date" required></br>
											 <?php echo $err; ?>

											<button type="submit" class="loginbtn" name='submitbtn'>Submit </button>
											<label>

											</label></br></br></br>

						                       </div>
                                       </form>

                          <?php

                          if(isset($_POST['submitbtn'])){

                            $TRN=$_POST['TRN'];
                            $fname=$_POST['fname'];
                            $lname=$_POST['lname'];
                            $date=$_POST['date'];
                            $insertQuery="INSERT INTO avocadoMC_DB.appointment (PatientTRN,FirstName,LastName,Date) VALUES ('$TRN','$fname','$lname','$date')";

                            mysqli_query($conn,$insertQuery);

                            //close connection
                            mysqli_close($conn);
                        unset($_POST['SearchBtn']);

                          }?>
						       </section>
			               </div>
					    </div>
           </main>

       </body>
	 </header>
</html>
