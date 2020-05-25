<?php
session_start();

include 'createTables.php';
createTables();
$conn = OpenCon();

if(isset($_POST['tname'])) {
	$tname        = $_POST['tname'];
	$locationName = $_POST['locationName'];
	$category     = $_POST['category'];
	
	$sql = "INSERT INTO tours(tname, locs, category) VALUES('".$tname ."', '".$locationName."', '".$category."') ";
	
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
    <h2>add new Tour: </h2>
    <form method="post" action="add_tour.php">
         
		 <table>
		     <tr>
			    <td> Tour Name:  </td>
				<td> 
				    <input type="text" name="tname" value="">
			    </td>
			 </tr>
		     <tr>
			    <td> Location Name:  </td>
				<td> 
				    <input type="text" name="locationName" value="">
			    </td>
			 </tr>
		     <tr>
			    <td> Category:  </td>
				<td> 
				    <input type="text" name="category" value="">
			    </td>
			 </tr>
			 <tr style="height: 50px;">
			   <td></td><td></td>
			 </tr>
			 <tr>
			     <td></td><td><input type="submit" value="Save"></td>
			 </tr>
		 
		 </table>


    </form>
</body>

</html>