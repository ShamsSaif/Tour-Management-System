<?php
	require_once('connect.php');
	
	echo "<div id='container'>";
	echo "<section class='data'>";
	
		$LocationID = $_GET['LocationID'];
		
		$query = "delete from locations where LocationID = '$LocationID'";
		
			if (mysqli_query($connection, $query)) {
			echo "<p>Record {$LocationID} has been deleted"; 
			}
			else {
			echo "Error: " . $query . "<br>" . mysqli_error($connection);
			}
			mysqli_close($connection);
			echo '</section>';
		
	?>