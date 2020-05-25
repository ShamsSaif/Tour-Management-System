<?php
session_start();

include 'createTables.php';
createTables();
$conn = OpenCon();

if(isset($_GET['locs_id'])) {
	$locs_id = $_GET['locs_id'];

	$sql = "DELETE FROM locations WHERE locs_id = ". $locs_id;
    $result = $conn->query($sql);
	
	header("Location: admin.php");
    die();
}

CloseCon($conn);
?>
