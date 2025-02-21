<?php
session_start();
if(isset($_SESSION['employee'])) {
    header("Location: employee/dashboard.php");
    exit();
} elseif(isset($_SESSION['admin'])) {
    header("Location: admin/dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Welcome to Employee Management System</h2>
        <div class="login-links">
            <a href="admin/admin_login.php" class="button">Admin Login</a>
            <a href="employee/employee_login.php" class="button">Employee Login</a>
        </div>
    </div>
</body>
</html>