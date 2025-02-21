<?php
session_start();
include('../config.php');
if(!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

if(isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $query = "DELETE FROM tblleavetype WHERE id='$id'";
    mysqli_query($conn, $query);
    header("Location: manage_leave_type.php");
}

if(isset($_POST['update_leave_type'])) {
    $id = $_POST['id'];
    $leaveType = $_POST['leave_type'];
    $description = $_POST['description'];
    
    $query = "UPDATE tblleavetype SET LeaveType='$leaveType', Description='$description' WHERE id='$id'";
    mysqli_query($conn, $query);
    header("Location: manage_leave_type.php");
}

$leaveTypes = mysqli_query($conn, "SELECT * FROM tblleavetype");
?>

    
        <h2>Manage Leave Types</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Leave Type</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($leaveTypes)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['LeaveType']; ?></td>
                <td><?php echo $row['Description']; ?></td>
                <td>
                    <a href="manage_leave_type.php?delete_id=<?php echo $row['id']; ?>">Delete</a>
                    <a href="manage_leave_type.php?edit_id=<?php echo $row['id']; ?>">Edit</a>
                </td>
            </tr>
            <?php } ?>
        </table>
        <?php if(isset($_GET['edit_id'])) {
            $id = $_GET['edit_id'];
            $leaveType = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tblleavetype WHERE id='$id'"));
        ?>
        <h3>Edit Leave Type</h3>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $leaveType['id']; ?>">
            <div class="input-group">
                <input type="text" name="leave_type" value="<?php echo $leaveType['LeaveType']; ?>" required>
                <label>Leave Type</label>
            </div>
            <div class="input-group">
                <input type="text" name="description" value="<?php echo $leaveType['Description']; ?>" required>
                <label>Description</label>
            </div>
            <button type="submit" name="update_leave_type" class="button">Update Leave Type</button>
        </form>
        <?php } ?>
   
