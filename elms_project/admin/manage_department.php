<?php
session_start();
include('../config.php');
if(!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

if(isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $query = "DELETE FROM tbldepartments WHERE id='$id'";
    mysqli_query($conn, $query);
    header("Location: manage_department.php");
}

if(isset($_POST['update_department'])) {
    $id = $_POST['id'];
    $departmentName = $_POST['department_name'];
    $departmentShortName = $_POST['department_short_name'];
    $departmentCode = $_POST['department_code'];
    
    $query = "UPDATE tbldepartments SET DepartmentName='$departmentName', DepartmentShortName='$departmentShortName', DepartmentCode='$departmentCode' WHERE id='$id'";
    mysqli_query($conn, $query);
    header("Location: manage_department.php");
}

$departments = mysqli_query($conn, "SELECT * FROM tbldepartments");
?>

        <h2>Manage Departments</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Department Name</th>
                <th>Department Short Name</th>
                <th>Department Code</th>
                <th>Actions</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($departments)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['DepartmentName']; ?></td>
                <td><?php echo $row['DepartmentShortName']; ?></td>
                <td><?php echo $row['DepartmentCode']; ?></td>
                <td>
                    <a href="manage_department.php?delete_id=<?php echo $row['id']; ?>">Delete</a>
                    <a href="manage_department.php?edit_id=<?php echo $row['id']; ?>">Edit</a>
                </td>
            </tr>
            <?php } ?>
        </table>
        <?php if(isset($_GET['edit_id'])) {
            $id = $_GET['edit_id'];
            $department = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tbldepartments WHERE id='$id'"));
        ?>
        <h3>Edit Department</h3>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $department['id']; ?>">
            <div class="input-group">
                <input type="text" name="department_name" value="<?php echo $department['DepartmentName']; ?>" required>
                <label>Department Name</label>
            </div>
            <div class="input-group">
                <input type="text" name="department_short_name" value="<?php echo $department['DepartmentShortName']; ?>" required>
                <label>Department Short Name</label>
            </div>
            <div class="input-group">
                <input type="text" name="department_code" value="<?php echo $department['DepartmentCode']; ?>" required>
                <label>Department Code</label>
            </div>
            <button type="submit" name="update_department" class="button">Update Department</button>
        </form>
        <?php } ?>
   
