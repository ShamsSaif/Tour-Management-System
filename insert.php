<?php
$connection = mysqli_connect("localhost", "root", ""); // Establishing Connection with Server




if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL

$id = $_POST['LocationID'];
$name = $_POST['LocationName'];
$description = $_POST['Description'];


if($id !=''||$name !='' ||$description !='')    {
	
	
//Insert Query of SQL

$query = mysql_query("INSERT INTO locations (LocationID, LocationName, Description) values ('$id', '$name','$description')");
			
echo "<br/><br/><span>Data Inserted successfully...!!</span>";
}
else{
echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
}
}
mysql_close($connection); // Closing Connection with Server


?>