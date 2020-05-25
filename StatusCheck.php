<?php
function getStatus($user, $password, $database, $Id){
    $db = new mysqli('localhost', $user, $password, $database) or die("unable to connect");
    return $db->query("SELECT * FROM `accounts` WHERE `Id` = $Id")->fetch_assoc()["Status"];
}
