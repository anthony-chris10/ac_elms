<?php
session_start();
include('../config.php');
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = "SELECT * FROM admin WHERE UserName='$username' AND Password='$password'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0) {
        $_SESSION['admin'] = $username;
        header("Location: admin/dashboard.php");
    } else {
        echo "<script>alert('Invalid Username or Password');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form method="POST">
            <div class="input-group">
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
            <div class="input-group">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <button type="submit" name="login" class="button">Login</button>
        </form>
    </div>
    <script src="../js/script.js"></script>
</body>
</html>
