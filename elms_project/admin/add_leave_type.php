<?php
session_start();
include('../config.php');
if(!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

if(isset($_POST['add_leave_type'])) {
    $leaveType = $_POST['leave_type'];
    $description = $_POST['description'];
    
    $query = "INSERT INTO tblleavetype (LeaveType, Description) VALUES ('$leaveType', '$description')";
    if(mysqli_query($conn, $query)) {
        echo "<script>alert('Leave type added successfully');</script>";
    } else {
        echo "<script>alert('Failed to add leave type');</script>";
    }
}
?>

    
        <h2>Add Leave Type</h2>
        <form method="POST">
            <div class="input-group">
                <input type="text" name="leave_type" required>
                <label>Leave Type</label>
            </div>
            <div class="input-group">
                <input type="text" name="description" required>
                <label>Description</label>
            </div>
            <button type="submit" name="add_leave_type" class="button">Add Leave Type</button>
        </form>
    