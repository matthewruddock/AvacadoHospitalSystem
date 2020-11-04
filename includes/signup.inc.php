<?php

 if (isset($_POST['signupbtn'])){
	 
	 require'config.php';
	 
	 $title = $_POST['title'];  
	 $usernmae = $_POST['lname'];
	 $userlnmae = $_POST['name'];
	 $gender = $_POST['gender'];
	 $DOB = $_POST['DOB'];
	 $trn = $_POST['trn'];
	 

	 if  (empty($usernmae) ||empty($usernmae) || empty($userlnmae) ||empty($gener)) {
		 
		 header("location: ../addpatient.php?error=emptyfields&title="."&title=".$title);
		 exit();
	 }
	 
	 
	else if (!preg_match ("/^[a-zA-Z0-9]*$/",$title)) {
		 
		  header("location: ../addpatient.php?error=invaliduid&title=".$title );
		 exit ();
		 
	 }
	 
	 else if (!preg_match ("/^[a-zA-Z0-9]*$/",$usernmae)) {
		 
		  header("location: ../addpatient.php?error=invaliduid&usernmae=".$usernmae );
		 exit ();
		 
	 }
	 
	  else if (!preg_match ("/^[a-zA-Z0-9]*$/",$userlnmae)) {
		 
		  header("location: ../addpatient.php?error=invaliduid&userlnmae=".$userlnmae );
		 exit ();
		 
	 }
	 
	
	 
	 
  if(isset($_POST['title'])){
 $data=$_POST['title'];
 $fp = fopen('patientdata.txt', 'a');
 fwrite($fp, $data);
 fclose($fp);
}
  
  
  if(isset($_POST['name'])){
 $data=$_POST['title'];
 $fp = fopen('patientdata.txt', 'a');
 fwrite($fp, $data);
 fclose($fp);
}
  
  if(isset($_POST['lname'])){
 $data=$_POST['lname'];
 $fp = fopen('patientdata.txt', 'a');
 fwrite($fp, $data);
 fclose($fp);
}

if(isset($_POST['gender'])){
 $data=$_POST['gender'];
 $fp = fopen('patientdata.txt', 'a');
 fwrite($fp, $data);
 fclose($fp);
}

if(isset($_POST['TRN'])){
 $data=$_POST['TRN'];
 $fp = fopen('patientdata.txt', 'a');
 fwrite($fp, $data);
 fclose($fp);
}
  
 } 
	 
  
	 
  
	 else {
		 
		   
	  header ("location:../addpatient.php" );
	  exit();
		 
		 
	 }
