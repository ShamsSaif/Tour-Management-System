<!DOCTYPE html>
<head>
	<title> Insert Form </title>
</head>


<?php
$title="InsertNew Locations";
include('includes/nav.php');	
?>		
	
	<!---Add new Location recoerd--->
	<form method="post" action="insert.php">
	<fieldset>
	<legend>Insert / Add a New Record</legend>
						
						
	<div class="row">
		<label for="LocationID" class="fixedwidth">Location ID:</label>
		<input type="text" name="product" />
	</div>

	<div class="row">
		<label for="LocationName" class="fixedwidth">Location Name:</label>
		<input type="text" name="brand" />
	</div>
						
	<div class="row">
		<label for="description" class="fixedwidth" >Description</label>
		<input type="text" cols="25" name="description" />
	</div>
												
	<div class="row">
		<input type="submit" name="submit" value="Add" />
		<input type="reset" value="Clear" />
	</div>
	</fieldset>					
	</form>