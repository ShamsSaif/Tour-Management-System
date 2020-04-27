<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Edit tour types</title>
</head>
<body>
    <?php require_once 'tour_types_connect.php'; ?>
    <div class="container">
        <?php
            $user = 'root';
            $password = '';
            $database = 'tour management system';
            
            $db = new mysqli('localhost', $user, $password, $database) or die("unable to connect");
            $result = $db->query("SELECT * FROM tours") or die($db->error);
            $locations = $db->query("SELECT * FROM locations") or die($db->error);
            $tour_types = $db->query("SELECT * FROM tour_types") or die($db->error);
        ?>

        <div class="row justify-content-center">
            <table class = 'table'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
            <?php while ($row = $tour_types->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['Id']; ?></td>
                    <td><?php echo $row['Label']; ?></td>
                    <td>
                    <a href="tour_types.php?delete=<?php echo $row['Id'];?>" class="btn btn-danger">Remove</a>
                    </td>
                </tr>
            <?php endwhile; ?>    
            </table>
        </div>

        <div class='row justify-content-center'>
        <form action="" method = "POST">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name = "name" class= "form-control" value="Enter tour type">
            </div>
            <div class="form-group">
                <button type="submit" name = "save" class = "btn btn-primary">Save</button>
            </div>
        </form>
        </div>
    </div>
</body>
</html>