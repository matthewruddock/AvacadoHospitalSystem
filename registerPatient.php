<?php
session_start();
include_once "config.php";
$PRegTRN=$PRegTitle=$PRegFName=$PRegLName=$PRegDOB=$PRegAddress=$PRegTel=$PRegEmail=$PatientRegBtn="";
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
					  background-image: url("imgs/form_background.jpg");

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
				 <div class="bg-img">

			<main>	<br/>
                    <div id="page-wrapper">

	                 <section id="region-main" class="col-12">

							   <div align = "center">

          </head>
		</br></br>

         <center> <form  method="POST">
          <div>
           <center> <table>
              <tr>
                <td>Title</td>
                <td>
                <Select class="option" id="Title" name="PRegTitle" >
                  <option value="">--Please choose a title--</option>
                  <option value="Mr" <?php if($PRegTitle=='Mr') echo"selected";?> >Mr</option>
                  <option value="Ms" <?php if($PRegTitle=='Ms') echo"selected";?>>Ms</option>
                  <option value="Mrs" <?php if($PRegTitle=='Mrs') echo"selected";?>>Mrs</option>
                </Select></td>
              </tr>
              <tr>
                <td>First Name:</td><td><input type="text" name="PRegFName"placeholder="Enter Patient First Name"></td>
              </tr>
              <tr>
                <td>Last Name:</td><td><input type="text" name="PRegLName"placeholder="Enter Patient Last Name"></td>
              </tr>
              <tr>
                <td>TRN:</td><td><input type="text" name="PRegTRN"placeholder="Enter Patient TRN"></td>
              </tr>
              <tr>
                <td>DOB:</td><td><input type="date" name="PRegDOB"placeholder="Enter Patient DOB"></td>
              </tr>
              <tr>
                <td>address:</td><td><input type="text" name="PRegAddress"placeholder="Enter Patient Address"></td>
              </tr>
              <tr>
                <td>Tel:</td><td><input type="text" name="PRegTel"placeholder="Enter Patient Telephone"></td>
              </tr>
              <tr>
                <td>Email:</td><td><input type="text" name="PRegEmail"placeholder="Enter Patient Email"></td>
              </tr>
              <tr>
                <td><input type="submit" name="PatientRegBtn" value="Register" ></td>
              </tr>
            </table></center>
          </div>
          <?php
            if(isset($_POST['PatientRegBtn'])){
              foreach($_POST as $key=>$value)//each session the value will be read
                  {
                    $$key=$value;//each session value is set to the key variables
                  }
              $PRegDOB=date("Y-m-d",strtotime($PRegDOB));
              $insertQuery="INSERT INTO patient(PatientTRN,Title,FirstName,LastName,DateOfBirth,Address,TelNo,Email) VALUES ('$PRegTRN','$PRegTitle','$PRegFName','$PRegLName','$PRegDOB','$PRegAddress','$PRegTel','$PRegEmail')";
              mysqli_query($conn,$insertQuery) or die("Could not upload profile information".mysqli_error($conn));
              mysqli_close($conn);
            }
          ?>
          </form><center>
        </body>
</html>
