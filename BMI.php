<!doctype=html>
<html>
<head>
<title> BMI Calculator</title>
<link rel="stylesheet" type="text/css" href = "bmicalc.css" />
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
					  background-image: url("bmii.jpg");

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
<a href="index.php" class="w3-button w3-block">Home</a>
<center><h2> BMI Calculator </h2></center>
<div id="bmiform">
<b>Please enter your measurements below. </b> <br /><br />
<form id="bmicalc" name="bmicalc" method="post">
Weight (in lbs): <input type="text" name="weight"> <br /><br />  
Height (in inches): <input type="text" name="height"><br /><br />  
<input type="submit" name="givems" id="givems" class="btn" value="Submit"/>
</div>
</form>
</div>
</body>
</html>

<?php 
//Define variables and give initial values. 
$height=0; 
$width=0; 

//Check if height is valid. First uservalue is translated into floavalue.  
//If given value is not valid float, result of floatval-function is zero. 
//If conversion translated into string and original input value are the same, input is correct.

 
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
if ($height<0 || $height>7.5) 
{ 
    print "Height must be value between 0 and 7.5<br />"; 
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
    print "Weight must be value between 0 and 500<br />"; 
    print "<a href='BMI.php'>try again</A>"; 
    exit; 
} 

//Calculate BMI.  
$bmi=$weight / ($height * $height); 

//Print result. 
print("Body mass index is $bmi"); 
?> 