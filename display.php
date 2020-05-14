<!DOCTYPE html>
<head>
	<title> Display Current Locations </title>
</head>


<?php


require_once('connect.php');
$query =  'select * from locations';
$result = mysqli_query($connection,$query);


$row_count = mysqli_num_rows($result);


for($i=0; $i < $row_count; $i++) {
$row[] = mysqli_fetch_array($result);
}
foreach($row as $next) {

echo '<h1>'.$next['id'].'</h1>';
echo '<h1>'.$next['locationName'].'</h1>';
echo '<p>'.$next['description'].'</p>';

}

mysqli_close($connection);
?>
