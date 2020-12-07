<?php
session_start();
include_once "config.php";

$name=$email=$nameerr=$emailerr="";
foreach($_SESSION as $key => $value)	//store SESSION values in to local variables
{
  $$key = $value;
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
				 </br>
            <title>Edit Profile</title>
            <link rel="stylesheet" href="css/style.css" />
            <link rel="stylesheet" href="bootstrap.css"/>
        </head>
        <body>
          <form  method="POST">
<br/><br/>
<br/>
          <div class="container">

            <?php
            if($_SESSION['type']!="Guest"){

                $ID=$_SESSION['staffId'];
                $SelQuery= "SELECT * FROM staff  WHERE StaffID='$ID'";
                $result=mysqli_query($conn,$SelQuery);

                $rows= mysqli_fetch_assoc($result);

                  echo" <div>
                        <h3>Edit Profile</h3>
                      </div>";
                  echo"<table>

                          <tr>
                          <td>Name:</td>
                          <td><input name='name' type='text' value=".$rows['Name']."><br> ".$nameerr."</td>
                          </tr>
                          <td>Email:</td>
                          <td><input name='email' type='text' value=".$rows['Email']."><br> ".$emailerr."</td>
                          </tr>
                          </tr>
                        <!--  <td>Password:</td>
                          <td><input name='password' type='password' value=".$rows['Password']."></td>
                          </tr>-->

                          <tr><td><input name='updatebtn' type=submit value='update'></td></tr>
                          ";

                    if(isset($_POST['updatebtn'])){
                      $name=$_POST['name'];
                      $email=$_POST['email'];
                      if($name==""){
                        $_SESSION['nameerr']="<p style= 'color:red;'>Enter a valid name.</p>";
                      }
                      if(!filter_var($email,FILTER_VALIDATE_EMAIL)){//validate email if its a valid one
                				 $_SESSION['emailerr']= "<p style= 'color:red;'>Email is invalid.</p>";

                				 }

                      $updateQuery="UPDATE staff SET Name='$name',Email='$email' WHERE StaffID='$ID'";
                      mysqli_query($conn,$updateQuery);
                      unset(  $_POST['updatebtn'] );
                    }



            }else{
              echo"<p style='font-size:50px'>I am sorry. <strong style='color:red'>ERROR:</strong> you are not logged in and lack privilege to edit page</p>";
              echo "<a href='index.php'>click here to go home</a>";
              //header("Location:index.php");
            }

    //close connection
    mysqli_close($conn);
            ?>

          </div>

          </form>
        </body>
</html>
