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
    <?php
        require_once 'connect.php';
    ?>
    <div class = "container">
        <?php
            $user = 'root';
            $password = '';
            $database = 'assistant accounts';
            $db = new mysqli('localhost', $user, $password, $database) or die("unable to connect");
            $list_of_accounts = $db->query("SELECT * FROM `accounts`") or die($db->error);
        ?>    

        

        <div class="row justify-content-center">
            <table class = 'table' width="100%">
                <tr class="text-center">
                    <th width="50%">Id</th>
                    <th width="50%">Username</th>
                </tr>
            <?php while ($row = $list_of_accounts->fetch_assoc()): ?>
                <tr class="text-center">
                    <td width="50%"><?php echo $row['Id']; ?></td>
                    <td width="50%"><?php echo $row['Username']; ?></td>
                </tr>
            <?php endwhile; ?>    
            </table>
        </div>
    </div>
</body>
</html>