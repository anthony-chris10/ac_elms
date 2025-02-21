<?php
session_start();
include('../config.php');
if(!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

if(isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $query = "DELETE FROM tblemployees WHERE id='$id'";
    mysqli_query($conn, $query);
    header("Location: manage_employee.php");
}

if(isset($_POST['update_status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
    
    $query = "UPDATE tblemployees SET Status='$status' WHERE id='$id'";
    mysqli_query($conn, $query);
    header("Location: manage_employee.php");
}

$employees = mysqli_query($conn, "SELECT * FROM tblemployees");
?>

   <h2>Manage Employees</h2>
<table>
    <tr>
        <th>Emp ID</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>DOB</th>
        <th>Department</th>
        <th>Address</th>
        <th>City</th>
        <th>Country</th>
        <th>Phone Number</th>
        <th>Status</th>
        <th>Registered Date</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($employees)) { ?>
        <tr>
            <td><?php echo $row['EmpId']; ?></td>
            <td><?php echo $row['FirstName'] . ' ' . $row['LastName']; ?></td>
            <td><?php echo $row['EmailId']; ?></td>
            <td><?php echo $row['Gender']; ?></td>
            <td><?php echo $row['Dob']; ?></td>
            <td><?php echo $row['Department']; ?></td>
            <td><?php echo $row['Address']; ?></td>
            <td><?php echo $row['City']; ?></td>
            <td><?php echo $row['Country']; ?></td>
            <td><?php echo $row['Phonenumber']; ?></td>
            <td><?php echo $row['Status'] == 1 ? 'Active' : 'Inactive'; ?></td>
            <td><?php echo $row['RegDate']; ?></td>
            <td>
                <a href="update_employee.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="manage_employee.php?delete_id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this employee?');">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>