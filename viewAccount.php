<?php
  session_start();
  include_once "config.php";
?>
<!DOCTYPE html>
<html>
        <head>
            <meta charset="utf-8">
            <title>View Account</title>
            <link rel="stylesheet" href="css/style.css" />
        </head>
        <body>
            <div class="form">
                <p><a href="index.php">Home</a> 
                | <a href="insert.php">Insert New Record</a> 
                | <a href="logout.php">Logout</a></p>
                <h2>View Records</h2>
                <table width="100%" border="1" style="border-collapse:collapse;">
                    <thead>
                        <tr>
                            <th><strong>StaffID</strong></th>
                            <th><strong>Name</strong></th>
                            <th><strong>Email</strong></th>
                            <th><strong>Password</strong></th>
                            <th><strong>Type</strong></th>
                            <th><strong>Edit</strong></th>
                            <th><strong>Delete</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $select_query="SELECT * FROM Staff ORDER BY StaffID desc;";
                            $result = mysqli_query($conn,$select_query);
                            while($row = mysqli_fetch_assoc($result)) { ?>
                            <tr><td align="center"><?php echo $count; ?></td>
                                <td align="center"><?php echo $row["StaffID"]; ?></td>
                                <td align="center"><?php echo $row["Name"]; ?></td>
                                <td align="center"><?php echo $row["Email"]; ?></td>
                                <td align="center"><?php echo $row["Password"]; ?></td>
                                <td align="center"><?php echo $row["Type"]; ?></td>
                                <td align="center">
                                <a href="editAccount.php?id=<?php echo $row["StaffID"]; ?>">Edit</a>
                                </td>
                                <td align="center">
                                <a href="deleteAccount.php?id=<?php echo $row["StaffID"]; ?>">Delete</a>
                                </td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </body>
</html>