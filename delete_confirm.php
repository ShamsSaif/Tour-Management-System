<!DOCTYPE html>
<head>
	<title> Confirm Delete </title>
</head>

<?php
include('includes/footer.php');
include('includes/nav.php');	
	require_once('connect.php');
	
	$LocationID= $_POST['LocationID'];
	$query = "select * from location where locationID = $locationID";
	$result = mysqli_query($connection, $query);
	$row = mysqli_fetch_array($result);
	
	echo "<div id='container'>";
	echo "<section class='data'>";
	echo '<h3> Are you sure you want to delete this record?</h3>';
	
	
	echo '<p>Location ID : ' . $row['LocationID'] . '<p>';
	echo '<p>Location Name: ' . $row['LocationName'] . '<p>';
	echo '<p>Description: ' . $row['Description'] . '<p>';
	
	
	echo '<p>';
	echo "<a href='delete_confirm.php'>Cancel</a>";
	echo "<a href='delete.php?LocationName={$row['LocationID']}'>Delete</a>";
	echo '</p>';
	
echo '</section>';

?>