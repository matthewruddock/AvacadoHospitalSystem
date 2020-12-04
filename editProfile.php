<?php
session_start();
include_once "config.php";

$name=$email=$nameerr=$emailerr="";
foreach($_SESSION as $key => $value)	//store SESSION values in to local variables
{
  $$key = $value;
}
?>
<!DOCTYPE html>
<html>
        <head>
            <meta charset="utf-8">
            <title>Edit Profile</title>
            <link rel="stylesheet" href="css/style.css" />
            <link rel="stylesheet" href="bootstrap.css"/>
        </head>
        <body>
          <form  method="POST">
<br/><br/>
<br/>
          <div class="container">

            <?php
            if(isset($_SESSION['StaffID'])){
                $ID=$_SESSION['StaffID'];
                $SelQuery= "SELECT * FROM staff  WHERE StaffID='$ID'";
                $result=mysqli_query($conn,$SelQuery);

                $rows= mysqli_fetch_assoc($result);

                  echo" <div>
                        <h3>Edit Profile</h3>
                      </div>";
                  echo"<table>

                          <tr>
                          <td>Name:</td>
                          <td><input name='name' type='text' value=".$rows['Name']."><br> ".$nameerr."</td>
                          </tr>
                          <td>Email:</td>
                          <td><input name='email' type='text' value=".$rows['Email']."><br> ".$emailerr."</td>
                          </tr>
                          </tr>
                        <!--  <td>Password:</td>
                          <td><input name='password' type='password' value=".$rows['Password']."></td>
                          </tr>-->

                          <tr><td><input name='updatebtn' type=submit value='update'></td></tr>
                          ";

                    if(isset($_POST['updatebtn'])){
                      $name=$_POST['name'];
                      $email=$_POST['email'];
                      if($name==""){
                        $_SESSION['nameerr']="<p style= 'color:red;'>Enter a valid name.</p>";
                      }
                      if(!filter_var($email,FILTER_VALIDATE_EMAIL)){//validate email if its a valid one
                				 $_SESSION['emailerr']= "<p style= 'color:red;'>Email is invalid.</p>";

                				 }

                      $updateQuery="UPDATE staff SET Name='$name',Email='$email' WHERE StaffID='$ID'";
                      mysqli_query($conn,$updateQuery);
                      unset(  $_POST['updatebtn'] );
                    }



            }else{
              echo"<p style='font-size:50px'>I am sorry. <strong style='color:red'>ERROR:</strong> you are not logged in and lack privilege to edit page</p>";
              echo "<a href='index.php'>click here to go home</a>";
              //header("Location:index.php");
            }

    //close connection
    mysqli_close($conn);
            ?>

          </div>

          </form>
        </body>
</html>
