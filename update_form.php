<!DOCTYPE html>
<head>
	<title> Update Form </title>
</head>


<?php

require_once('connect.php');
$id = $_POST['id'];

$query = "select * from locations where id = '$id' ;";
$result = mysqli_query($connection, $query);

$row = mysqli_fetch_array($result);

$id = $row['id'];
$locationName = $row['locationName'];
$description = $row['description'];

?>

<fieldset>
<h3>Update Post</h3>

<form method="post" action="update.php" enctype="multipart/form-data">

<input type="hidden" name="ID" maxlength="4"   value=" <?php echo $ID?> " />


<div class="row">
	<label for="location_name">Location Name</label>
	<input type="text" name="locationName" maxlength="20" value=" <?php echo $LocationName ?>" />
</div>

<div class="row">
	<label for="description">Description</label>
	<textarea cols="50" rows="5" maxlength="850" name="description"> <?php echo $Description ?> </textarea>
</div>

<div class="row">
	<input type="submit" name="submit" value="Update" />
</div>
</form>
</fieldset>
