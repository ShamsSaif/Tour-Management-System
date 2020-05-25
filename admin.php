<?php
session_start();
include 'db_connection.php';

if (isset($_POST['adduser'])) {
    header('Location: register.php');
}
if (isset($_POST['addtour'])) {
    header('Location: add_tour.php');
}
if (isset($_POST['addlocation'])) {
    header('Location: add_location.php');
}
if (isset($_POST['logout'])) {
    header('Location: index.php');
}
?>

<!DOCTYPE html>

<h3>Welcome Adm <?php echo $_SESSION['name'];?></h3>

<body>
  <div>
     <form method="post">
        <button type="submit" value="adduser" name="adduser">
            <h2>Add an Admin or Assistant</h2>
        </button>
        <button type="submit" value="addlocation" name="addlocation">
            <h2>Add Locations</h2>
        </button>
        <button type="submit" value="addtour" name="addtour">
            <h2>Add Tour</h2>
        </button>
        <button type="submit" value="logout" name="logout">
        <h2>Logout</h2>
         </button>
     </form>
  </div>
	
<h2>Available Assistant:</h2>
<table>
<tr>
<th style="text-align:left;">Email</th>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Status</th>
<th style="text-align:left;">Action</th>
</tr>
<?php
$conn = OpenCon();

$sql = "SELECT * FROM assistants";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
echo "<tr><td width='200px'>" . $row["email"]. "</td><td width='300px'>" . htmlspecialchars( $row["fname"]) . "</td><td width='100px'>"
. $row["stat"]. "</td> <td width='100px'>
<a href='edit_assistant.php?ast_id=" . $row["ast_id"] . "' >  Edit</a> | <a href='remove_admin.php?ast_id=" . $row["ast_id"] . "' onClick='return confirm(\" Are you sure you want to delete ?\")'>  Delete</a></td></tr>";
}

} else { echo "0 results"; }
$conn->close();
?>
</table>


<h2>Available Location:</h2>
<table>
<tr>
<th style="text-align:left;">lname</th>
<th style="text-align:left;">coord</th>
<th style="text-align:left;">Action</th>
</tr>
<?php
$conn = OpenCon();

$sql = "SELECT * FROM locations";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
echo "<tr><td width='200px'>" . $row["lname"]. "</td><td width='300px'>" . htmlspecialchars( $row["coord"]) . "</td> <td width='100px'>
  <a href='edit_locations.php?locs_id=" . $row["locs_id"] . "' >  Edit</a> | <a href='remove_locations.php?locs_id=" . $row["locs_id"] . "' onClick='return confirm(\" Are you sure you want to delete ?\")'>  Delete</a></td></tr>";
}

} else { echo "0 results"; }
$conn->close();
?>
</table>


&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<h2>Available Tour:</h2>
<table>
<tr>
<th style="text-align:left;">Tour Name</th>
<th style="text-align:left;">Locations</th>
<th style="text-align:left;">Category</th>
<th style="text-align:left;">Action</th>
</tr>
<?php
$conn = OpenCon();

$sql = "SELECT * FROM Tours";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
echo "<tr><td width='200px'>" . $row["tname"]. "</td><td width='300px'>" . htmlspecialchars($row["locs"]) . "</td><td width='100px'>"
. $row["category"]. "</td> <td width='100px'><a href='edit_location.php?t_id=" . $row["t_id"] . "' >  Edit</a> | <a href='remove_location.php?t_id=" . $row["t_id"] . "' onClick='return confirm(\" Are you sure you want to delete ?\")'>  Delete</a></td></tr>";
}

} else { echo "0 results"; }
$conn->close();
?>
</table>

</body>

</html>