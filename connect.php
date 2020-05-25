<?php
session_start();
$db = new mysqli('localhost', 'root', "", "accounts") or die("unable to connect");

if(isset($_GET['deactivate'])){
    $id = $_GET['deactivate'];
    $db->query("UPDATE `accounts` SET `Status` = 'Deactivated' WHERE `accounts`.`Id` = $id;") or die($db->error);
    $_SESSION['message'] = "Account has been deactivated";
    $_SESSION['msg_type'] = 'danger';    
    header("location: index.php");
}

if(isset($_GET['activate'])){
    $id = $_GET['activate'];
    $db->query("UPDATE `accounts` SET `Status` = 'Active' WHERE `accounts`.`Id` = $id;") or die($db->error);
    $_SESSION['message'] = "Account has been activated";
    $_SESSION['msg_type'] = 'success';    
    header("location: index.php");
}