<?php
session_start();
include_once "config.php";
$TRNSearch="";
?>
<!DOCTYPE html>
<html>
        <head>
            <meta charset="utf-8">
            <title>View Account</title>
            <link rel="stylesheet" href="css/style.css" />
        </head>
        <body>
          <form  method="POST">
          <div>
            <h3>Search Patient</h3>
            PatientTRN: <input type="text" name="TRNSearch" placeholder="Enter TRN">
            <input type="submit" name="SearchBtn" value="Search">
          </div>
          <div>
            <table>
              <tr>
                  <th>Patient TRN</th>
                  <td>Title</th>
                  <td>First Name</td>
                  <td>DOB</td>
                  <td>Address</td>
                  <td>Telephone Number</td>
                  <td>Email</td>
              </tr>
            <?php
            if(isset($_POST['TRNSearch'])){
                $TRN=$_POST['TRNSearch'];
                $SelQuery= "SELECT * FROM patient  WHERE PatientTRN=$TRN";
                $result=mysqli_query($conn,$SelQuery);

                while($rows= mysqli_fetch_assoc($result)){
                  echo"<tr>
                        <td>".$rows['PatientTRN']."</td>
                        <td>".$rows['Title']."</td>
                        <td>".$rows['FirstName']."</td>
                        <td>".$rows['DateOfBirth']."</td>
                        <td>".$rows['Address']."</td>
                        <td>".$rows['TelNo']."</td>
                        <td>".$rows['Email']."</td>
                        </tr>";

                }
            }
            ?>
          </table>
          </div>

          </form>
        </body>
</html>
