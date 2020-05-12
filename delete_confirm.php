<!DOCTYPE html>
<head>
	<title> Confirm Delete </title>
</head>

<?php

	require_once('connect.php');
	
	$id = $_POST['id'];
	$query = "select * from tour where tourName = $tourName";
	$result = mysqli_query($connection, $query);
	$row = mysqli_fetch_array($result);
	
	echo "<div id='container'>";
	echo "<section class='data'>";
	echo '<h3> Are you sure you want to delete this record?</h3>';
	
	
	echo '<p>ID: ' . $row['id'] . '<p>';
	echo '<p>Tour Name: ' . $row['tourName'] . '<p>';
	echo '<p>Description: ' . $row['Description'] . '<p>';

	
	
	echo '<p>';
	echo "<a href='delete_confirm.php'>Cancel</a>";
	echo "<a href='delete.php?tourName={$row['tourName']}'>Delete</a>";
	echo '</p>';
	
echo '</section>';

?>
