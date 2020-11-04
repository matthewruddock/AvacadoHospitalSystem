<?php 





if(isset($_POST['title'])){
 $data=$_POST['title'];
 $fp = fopen('patientdata.txt', "a+\n");
 fwrite($fp, $data );
 fwrite($fp, "\n");
 fclose($fp);
}
  
  
  if(isset($_POST['name'])){
 $data=$_POST['name'];
 $fp = fopen('patientdata.txt', "a+");
 fwrite($fp, $data);
 fwrite($fp, "\n");
 fclose($fp);
}
  
  if(isset($_POST['lname'])){
 $data=$_POST['lname'];
 $fp = fopen('patientdata.txt', 'a');
 fwrite($fp, $data);
 fwrite($fp, "\n");
 fclose($fp);
}

if(isset($_POST['gender'])){
 $data=$_POST['gender'];
 $fp = fopen('patientdata.txt', 'a');
 fwrite($fp, $data);
 fwrite($fp, "\n");
 fclose($fp);
}

if(isset($_POST['Year'])){
 $data=$_POST['Year'];
 $fp = fopen('patientdata.txt', 'a');
 fwrite($fp, $data);
 fwrite($fp, " ");
 fclose($fp);
}

if(isset($_POST['Date'])){
 $data=$_POST['Date'];
 $fp = fopen('patientdata.txt', 'a');
 fwrite($fp, $data);
 fwrite($fp, " ");
 fclose($fp);
}


if(isset($_POST['Month'])){
 $data=$_POST['Month'];
 $fp = fopen('patientdata.txt', 'a');
 fwrite($fp, $data);
 fwrite($fp, "\n");
 fclose($fp);
}

if(isset($_POST['TRN'])){
 $data=$_POST['TRN'];
 $fp = fopen('patientdata.txt', 'a');
 fwrite($fp, $data);
 fwrite($fp, "\n");
 fclose($fp);
 
}
  {	 
		  header ("location: addpatient.php" );
	  exit();
		  }

?>