<?php
session_start();

include 'createTables.php';
createTables();
$conn = OpenCon();

if(isset($_POST['locationName'])) {
	$locationId = $_POST['locationId'];
	$sql = "UPDATE Tours SET locs='".$_POST['locationName']."' WHERE t_id = ". $locationId;
	
    $result = $conn->query($sql);
	
	header("Location: admin.php");
    die();
}


if( isset( $_GET['t_id'])){
	
     $sql = "SELECT * FROM Tours WHERE t_id = ". $_GET['t_id'];
     $result = $conn->query($sql);
     if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
            $location = $row['locs'];
			$locationId = $row['t_id'];
		}

	} 
}

CloseCon($conn);
?>



<!DOCTYPE html>

<body style="padding-left:500px;">
    <h2>From Edit Location: </h2>
    <form method="post" action="edit_location.php">
         
		 <table>
		     <tr>
			    <td> Location Name:  </td>
				<td> 
				    <input type="hidden" name="locationId" value="<?php echo $locationId; ?>">
				    <input type="text" name="locationName" value="<?php echo $location; ?>">
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