<?php
session_start();
include 'db_connection.php';

if (isset($_POST['logout'])) {
    header('Location: index.php');
}
?>

<!DOCTYPE html>

<h3>Welcome Adm <?php echo $_SESSION['name'];?></h3>

<body>
<h2>Available locations:</h2>
<table>
<tr>
<th>Tour Name</th>
<th>Locations</th>
<th>Category</th>
</tr>
<?php
$conn = OpenCon();

$sql = "SELECT tname, locs, category FROM Tours";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["tname"]. "</td><td>" . $row["locs"] . "</td><td>"
. $row["category"]. "</td></tr>";
}

} else { echo "0 results"; }
$conn->close();
?>
</table>
    <form method="post">
        <button type="submit" value="logout" name="logout">
        <h2>Logout</h2>
        </button>
    </form>
</body>

</html>