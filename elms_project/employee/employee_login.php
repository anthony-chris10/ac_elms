<?php
session_start();
include('../config.php');
if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $query = "SELECT * FROM tblemployees WHERE EmailId='$email' AND Password='$password'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0) {
        $_SESSION['employee'] = $email;
        header("Location: employee/dashboard.php");
    } else {
        echo "<script>alert('Invalid Email or Password');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Employee Login</h2>
        <form method="POST">
            <div class="input-group">
                <input type="email" name="email" required>
                <label>Email</label>
            </div>
            <div class="input-group">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <button type="submit" name="login" class="button">Login</button>
        </form>
    </div>
</body>
</html>