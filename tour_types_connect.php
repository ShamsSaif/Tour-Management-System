<?php
    $db = new mysqli('localhost', 'root', "", "tour management system") or die("unable to connect");
    if(isset($_POST['save'])){
        $typeName = $_POST['name'];
        $db ->query("INSERT INTO tour_types (Label) VALUES('$typeName')") 
        or die($db->error);
    }

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $db -> query("DELETE FROM `tour_types` WHERE `tour_types`.`Id` = $id") or die($mysqli->error());
    }

?>