<?php
	require_once('connect.php');
	
	echo "<div id='container'>";
	echo "<section class='data'>";
	
		$tourName = $_GET['$tourName'];
		
		$query = "delete from tour where tourName = '$tourName'";
		
			if (mysqli_query($connection, $query)) {
			echo "<p>Record {$tourName} has been deleted"; 
			}
			else {
			echo "Error: " . $query . "<br>" . mysqli_error($connection);
			}
			mysqli_close($connection);
			echo '</section>';
		
	?>
