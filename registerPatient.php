<?php
session_start();
include_once "config.php";
$PRegTRN=$PRegTitle=$PRegFName=$PRegLName=$PRegDOB=$PRegAddress=$PRegTel=$PRegEmail=$PatientRegBtn="";
?>
<!DOCTYPE html>
<html>
        <head>
            <meta charset="utf-8">
            <title>Register Patient</title>
            <link rel="stylesheet" href="css/style.css" />
        </head>
        <body>
          <form  method="POST">
          <div>
            <table>
              <tr>
                <td>Title</td>
                <td>
                <Select class="option" id="Title" name="PRegTitle" >
                  <option value="">--Please choose a title--</option>
                  <option value="Mr" <?php if($PRegTitle=='Mr') echo"selected";?> >Mr</option>
                  <option value="Ms" <?php if($PRegTitle=='Ms') echo"selected";?>>Ms</option>
                  <option value="Mrs" <?php if($PRegTitle=='Mrs') echo"selected";?>>Mrs</option>
                </Select></td>
              </tr>
              <tr>
                <td>First Name:</td><td><input type="text" name="PRegFName"placeholder="Enter Patient First Name"></td>
              </tr>
              <tr>
                <td>Last Name:</td><td><input type="text" name="PRegLName"placeholder="Enter Patient Last Name"></td>
              </tr>
              <tr>
                <td>TRN:</td><td><input type="text" name="PRegTRN"placeholder="Enter Patient TRN"></td>
              </tr>
              <tr>
                <td>DOB:</td><td><input type="date" name="PRegDOB"placeholder="Enter Patient DOB"></td>
              </tr>
              <tr>
                <td>address:</td><td><input type="text" name="PRegAddress"placeholder="Enter Patient Address"></td>
              </tr>
              <tr>
                <td>Tel:</td><td><input type="text" name="PRegTel"placeholder="Enter Patient Telephone"></td>
              </tr>
              <tr>
                <td>Email:</td><td><input type="text" name="PRegEmail"placeholder="Enter Patient Email"></td>
              </tr>
              <tr>
                <td><input type="submit" name="PatientRegBtn" value="Register" ></td>
              </tr>
            </table>
          </div>
          <?php
            if(isset($_POST['PatientRegBtn'])){
              foreach($_POST as $key=>$value)//each session the value will be read
                  {
                    $$key=$value;//each session value is set to the key variables
                  }
              $PRegDOB=date("Y-m-d",strtotime($PRegDOB));
              $insertQuery="INSERT INTO patient(PatientTRN,Title,FirstName,LastName,DateOfBirth,Address,TelNo,Email) VALUES ('$PRegTRN','$PRegTitle','$PRegFName','$PRegLName','$PRegDOB','$PRegAddress','$PRegTel','$PRegEmail')";
              mysqli_query($conn,$insertQuery) or die("Could not upload profile information".mysqli_error($conn));
              mysqli_close($conn);
            }
          ?>
          </form>
        </body>
</html>
