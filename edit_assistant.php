<?php
include 'db_connection.php';

$conn = OpenCon();

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $ast_id = $_POST['ast_id'];

    $sql = "UPDATE assistants SET  email = '".$email."', fname = '".$name."', pass= '".$name."' WHERE ast_id = " . $ast_id;

    if ($conn->query($sql) === TRUE) {
        header('Location: admin.php');
    }
    else {
        echo "Error updating table: " . $conn->error;
    }
    // header('Location: admin.php');
}

if(isset($_GET['ast_id'])){
	 $ast_id = $_GET['ast_id'];
	
	 $sql = "SELECT * FROM assistants WHERE ast_id = ". $ast_id;
     $result = $conn->query($sql);
     if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
            $email = $row['email'];
			$fname = $row['fname'];
			$pass = $row['pass'];
		}

	}
	
}

CloseCon($conn);
?>

<!DOCTYPE html>

<body>
    <h2>Edit Assistant</h2>
    <form method="post">

        <div class="container">
           
            <label><b>NAME:</b></label>
			<input type="hidden" name="ast_id" value="<?php echo $ast_id; ?>">
            <input type="text" placeholder="Enter name" name="name" required  value="<?php echo $fname; ?>">

            <label><b>EMAIL:</b></label>
            <input type="text" placeholder="Enter email" name="email" required  value="<?php echo $email; ?>">

            <label>PASSWORD:</b></label>
            <input type="password" placeholder="Enter password" required  value="<?php echo $pass; ?>">

            <label>CONFIRM PASSWORD:</b></label>
            <input type="password" placeholder="Enter password again" name="pass" required  value="<?php echo $pass; ?>">

            <button type="submit" value="register" name="register">Register</button>
        </div>


    </form>
</body>

</html>