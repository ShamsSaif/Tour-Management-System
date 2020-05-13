<?php
session_start();
include 'db_connection.php';

if (isset($_POST['adduser'])) {
    header('Location: register.php');
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
        <button type="submit" value="logout" name="logout">
        <h2>Logout</h2>
         </button>
     </form>
  </div>
	
<h2>Available Assistant:</h2>
<table>
<tr>
<th>Email</th>
<th>Name</th>
<th>Status</th>
<th>Action</th>
</tr>
<?php
$conn = OpenCon();

$sql = "SELECT * FROM assistants";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
echo "<tr><td width='200px'>" . $row["email"]. "</td><td width='300px'>" . $row["fname"] . "</td><td width='100px'>"
. $row["stat"]. "</td> <td width='100px'><a href='remove_admin.php?ast_id=" . $row["ast_id"] . "'>  Delete</a></td></tr>";
}

} else { echo "0 results"; }
$conn->close();
?>
</table>


&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<h2>Available locations:</h2>
<table>
<tr>
<th>Tour Name</th>
<th>Locations</th>
<th>Category</th>
<th>Action</th>
</tr>
<?php
$conn = OpenCon();

$sql = "SELECT * FROM Tours";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
echo "<tr><td width='200px'>" . $row["tname"]. "</td><td width='300px'>" . $row["locs"] . "</td><td width='100px'>"
. $row["category"]. "</td> <td width='100px'><a href='edit_location.php?t_id=" . $row["t_id"] . "'>  Edit</a></td></tr>";
}

} else { echo "0 results"; }
$conn->close();
?>
</table>

</body>

</html>