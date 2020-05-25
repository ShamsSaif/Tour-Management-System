<?php
session_start();

include 'createTables.php';
createTables();
$conn = OpenCon();

if(isset($_GET['t_id'])) {
	$t_id = $_GET['t_id'];

	$sql = "DELETE FROM tours WHERE t_id = ". $t_id;
    $result = $conn->query($sql);
	
	header("Location: admin.php");
    die();
}

CloseCon($conn);
?>
