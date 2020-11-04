<?php
session_start();
include("headers.php");


if(isset($_POST['address'])){
 $data=$_POST['address'];
 $fp = fopen('patientdata.txt', 'a+');
 fwrite($fp, $data);
 fwrite($fp, "\n");
 fclose($fp);
}


if(isset($_POST['pcity'])){
 $data=$_POST['pcity'];
 $fp = fopen('patientdata.txt', 'a+');
 fwrite($fp, $data);
 fwrite($fp, "\n");
 fclose($fp);
}


if(isset($_POST['city'])){
 $data=$_POST['city'];
 $fp = fopen('patientdata.txt', 'a+');
 fwrite($fp, $data);
 fwrite($fp, "\n");
 fclose($fp);
}


if(isset($_POST['pincode'])){
 $data=$_POST['pincode'];
 $fp = fopen('patientdata.txt', 'a+');
 fwrite($fp, $data);
 fwrite($fp, "\n");
 fclose($fp);
}
if(isset($_POST['email'])){
 $data=$_POST['email'];
 $fp = fopen('patientdata.txt', 'a+');
 fwrite($fp, $data);
 fwrite($fp, "\n");
 fclose($fp);
}
if(isset($_POST['mobilenumber'])){
 $data=$_POST['mobilenumber'];
 $fp = fopen('patientdata.txt', 'a+');
 fwrite($fp, $data);
 fwrite($fp, "\n");
 fwrite($fp, "\n");
 fclose($fp);
}

?>


<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first">Add New Patient</li></ul>
  </div>
</div>
<div class="wrapper col4">
 <div id="container">
   
   <center> <table width="200" border="3"> <table width="200" border="3"></center>
    <table width="200" border="3">
    <h1>Patient profile Registration Panel</h1>
    <form method="post" action="" name="frmpatient" onSubmit="return validateform()">
      <tbody>
        
<?php
if(isset($_GET[editid]))
{
?>       
        
<?php
}
?>
        <tr>
          <td>Address</td>
          <td><textarea name="address" id="address" cols="45" required rows="5" ><?php echo $rsedit[address]; ?></textarea></td>
        </tr>
        <tr>
          <td>City</td>
          <td><input type="text" name="pcity"  id="city"  value=" <?php echo $rsedit[city]; ?> "required /></td>
        </tr>
		<tr>
          <td>Country</td>
          <td><input type="text" name="city" required id="city"   value="<?php echo $rsedit[Pcity]; ?> " /></td>
        </tr>
		
		 <tr>
          <td>District</td>
		 <td> <input type="text"  name="pincode"  required></td>
         
        </tr>
		
        <tr>
          <td>Email</td>
		 <td> <input type="text" placeholder="format example, jay@hotmail.com" name="email" pattern="/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/" required></td>
         
        </tr>
		<tr>
          <td>Mobile Number</td>
          <td><input type="text" name="mobilenumber"   title="Please enter a Valid Number, Eg 8764812209"  id="mobilenumber" pattern = "[1-9]{1}[0-9]{9}" value="  " /></td>
        </tr>
        <tr>
          
        
      
	  
        
       
          
        <tr>
          <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Submit" /></td>
        </tr>
      </tbody>
    </table>
    </form>
    <p>&nbsp;</p>
  </div>
</div>
</div>
 <div class="clear"></div>
  </div>
</div>
<?php
include("footers.php");
?>
<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform()
{
	if(document.frmpatient.patientname.value == "")
	{
		alert("Patient name should not be empty..");
		document.frmpatient.patientname.focus();
		return false;
	}
else if(!document.frmpatient.patientname.value.match(alphaspaceExp))
	{
		alert("Patient name not valid..");
		document.frmpatient.patientname.focus();
		return false;
	}
	else if(document.frmpatient.admissiondate.value == "")
	{
		alert("Admission date should not be empty..");
		document.frmpatient.admissiondate.focus();
		return false;
	}
	else if(document.frmpatient.admissiontme.value == "")
	{
		alert("Admission time should not be empty..");
		document.frmpatient.admissiontme.focus();
		return false;
	}
	else if(document.frmpatient.address.value == "")
	{
		alert("Address should not be empty..");
		document.frmpatient.address.focus();
		return false;
	}
	else if(document.frmpatient.mobilenumber.value == "")
	{
		alert("Mobile number should not be empty..");
		document.frmpatient.mobilenumber.focus();
		return false;
	}
	else if(!document.frmpatient.mobilenumber.value.match(numericExpression))
	{
		alert("Mobile number not valid..");
		document.frmpatient.mobilenumber.focus();
		return false;
	}
	else if(document.frmpatient.city.value == "")
	{
		alert("City should not be empty..");
		document.frmpatient.city.focus();
		return false;
	}
	else if(!document.frmpatient.city.value.match(alphaspaceExp))
	{
		alert("City not valid..");
		document.frmpatient.city.focus();
		return false;
	}
	else if(document.frmpatient.pincode.value == "")
	{
		alert("Pincode should not be empty..");
		document.frmpatient.pincode.focus();
		return false;
	}
	else if(!document.frmpatient.pincode.value.match(numericExpression))
	{
		alert("Pincode not valid..");
		document.frmpatient.pincode.focus();
		return false;
	}
	else if(document.frmpatient.loginid.value == "")
	{
		alert("Login ID should not be empty..");
		document.frmpatient.loginid.focus();
		return false;
	}
	else if(!document.frmpatient.loginid.value.match(alphanumericExp))
	{
		alert("Login ID not valid..");
		document.frmpatient.loginid.focus();
		return false;
	}
	else if(document.frmpatient.password.value == "")
	{
		alert("Password should not be empty..");
		document.frmpatient.password.focus();
		return false;
	}
	else if(document.frmpatient.password.value.length < 8)
	{
		alert("Password length should be more than 8 characters...");
		document.frmpatient.password.focus();
		return false;
	}
	else if(document.frmpatient.password.value != document.frmpatient.confirmpassword.value )
	{
		alert("Password and confirm password should be equal..");
		document.frmpatient.confirmpassword.focus();
		return false;
	}
	else if(document.frmpatient.select2.value == "")
	{
		alert("Blood Group should not be empty..");
		document.frmpatient.select2.focus();
		return false;
	}
	else if(document.frmpatient.select3.value == "")
	{
		alert("Gender should not be empty..");
		document.frmpatient.select3.focus();
		return false;
	}
	else if(document.frmpatient.dateofbirth.value == "")
	{
		alert("Date Of Birth should not be empty..");
		document.frmpatient.dateofbirth.focus();
		return false;
	}
	else if(document.frmpatient.select.value == "" )
	{
		alert("Kindly select the status..");
		document.frmpatient.select.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>