<?php
$db = new mysqli('localhost', 'root', "", "tour management system") or die("unable to connect");
if(isset($_POST['save'])){
    $name = $_POST['name'];
    $type = $_POST['type'];
    $location = $_POST['locations'];
    $duration = calculateTotalMinimumDuration($location);
    $location_value = implode(", ", $location);
    $db ->query("INSERT INTO tours (Name, Type, Locations, Min_duration) VALUES('$name', '$type','$location_value', '$duration')") 
    or die($db->error);
}

function calculateTotalMinimumDuration($locationArray){
    $duration = 0;
    foreach ($locationArray as $key=>$value){
        $db = new mysqli('localhost', 'root', "", "tour management system") or die("unable to connect");
        $search_result = $db->query("SELECT * FROM `locations` WHERE `Name` = '$value'");
        $row = $search_result->fetch_assoc();
        $duration += $row["Min_time"];
    }
    return $duration;
}

?>