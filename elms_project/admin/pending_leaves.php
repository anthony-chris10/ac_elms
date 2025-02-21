<?php
session_start();
include('../config.php');
if(!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

if(isset($_GET['action']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    if($_GET['action'] == 'approve') {
        $status = 'Approved';
    } else if($_GET['action'] == 'not_approve') {
        $status = 'Not Approved';
    }
    $query = "UPDATE tblleaves SET Status='$status' WHERE id='$id'";
    if(mysqli_query($conn, $query)) {
        echo "<script>alert('Leave status updated successfully');</script>";
    } else {
        echo "<script>alert('Failed to update leave status');</script>";
    }
}

$pendingLeaves = mysqli_query($conn, "SELECT * FROM tblleaves WHERE Status='Pending'");
?>

   
        <h2>Pending Leaves</h2>
        <table>
            <tr>
                <th>Leave ID</th>
                <th>Employee ID</th>
                <th>Leave Type</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($pendingLeaves)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['EmpId']; ?></td>
                <td><?php echo $row['LeaveType']; ?></td>
                <td><?php echo $row['FromDate']; ?></td>
                <td><?php echo $row['ToDate']; ?></td>
                <td><?php echo $row['Description']; ?></td>
                <td><?php echo $row['Status']; ?></td>
                <td>
                    <a href="pending_leave.php?action=approve&id=<?php echo $row['id']; ?>">Approve</a>
                    <a href="pending_leave.php?action=not_approve&id=<?php echo $row['id']; ?>">Not Approve</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    
