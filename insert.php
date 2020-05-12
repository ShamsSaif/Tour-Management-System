<?php
$connection = mysqli_connect("localhost", "root", ""); // Establishing Connection with Server




if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL

$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];


if($id !=''||$name !='' ||$description !='')    {
	
	
//Insert Query of SQL

$query = mysql_query("INSERT INTO locations (id, locationName, description) values ('$id', '$name','$description')");
			
echo "<br/><br/><span>Data Inserted successfully...!!</span>";
}
else{
echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
}
}
mysql_close($connection); // Closing Connection with Server


?>
