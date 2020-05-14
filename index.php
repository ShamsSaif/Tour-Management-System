<?php
session_start();

include 'createTables.php';
createTables();
$conn = OpenCon();



if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $priv = $_POST['priv'];
    $sql = "SELECT email FROM {$priv} where email='$email'";
    $result = $conn->query($sql);

    if ($result != null) {
        $sql = "SELECT pass FROM {$priv} where email='$email'";
        $result = $conn->query($sql);
        echo $pass;
        $row = mysqli_fetch_row($result);
        $pwd = $row[0];

        if ($pwd == $pass) {

            $sql = "SELECT fname FROM {$priv} where email='$email'";
            $result = $conn->query($sql);
            $row = mysqli_fetch_row($result);
            $_SESSION['name'] = $row[0];

            if ($priv == 'Admins') {
                header('Location: admin.php');
            } else {
                header('Location: assistant.php');
            }
        } else {
            echo "<p>Invalid password</p>";
        }
    } else {
        echo "<p>Email does not exist</p>";
    }
}
CloseCon($conn);
?>



<!DOCTYPE html>

<body style="padding-left:500px;">
    <h2>Login</h2>
    <form method="post">

        <div class="container" >
            <select name="priv">
                <option value="Admins">Admin</option>
                <option value="Assistants">Assistant</option>
            </select>
            <label><b>EMAIL:</b></label>
            <input type="text" placeholder="Enter email" name="email" required>

            <label>PASSWORD:</b></label>
            <input type="password" placeholder="Enter password" name="pass" required>

            <button type="submit" value="login" name="login">Login</button>
        </div>


    </form>
</body>

</html>