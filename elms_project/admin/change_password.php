<?php
session_start();
include('../config.php');
if(!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

if(isset($_POST['change_password'])) {
    $currentPassword = md5($_POST['current_password']);
    $newPassword = md5($_POST['new_password']);
    $confirmPassword = md5($_POST['confirm_password']);
    
    if($newPassword != $confirmPassword) {
        echo "<script>alert('New password and confirm password do not match');</script>";
    } else {
        $admin = $_SESSION['admin'];
        $query = "SELECT * FROM admin WHERE username='$admin' AND password='$currentPassword'";
        $result = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($result) == 1) {
            $query = "UPDATE admin SET password='$newPassword' WHERE username='$admin'";
            if(mysqli_query($conn, $query)) {
                echo "<script>alert('Password changed successfully');</script>";
            } else {
                echo "<script>alert('Failed to change password');</script>";
            }
        } else {
            echo "<script>alert('Current password is incorrect');</script>";
        }
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
   
