<!doctype=html>
<html>
	<head>
		<title> BMI Calculator</title>
		<link rel="stylesheet" type="text/css" href = "bmicalc.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<!-- Add icon library -->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

html,body,h1,h2,h3,h4 {font-family:"Lato", sans-serif}
.mySlides {display:none}
.w3-tag, .fa {cursor:pointer}
.w3-tag {height:15px;width:15px;padding:0;margin-top:6px}
</style>
<style>
.dropbtn {
  background-color: light gray;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
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
					  background-image: url("imgs/bmii.jpg");

					  min-height: 580px;

					  /* Center and scale the image nicely */
					  background-position: center;
					  background-repeat: no-repeat;
					  background-size: cover;
					  position: relative;
					}
             </style>
	</head>
 		<div class="bg-img">
			<body>
			</br>

				<a href="newindex.php" class="w3-button w3-block">Home</a>
					<center><h2> BMI Calculator </h2></center>
				<div id="bmiform">
					<b>Please enter your measurements below. </b> <br /><br />
					<form id="bmicalc" name="bmicalc" method="post">
						Weight (in kg): <input type="number" name="weight" min="0" max="500" <br /><br />
						Height (in Meters): <input type="number" name="height" min="0" max="2.5"><br /><br />

						<input type="submit" name="givems" id="givems" class="btn" value="Submit"/>
						<?php
//Define variables and give initial values.
$height=0;
$width=0;

//Check if height is valid. First uservalue is translated into floavalue.
//If given value is not valid float, result of floatval-function is zero.
//If conversion translated into string and original input value are the same, input is correct.

 if(isset($_POST['height'])){
			if ($_POST['height']!=strval(floatval($_POST['height'])))
			{
			//Print error message and hyperlink.
			    print "Height is invalid<br />";
			    print "<a href='BMI.php'>try again</A>";
			//Execution of this script is terminated at this point.
			    exit;
			}

			//Read user value to variable.
			$height=$_POST['height'];

			//Check that value is in right range.
			if ($height<0 || $height>2.5)
			{
			    print "Height must be value between 0m and 2.5m<br />";
			    print "<a href='BMI.php'>try again</A>";
			    exit;
			}

			//Weight is in kilogramms, so it must be an integer (no floating point).
			if ($_POST['weight']!=strval(intval($_POST['weight'])))
			{
			    print "Weight is invalid<br />";
			    print "<a href='BMI.php'>try again</A>";
			    exit;
			}

			//Read user value to variable.
			$weight=$_POST['weight'];

			//Check that value is in right range.
			if ($weight<0 || $weight>500)
			{
			    print "Weight must be value between 0kg and 500kg<br />";
			    print "<a href='BMI.php'>try again</A>";
			    exit;
			}

			//Calculate BMI.
			$bmi=$weight / ($height * $height);

			//Print result.
			print("Body mass index is $bmi");
}
?>
					</form>
				</div>
			</body>
		</div>

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
