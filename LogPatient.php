<?php
session_start();
if(!isset($_SESSION['type'])||$_SESSION['type']=="Guest"){
	header("location:index.php");
}

include_once "config.php";
if(isset($_SESSION['resultFlag']))
{
	foreach($_SESSION as $key => $value)	//store SESSION values in to local variables
	{
		$$key = $value;
	}
}else{
  $staffId="";
}
$updateSet=$TRNSearch=$Status=$Reasonforvisit="";

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



          </head>
		</br></br>
        <body>
        <form  method="POST">
            <br/><br/><br/><br/>
          <div class="container">
          <h3>Log patient</h3>
            <table>
              <tr>
                <?php
                if($_SESSION["type"]=='Nurse'){
                echo '<td>PatientTRN:</td> <td><input type="text" name="TRNSearch" placeholder="Enter TRN"></td>
              </tr>

              <tr>
                <td>Status:</td><td><Select class="option" id="Title" name="Status" >
                <option value="">--Please choose a Status--</option>
                <option value="Pending" <?php if($Status=="Pending") echo"selected";?> >Pending</option>
                <option value="Complete" <?php if($Status=="Complete) echo"selected";?>>Complete</option>
                <option value="Cancel" <?php if($Status=="Cancel") echo"selected";?>>Cancel</option>
            </Select> </td>
              </tr>
                </table';


              }
              if($_SESSION["type"]=='Doctor'){
              echo ' <td>PatientTRN:</td> <td><input type="text" name="TRNSearch" placeholder="Enter TRN"></td>
            </tr>

            <tr>
              <td>Status:</td><td><Select class="option" id="Title" name="Status" >
              <option value="">--Please choose a Status--</option>
              <option value="Pending" <?php if($Status=="Pending") echo"selected";?> Pending</option>
              <option value="Complete" <?php if($Status=="Complete) echo"selected";?>Complete</option>
              <option value="Cancelled" <?php if($Status=="Cancelled") echo"selected";?>Cancelled</option>
          </Select> </td>
            </tr>
               <tr>
                <td>Reason:</td> <td> <input type="text" name="Reasonforvisit" placeholder="Enter Reason For Visit"></td>
           </tr>';



            }
                ?>
          <tr>
            <td><input type="submit" name="SearchBtn" value="Log Patient"></td>
          </tr>

          </div>
          <div class="container">

            <table>
            <?php
            if(isset($_POST['SearchBtn'])){


                $TRNSearch=$_POST['TRNSearch'];
                $Status=$_POST['Status'];
                $updateSet="Status='".$Status."'";

								//if user is a doctor then it will give mre privilege
                if($_SESSION["type"]=='Doctor'){
                $Reasonforvisit= $_POST['Reasonforvisit'];
                $updateSet="ReasonForVisit='".$Reasonforvisit."',Status='".$Status."'";
              }
                if($TRNSearch==""){
                  $TRN=1;
                }


                $updateQuery="UPDATE appointment SET $updateSet, staffId=$staffId WHERE PatientTRN='$TRNSearch'";
                mysqli_query($conn,$updateQuery);

                //close connection
                mysqli_close($conn);
            unset($_POST['SearchBtn']);

            }
            ?>
          </table>
          </div>

          </form>
        </body>
</html>
