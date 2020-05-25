<?php
session_start();

include 'createTables.php';
createTables();
$conn = OpenCon();

if(isset($_POST['lname'])) {
	$locs_id = $_POST['locs_id'];
	$sql = "UPDATE locations SET lname='".$_POST['lname']."', coord ='".$_POST['coord']."' WHERE locs_id = ". $locs_id;
	
    $result = $conn->query($sql);
	
	header("Location: admin.php");
    die();
}


if( isset( $_GET['locs_id'])){
	 $locs_id = $_GET['locs_id'];
     $sql = "SELECT * FROM locations WHERE locs_id = ". $_GET['locs_id'];
     $result = $conn->query($sql);
     if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
            $lname = $row['lname'];
			$coord = $row['coord'];
		}

	} 
}

CloseCon($conn);
?>



<!DOCTYPE html>

<body style="padding-left:500px;">
    <h2>From Edit Location: </h2>
    <form method="post" action="edit_locations.php">
         
		 <table>
		     <tr>
			    <td> Location Name:  </td>
				<td> 
				    <input type="hidden" name="locs_id" value="<?php echo $locs_id; ?>">
				    <input type="text" name="lname" value="<?php echo $lname; ?>">
			    </td>
			 </tr>
		     <tr>
			    <td> Location Name:  </td>
				<td> 
				    <input type="hidden" name="locs_id" value="<?php echo $locs_id; ?>">
				    <input type="text" name="coord" value="<?php echo $coord; ?>">
			    </td>
			 </tr>
			 <tr style="height: 50px;">
			   <td></td><td></td>
			 </tr>
			 <tr>
			     <td></td><td><input type="submit" value="Update"></td>
			 </tr>
		 
		 </table>


    </form>
</body>

</html>