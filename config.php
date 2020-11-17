<?php 
	/* Database credentials*/
	$servername= "localhost";
	$dbUsername= "root";
	$dbPassword="root";
	//$dbPassword="";
	$dbName ="avocadoMC_DB";

	//Attempt to connect to MySQL database
	$conn = mysqli_connect ($servername,$dbUsername,$dbPassword,$dbName);

	// Check connection
	if ($conn=== false) {
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	echo 'Connected successfully';
?>

