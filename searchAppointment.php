<?php
session_start();
include_once "config.php";
$where="";
?>
<!DOCTYPE html>
<html>
        <head>
            <meta charset="utf-8">
            <title>Search Appointment</title>
            <link rel="stylesheet" href="css/style.css" />
            <link rel="stylesheet" href="bootstrap.css"/>
        </head>
        <body>
          <form  method="POST">
            <br/><br/><br/><br/>
          <div class="container">
            <h3>Search Appointment</h3>
            PatientTRN: <input type="text" name="TRNSearch" placeholder="Enter TRN">
            <input type="submit" name="SearchBtn" value="Search">
          </div>
          <div class="container">
            <table>
              <tr>
                <th>Patient TRN</th>
                <th>StaffID</th>
                <th>Date</th>
                <th>Reason for visit</th>
                <th>Status</th>
              </tr>
            <?php
            if(isset($_POST['TRNSearch'])){
              var_dump($_POST);
                $TRN=$_POST['TRNSearch'];
                if($TRN==""){
                  $TRN=1;
                }
                $where="WHERE PatientTRN=".$TRN;

                $SelQuery= "SELECT * FROM appointment $where";
                $result=mysqli_query($conn,$SelQuery);

                while($rows= mysqli_fetch_assoc($result)){
                  echo"<tr>
                        <td>".$rows['PatientTRN']."</td>
                        <td>".$rows['StaffID']."</td>
                        <td>".$rows['Date']."</td>
                        <td>".$rows['ReasonForVisit']."</td>
                        <td>".$rows['Status']."</td>
                        </tr>";

                }
                //close connection
                mysqli_close($conn);
              unset($_POST['TRNSearch']);
            }
            ?>
          </table>
          </div>

          </form>
        </body>
</html>
