<?php
session_start();
include('../config.php');
if(!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

$approvedLeaves = mysqli_query($conn, "SELECT * FROM tblleaves WHERE Status='Approved'");
?>

    
        <h2>Approved Leaves</h2>
        <table>
            <tr>
                <th>Leave ID</th>
                <th>Employee ID</th>
                <th>Leave Type</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>Description</th>
                <th>Status</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($approvedLeaves)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['EmpId']; ?></td>
                <td><?php echo $row['LeaveType']; ?></td>
                <td><?php echo $row['FromDate']; ?></td>
                <td><?php echo $row['ToDate']; ?></td>
                <td><?php echo $row['Description']; ?></td>
                <td><?php echo $row['Status']; ?></td>
            </tr>
            <?php } ?>
        </table>
   
