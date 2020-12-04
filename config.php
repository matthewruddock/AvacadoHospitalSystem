<?php
	/* Database credentials*/
	$servername= "localhost";
	$dbUsername= "root";
	$dbPassword="";
	//$dbPassword="";
	$dbName ="avocadoMC_DB";

	//Attempt to connect to MySQL database
	$conn = mysqli_connect ($servername,$dbUsername,$dbPassword,$dbName);

	// Check connection
	if ($conn=== false){
		die("Connection failed: " .mysqli_connect_error());
	}else{
		echo "";
	}
?>
