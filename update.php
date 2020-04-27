

<?php

require_once('connect.php');
	if(!isset($_POST['submit'])) {
	echo "Unauthorised access";
	}
	else {
		$id = $_POST['id'];
		$locationName = $_POST['locationName'];
		$description = $_POST['description'];
		
		$query = "update locations set locationName = '$locationName', description = '$description' where id = '$id'";
		
		if (mysqli_query($connection, $query)) {
		
		echo "<p>You have successfully update {$locationName}</p>";
		}
		else
		{
		echo '<p>There was a problem updating the record</p>';
		echo "Error: " . $query . "<br>" . mysqli_error($connection);
		}
		}
?>



