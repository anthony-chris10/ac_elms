<?php
session_start();
include('../config.php');
if (!isset($_SESSION['employee'])) {
    header("Location: ../employee_login.php");
    exit();
}

$empId = $_SESSION['employee'];
$leaveStatus = mysqli_query($conn, "SELECT * FROM tblleaves WHERE EmpId='$empId'");
?>

<h2>Leave Status</h2>
<table>
    <tr>
        <th>Leave ID</th>
        <th>Leave Type</th>
        <th>From Date</th>
        <th>To Date</th>
        <th>Description</th>
        <th>Status</th>
        <th>Applied Date</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($leaveStatus)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['LeaveType']; ?></td>
            <td><?php echo $row['FromDate']; ?></td>
            <td><?php echo $row['ToDate']; ?></td>
            <td><?php echo $row['Description']; ?></td>
            <td><?php echo $row['Status']; ?></td>
            <td><?php echo $row['AppliedDate']; ?></td>
        </tr>
    <?php } ?>
</table>