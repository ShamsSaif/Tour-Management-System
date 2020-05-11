<!DOCTYPE html>

<html lang = "EN">
	<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html";>
<meta name="description" content="Add Locations">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="style.css" rel="stylesheet"  type="text/css"/>

</head>


<!DOCTYPE html>
<html lang = "EN">

  <head>
    <meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html"; />

<title>Locations</title>
<link href = "style.css" rel="stylesheet" type="text/css"/>
</head>

<header style="width:100%; height:150px; text-align:center; align:center; font-family: 'Oswald', sans-serif; color:BLACK">

<div>
<table cellspacing="25" style="width:100%; height=50px; float:left, align:center; text-align:center; border-color:red; border-style:none">
<tr style="height:30px;">
<td style="border-width:2px; border-style:solid; font-size:20px">
<a href="location.php">Locations</a></td>
</tr>
</table>
</div>
</html>

<!DOCTYPE html>
<html>
<body>	
<style>
div {
  padding:50px 50px 75px 100px;
  background-color: lightblue;
  #table{cellspacing=25px; width:100%; height:50px; float:left; align:center; text-align:center; border-color:red; border-style:none}
.tr{height:20px;}
.td{border-width:2px; border-style:solid; font-size:20px}
}
</style>
</head>
<div align="center" >	
<b>Type New Location Information</b>
<form enctype="multipart/form-data" method="post" action="display.php">
<table border="1">
  <tr>
    <td align="center">Add New Location Details on Database</td>
  </tr>
  <tr>
    <td>
      <table>		
		<tr>
		<td>ID</td>
		<td><input type="text" name="location_id" size="10" maxlength="4"></td>
		</tr>
        <tr>
          <td>Name</td>
          <td><input type="text" name="location_name" size="35" maxlength="80"></td>
        </tr>
		<tr>
          <td>Description</td>
          <td><textarea type="text" class="textbox" cols="50" rows="5" name="location_description" size="200" maxlength="850"></textarea></td>
        </tr>
		<tr>
		  </td>
		  </tr>
		</table>
      </td>
    </tr>
</table>

	<div class="row">
		<input type="submit" name="submit" value="Add" />
		<input type="reset" value="Clear" />
	</div>	
</form>
</div>
</body>
