<!DOCTYPE html>
<head>
	<title> Update Form </title>
</head>



<?php	
require_once('connect.php');

	$query='select * from locations';   		
	$result=mysqli_query($connection, $query);
	$count=mysqli_num_rows($result);
	
	for($i=0;$i<$count;$i++) {
		$row[$i]=mysqli_fetch_array($result);
	}
?>	
	<!--html form-->
	
	<fieldset>
		<h4>Select Location:</h4>
	<form action="update_form.php" method="post">
	<select name="id">
	
<?php
		foreach($row as $next) {
		echo "<option value='".$next['id']."'>".$next['locationName']."</option>";
		}	
?>
		
	</select>
	
	<input type="submit" value="submit" name="submit" />
	</form>
	</fieldset>
	
	
