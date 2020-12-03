<?php
session_start();
var_dump($_POST);
include_once "config.php";
$updateSet=$TRNSearch=$Status=$Reasonforvisit="";
$_SESSION['role']='Doctor';
?>
<!DOCTYPE html>
<html>
        <head>
            <meta charset="utf-8">
            <title>Log Patient</title>
            <link rel="stylesheet" href="css/style.css" />
            <link rel="stylesheet" href="bootstrap.css"/>
        </head>
        <body>
          <form  method="POST">
            <br/><br/><br/><br/>
          <div class="container">
            <h3>Log patient</h3>
            <table>
              <tr>
                <?php
                if($_SESSION['role']=='Nurse'){
                echo '<td>PatientTRN:</td> <td><input type="text" name="TRNSearch" placeholder="Enter TRN"></td>
              </tr>

              <tr>
                <td>Status:</td><td><Select class="option" id="Title" name="Status" >
                <option value="">--Please choose a Status--</option>
                <option value="Pending" <?php if($Status=="Pending") echo"selected";?> >Pending</option>
                <option value="Complete" <?php if($Status=="Complete) echo"selected";?>>Complete</option>
                <option value="Cancel" <?php if($Status=="Cancel") echo"selected";?>>Cancel</option>
            </Select> </td>
              </tr>
                </table';


              }
              if($_SESSION['role']=='Doctor'){
              echo ' <td>PatientTRN:</td> <td><input type="text" name="TRNSearch" placeholder="Enter TRN"></td>
            </tr>

            <tr>
              <td>Status:</td><td><Select class="option" id="Title" name="Status" >
              <option value="">--Please choose a Status--</option>
              <option value="Pending" <?php if($Status=="Pending") echo"selected";?> Pending</option>
              <option value="Complete" <?php if($Status=="Complete) echo"selected";?>Complete</option>
              <option value="Cancelled" <?php if($Status=="Cancelled") echo"selected";?>Cancelled</option>
          </Select> </td>
            </tr>
               <tr>
                <td>Reason:</td> <td> <input type="text" name="Reasonforvisit" placeholder="Enter Reason For Visit"></td>
           </tr>';



            }
                ?>
          <tr>
            <td><input type="submit" name="SearchBtn" value="Log Patient"></td>
          </tr>

          </div>
          <div class="container">

            <table>
            <?php
            if(isset($_POST['SearchBtn'])){
              var_dump($_POST);

                $TRNSearch=$_POST['TRNSearch'];
                $Status=$_POST['Status'];
                $updateSet="Status='".$Status."'";
                if($_SESSION['role']=='Doctor'){
                $Reasonforvisit= $_POST['Reasonforvisit'];
                $updateSet="ReasonForVisit='".$Reasonforvisit."',Status='".$Status."'";
              }
                if($TRNSearch==""){
                  $TRN=1;
                }


                $updateQuery="UPDATE appointment SET $updateSet WHERE PatientTRN='$TRNSearch'";
                mysqli_query($conn,$updateQuery);

                //close connection
                mysqli_close($conn);
            unset($_POST['SearchBtn']);
            var_dump($_POST);
            }
            ?>
          </table>
          </div>

          </form>
        </body>
</html>
