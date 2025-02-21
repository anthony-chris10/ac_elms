<?php
session_start();
include('../config.php');
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

if (isset($_POST['change_password'])) {
    $currentPassword = md5($_POST['current_password']);
    $newPassword = md5($_POST['new_password']);
    $confirmPassword = md5($_POST['confirm_password']);

    $admin = $_SESSION['admin'];
    $query = "SELECT Password FROM tbladmin WHERE UserName='$admin'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($currentPassword == $row['Password']) {
        if ($newPassword == $confirmPassword) {
            $updateQuery = "UPDATE tbladmin SET Password='$newPassword' WHERE UserName='$admin'";
            mysqli_query($conn, $updateQuery);
            echo "<script>alert('Password changed successfully');</script>";
        } else {
            echo "<script>alert('New Password and Confirm Password do not match');</script>";
        }
    } else {
        echo "<script>alert('Current Password is incorrect');</script>";
    }
}
?>

<h2>Change Password</h2>
<form method="POST">
    <div class="input-group">
        <input type="password" name="current_password" required>
        <label>Current Password</label>
    </div>
    <div class="input-group">
        <input type="password" name="new_password" required>
        <label>New Password</label>
    </div>
    <div class="input-group">
        <input type="password" name="confirm_password" required>
        <label>Confirm Password</label>
    </div>
    <button type="submit" name="change_password" class="button">Change Password</button>
</form>