<?php
session_start();
include('../config.php');
if(!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

if(isset($_POST['add_department'])) {
    $departmentName = $_POST['department_name'];
    $departmentShortName = $_POST['department_short_name'];
    $departmentCode = $_POST['department_code'];
    
    $query = "INSERT INTO tbldepartments (DepartmentName, DepartmentShortName, DepartmentCode) VALUES ('$departmentName', '$departmentShortName', '$departmentCode')";
    if(mysqli_query($conn, $query)) {
        echo "<script>alert('Department added successfully');</script>";
    } else {
        echo "<script>alert('Failed to add department');</script>";
    }
}
?>

    <h2>Add Department</h2>
<form method="POST">
    <div class="input-group">
        <input type="text" name="department_name" required>
        <label>Department Name</label>
    </div>
    <div class="input-group">
        <input type="text" name="department_short_name" required>
        <label>Department Short Name</label>
    </div>
    <div class="input-group">
        <input type="text" name="department_code" required>
        <label>Department Code</label>
    </div>
    <button type="submit" name="add_department" class="button">Add Department</button>
</form>
