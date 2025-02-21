<?php
session_start();
include('../config.php');

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

if (isset($_POST['assign_work'])) {
    $empid = $_POST['empid'];
    $firstname = $_POST['firstname'];
    $work = $_POST['work'];
    $description = $_POST['description'];
    $deadline = $_POST['deadline'];
    $status = 'Pending';  // Default status
    $assigned_date = date('Y-m-d H:i:s');  // Current date and time

    $query = "INSERT INTO tblwork (empid, firstname, work, description, deadline, status, assigned_date) VALUES ('$empid', '$firstname', '$work', '$description', '$deadline', '$status', '$assigned_date')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Work assigned successfully');</script>";
    } else {
        echo "<script>alert('Error assigning work');</script>";
    }
}
?>

<h2>Assign Work</h2>
<form method="POST">
    <div class="input-group">
        <input type="text" name="empid" required>
        <label>Employee ID</label>
    </div>
    <div class="input-group">
        <input type="text" name="firstname" required>
        <label>First Name</label>
    </div>
    <div class="input-group">
        <input type="text" name="work" required>
        <label>Work</label>
    </div>
    <div class="input-group">
        <textarea name="description" required></textarea>
        <label>Description</label>
    </div>
    <div class="input-group">
        <input type="date" name="deadline" required>
        <label>Deadline</label>
    </div>
    <button type="submit" name="assign_work" class="button">Assign Work</button>
</form>
