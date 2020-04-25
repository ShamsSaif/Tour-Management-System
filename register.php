<?php
include 'db_connection.php';

$conn = OpenCon();

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $priv = $_POST['priv'];

    $sql = "INSERT INTO {$priv} (email, fname, pass, stat) VALUES ('$email', '$name', '$pass', 'Active')";

    if ($conn->query($sql) === TRUE) {
        header('Location: admin.php');
    }
    else {
        echo "Error creating table: " . $conn->error;
    }
    // header('Location: admin.php');
}

CloseCon($conn);
?>

<!DOCTYPE html>

<body>
    <h2>Add an Admin or Assistant</h2>
    <form method="post">

        <div class="container">
            <select name="priv">
                <option value="Admins">Admin</option>
                <option value="Assistants">Assistant</option>
            </select>
            <label><b>NAME:</b></label>
            <input type="text" placeholder="Enter name" name="name" required>

            <label><b>EMAIL:</b></label>
            <input type="text" placeholder="Enter email" name="email" required>

            <label>PASSWORD:</b></label>
            <input type="password" placeholder="Enter password" required>

            <label>CONFIRM PASSWORD:</b></label>
            <input type="password" placeholder="Enter password again" name="pass" required>

            <button type="submit" value="register" name="register">Register</button>
        </div>


    </form>
</body>

</html>