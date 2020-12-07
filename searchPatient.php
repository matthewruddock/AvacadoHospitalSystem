<?php
session_start();
include_once "config.php";
$LastName="";
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
          <form  method="POST">
          <div class="container">
           <center> <h3>Search Patient</h3>
            LastName: <input type="text" name="LastName" placeholder="Enter Last Name">
            <input type="submit" name="SearchBtn" value="Search">
          </div>
          <div>
           <center> <table>
              <tr>
                  <th>Patient TRN</th>
                  <th>Title</th>
                  <th>First Name</th>
                  <th>DOB</th>
                  <th>Address</th>
                  <th>Telephone Number</th>
                  <th>Email</th>
              </tr></center>
            <?php
            if(isset($_POST['LastName'])){

                $LastName=$_POST['LastName'];
                $SelQuery= "SELECT * FROM patient  WHERE LastName='$LastName'";
                $result=mysqli_query($conn,$SelQuery);

                while($rows= mysqli_fetch_assoc($result)){
                  echo"<tr>
                        <td>".$rows['PatientTRN']."</td>
                        <td>".$rows['Title']."</td>
                        <td>".$rows['FirstName']."</td>
                        <td>".$rows['DateOfBirth']."</td>
                        <td>".$rows['Address']."</td>
                        <td>".$rows['TelNo']."</td>
                        <td>".$rows['Email']."</td>
                        </tr>";

                }
                //close connection
                mysqli_close($conn);
                unset($_POST['LastName']);
            }
            ?>
          </table></center>
          </div>

          </form>
        </body>
</html>
