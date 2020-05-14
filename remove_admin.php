<?php
session_start();

include 'createTables.php';
createTables();
$conn = OpenCon();

if(isset($_GET['ast_id'])) {
	$ast_id = $_GET['ast_id'];

	$sql = "DELETE FROM assistants WHERE ast_id = ". $ast_id;
    $result = $conn->query($sql);
	
	header("Location: admin.php");
    die();
}

CloseCon($conn);
?>
