
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Tour Management System</title>
</head>
<body>  
    <?php require_once 'connect.php'; 
        include "StatusCheck.php";
    ?>
    <?php
        if (isset($_SESSION['message'])): 
    ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?>
    </div>
    <?php endif ?>

    <div class = "container">
        <?php
            $user = 'root';
            $password = '';
            $database = 'accounts';
            $db = new mysqli('localhost', $user, $password, $database) or die("unable to connect");
            $list_of_accounts = $db->query("SELECT * FROM `accounts`") or die($db->error);
        ?>

    <div class="row justify-content-center">
        <table class = 'table'>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
        <?php while ($row = $list_of_accounts->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['Id']; ?></td>
                <td><?php echo $row['Username']; ?></td>
                <td><?php echo $row['Status']; ?></td>
                <td>
                    <?php if(getStatus($user, $password, $database, $row['Id']) == "Active" ):?>
                    <a href="connect.php?deactivate=<?php echo $row["Id"];?>"
                    class="btn btn-danger">Deactivate</a>
                    <?php endif ?>

                    <?php if(getStatus($user, $password, $database, $row['Id']) == "Deactivated" ):?>
                    <a href="connect.php?activate=<?php echo $row["Id"];?>"
                    class="btn btn-success">Activate</a>
                    <?php endif ?>
                </td>
            </tr>
        <?php endwhile; ?>    
        </table>
    </div>
    

</body>
</html>