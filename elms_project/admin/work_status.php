<?php
session_start();
include('../config.php');
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

$workStatus = mysqli_query($conn, "SELECT * FROM tblwork");
?>

<h2>Work Status</h2>
<table>
    <tr>
        <th>Work ID</th>
        <th>Employee ID</th>
        <th>First Name</th>
        <th>Work</th>
        <th>Description</th>
        <th>Deadline</th>
        <th>Status</th>
        <th>Assigned Date</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($workStatus)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['empid']; ?></td>
            <td><?php echo $row['firstname']; ?></td>
            <td><?php echo $row['work']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['deadline']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['assigned_date']; ?></td>
        </tr>
    <?php } ?>
</table>