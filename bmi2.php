<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"> <html>
<head>
<title>BMI-calculator example</title>
</head>
<body>
<h2>BMI-calculator example</h2>
<form action="bmi2.php" method="POST">
<table>
<tr><td>Height in meters</td><td><input type="text" name="height" maxlength="4"></td></tr>
<tr><td>Weight in kilograms</td><td><input type="text" name="weight" maxlength="3"></td></tr>
</table>
<input type="submit" value="Calculate"><input type="reset" value="Reset">
</form>

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
    print "<a href='bmi2.php'>try again</A>"; 
//Execution of this script is terminated at this point. 
    exit; 
} 

//Read user value to variable. 
$height=$_POST['height']; 

//Check that value is in right range. 
if ($height<0 || $height>2.5) 
{ 
    print "Height must be value between 0 and 2.5<br />"; 
    print "<a href='bmi2.php'>try again</A>"; 
    exit; 
} 

//Weight is in kilogramms, so it must be an integer (no floating point). 
if ($_POST['weight']!=strval(intval($_POST['weight'])))  
{ 
    print "Weight is invalid<br />"; 
    print "<a href='bmi2.php'>try again</A>"; 
    exit; 
} 

//Read user value to variable. 
$weight=$_POST['weight']; 

//Check that value is in right range. 
if ($weight<0 || $weight>500) 
{ 
    print "Weight must be value between 0 and 500<br />"; 
    print "<a href='bmi2.php'>try again</A>"; 
    exit; 
} 

//Calculate BMI.  
$bmi=$weight / ($height * $height); 

//Print result. 
print("Body mass index is $bmi"); 
?> 

</body> 
</html>