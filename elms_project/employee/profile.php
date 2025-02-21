<?php
session_start();
include('../config.php');
if (!isset($_SESSION['employee'])) {
    header("Location: ../employee_login.php");
    exit();
}

$employee = $_SESSION['employee'];
$query = "SELECT * FROM tblemployees WHERE EmpId='$employee'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<h2>Profile</h2>
<table>
    <tr>
        <th>Employee ID</th>
        <td><?php echo $row['EmpId']; ?></td>
    </tr>
    <tr>
        <th>Full Name</th>
        <td><?php echo $row['FirstName'] . ' ' . $row['LastName']; ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?php echo $row['EmailId']; ?></td>
    </tr>
    <tr>
        <th>Gender</th>
        <td><?php echo $row['Gender']; ?></td>
    </tr>
    <tr>
        <th>Date of Birth</th>
        <td><?php echo $row['Dob']; ?></td>
    </tr>
    <tr>
        <th>Department</th>
        <td><?php echo $row['Department']; ?></td>
    </tr>
    <tr>
        <th>Address</th>
        <td><?php echo $row['Address']; ?></td>
    </tr>
    <tr>
        <th>City</th>
        <td><?php echo $row['City']; ?></td>
    </tr>
    <tr>
        <th>Country</th>
        <td><?php echo $row['Country']; ?></td>
    </tr>
    <tr>
        <th>Phone Number</th>
        <td><?php echo $row['Phonenumber']; ?></td>
    </tr>
    <tr>
        <th>Status</th>
        <td><?php echo $row['Status'] == 1 ? 'Active' : 'Inactive'; ?></td>
    </tr>
    <tr>
        <th>Registered Date</th>
        <td><?php echo $row['RegDate']; ?></td>
    </tr>
</table>