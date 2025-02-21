<?php
session_start();
include('../config.php');
if (!isset($_SESSION['employee'])) {
    header("Location: ../employee_login.php");
    exit();
}

$empId = $_SESSION['employee'];
$query = "SELECT * FROM tblleaves WHERE EmpId='$empId'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leave History</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Leave History</h2>
        <table>
            <tr>
                <th>Leave ID</th>
                <th>Leave Type</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>Description</th>
                <th>Status</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['LeaveType']; ?></td>
                <td><?php echo $row['FromDate']; ?></td>
                <td><?php echo $row['ToDate']; ?></td>
                <td><?php echo $row['Description']; ?></td>
                <td><?php echo $row['Status']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>