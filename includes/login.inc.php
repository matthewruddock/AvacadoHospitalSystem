
<?php 
include("config.php");
session_start();

foreach($_POST as $key=>$value)
{
	$_SESSION['$key']=$value;
}

 
foreach($_POST as $key=>$value)
{
	$_SESSION['$key']=$value;
}
	$err = "Invalid Credentials .";

// Username and password
$ID = "amcadmin";
$pass = "fatpear#123";
$data = $_POST;
$password = $_POST['pwd'];

if (isset($_POST["mailuid"]) && isset($_POST["pwd"])) { 
      
    if ($_POST["mailuid"] === $ID && $_POST["pwd"] === $pass) { 
    
    $_SESSION["inloggedin"] = true; 

    header("Location: ../addpatient.php"); 
    exit; 
    } else {  // Wrong login - message
	     
         
		header("Location: ../login.php?".$err);
		
       //echo "Invalid Login Credentials";
	}
	  	
}
?> 
