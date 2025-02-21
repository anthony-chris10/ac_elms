<?php
session_start();
include('../config.php');
if (!isset($_SESSION['employee'])) {
    header("Location: ../employee_login.php");
    exit();
}

if (isset($_POST['apply_leave'])) {
    $empId = $_SESSION['employee'];
    $leaveType = $_POST['leave_type'];
    $fromDate = $_POST['from_date'];
    $toDate = $_POST['to_date'];
    $description = $_POST['description'];
    $status = 'Pending';

    $query = "INSERT INTO tblleaves (EmpId, LeaveType, FromDate, ToDate, Description, Status) VALUES ('$empId', '$leaveType', '$fromDate', '$toDate', '$description', '$status')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Leave applied successfully');</script>";
    } else {
        echo "<script>alert('Failed to apply for leave');</script>";
    }
}

$leaveTypes = mysqli_query($conn, "SELECT * FROM tblleavetype");
?>

<h2>Apply Leave</h2>
<form method="POST">
    <div class="input-group">
        <select name="leave_type" required>
            <option value="">Select Leave Type</option>
            <?php while($row = mysqli_fetch_assoc($leaveTypes)) { ?>
            <option value="<?php echo $row['LeaveType']; ?>"><?php echo $row['LeaveType']; ?></option>
            <?php } ?>
        </select>
        <label>Leave Type</label>
    </div>
    <div class="input-group">
        <input type="date" name="from_date" required>
        <label>From Date</label>
    </div>
    <div class="input-group">
        <input type="date" name="to_date" required>
        <label>To Date</label>
    </div>
    <div class="input-group">
        <textarea name="description" required></textarea>
        <label>Description</label>
    </div>
    <button type="submit" name="apply_leave" class="button">Apply for Leave</button>
</form>