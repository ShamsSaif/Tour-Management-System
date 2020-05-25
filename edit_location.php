<?php
session_start();

include 'createTables.php';
createTables();
$conn = OpenCon();

if(isset($_POST['locationName'])) {
	$locationId = $_POST['locationId'];
	$sql = "UPDATE Tours SET locs='".$_POST['locationName']."', category = '".$_POST['category']."', tname='".$_POST['tname']."' WHERE t_id = ". $locationId;
	
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
			$tname = $row['tname'];
			$category = $row['category'];
		}

	} 
}

CloseCon($conn);
?>



<!DOCTYPE html>

<body style="padding-left:500px;">
    <h2>Edit Tour: </h2>
    <form method="post" action="edit_location.php">
         
		 <table>
		     <tr>
			    <td> Tour Name:  </td>
				<td> 
				    <input type="text" name="tname" value="<?php echo $tname; ?>">
			    </td>
			 </tr>
		     <tr>
			    <td> Location Name:  </td>
				<td> 
				    <input type="hidden" name="locationId" value="<?php echo $locationId; ?>">
				    <input type="text" name="locationName" value="<?php echo $location; ?>">
			    </td>
			 </tr>
		     <tr>
			    <td> Category:  </td>
				<td> 
				    <input type="text" name="category" value="<?php echo $category; ?>">
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
