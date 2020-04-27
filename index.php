
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
    <?php require_once 'connect.php'; ?>
    <div class="container">
        <?php
            $user = 'root';
            $password = '';
            $database = 'tour management system';
            
            $db = new mysqli('localhost', $user, $password, $database) or die("unable to connect");
            $result = $db->query("SELECT * FROM tours") or die($db->error);
            $locations = $db->query("SELECT * FROM locations") or die($db->error);
            $tour_types = $db->query("SELECT * FROM tour_types") or die($db->error);
            //pre_r($result);
        ?>

        <div class="row justify-content-center">
            <table class = 'table'>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Location</th>
                        <th>Min_duration</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['Name']; ?></td>
                    <td><?php echo $row['Type']; ?></td>
                    <td><?php echo $row['Locations']; ?></td>
                    <td><?php echo $row['Min_duration']; ?></td>
                </tr>
            <?php endwhile; ?>    
            </table>
        </div>
        
        <?php
            pre_r($result->fetch_assoc());
            function pre_r($array){
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }
        ?>
        <div class='row justify-content-center'>
            <form action="" method = "POST">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name = "name" class= "form-control" value="Enter tour name">
                </div>
                <div class="form-group">
                    <label>Type</label>            
                    <select name="type" class="form-control">
                    <?php while($types_list = $tour_types->fetch_assoc()):?>
                        <option class= "form-control" value="<?php $types_list["Label"]?>"><?php echo $types_list["Label"]?></option>
                    <?php endwhile; ?>
                    </select>
                    
                </div>
                <div class="form-group">
                    <label>Locations</label> <br>
                    <?php while ($location_list = $locations ->fetch_assoc()):?>
                        <input type="checkbox" name="locations[]" value="<?php echo $location_list["Name"];?>"/> 
                        <?php echo $location_list["Name"]; ?> </br> 
                    <?php endwhile;?>
                </div>
                <div class="form-group">
                    <button type="submit" name = "save" class = "btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>



</body>
</html>