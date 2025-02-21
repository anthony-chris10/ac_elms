<?php
session_start();
include('../config.php');
if (!isset($_SESSION['employee'])) {
    header("Location: ../employee_login.php");
    exit();
}

if (isset($_POST['update_status'])) {
    $workId = $_POST['work_id'];
    $status = $_POST['status'];

    $query = "UPDATE tblwork SET status='$status' WHERE id='$workId'";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Status updated successfully');</script>";
    } else {
        echo "<script>alert('Failed to update status');</script>";
    }
}

$empId = $_SESSION['employee'];
$workStatus = mysqli_query($conn, "SELECT * FROM tblwork WHERE empid='$empId'");
?>

<h2>View Work</h2>
<table>
    <tr>
        <th>Work ID</th>
        <th>Work</th>
        <th>Description</th>
        <th>Deadline</th>
        <th>Status</th>
        <th>Assigned Date</th>
        <th>Action</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($workStatus)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['work']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['deadline']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['assigned_date']; ?></td>
            <td>
                <form method="POST">
                    <input type="hidden" name="work_id" value="<?php echo $row['id']; ?>">
                    <select name="status" required>
                        <option value="Pending" <?php if ($row['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                        <option value="Finished" <?php if ($row['status'] == 'Finished') echo 'selected'; ?>>Finished</option>
                    </select>
                    <button type="submit" name="update_status">Update</button>
                </form>
            </td>
        </tr>
    <?php } ?>
</table>