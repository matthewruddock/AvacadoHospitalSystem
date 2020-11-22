<?php
    session_start();
    require('config.php');
    $StaffID=$_REQUEST['StaffID'];
    $query = "DELETE FROM Staff WHERE StaffID=$StaffID"; 
    $result = mysqli_query($conn,$query) or die ("Connection failed: " .mysqli_connect_error());
    header("Location: viewAccount.php"); 
?>