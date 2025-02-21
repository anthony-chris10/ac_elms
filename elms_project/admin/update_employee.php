<?php
session_start();
include('../config.php');
if(!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $employee = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tblemployees WHERE id='$id'"));

    if(!$employee) {
        echo "<script>alert('Employee not found');</script>";
        header("Location: manage_employee.php");
        exit();
    }
}

if(isset($_POST['update_employee'])) {
    $id = $_POST['id'];
    $empId = $_POST['emp_id'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $department = $_POST['department'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $phoneNumber = $_POST['phone_number'];
    $status = $_POST['status'];
    
    $query = "UPDATE tblemployees SET EmpId='$empId', FirstName='$firstName', LastName='$lastName', EmailId='$email', Gender='$gender', Dob='$dob', Department='$department', Address='$address', City='$city', Country='$country', Phonenumber='$phoneNumber', Status='$status' WHERE id='$id'";
    if(mysqli_query($conn, $query)) {
        echo "<script>alert('Employee updated successfully');</script>";
        header("Location: manage_employee.php");
        exit();
    } else {
        echo "<script>alert('Failed to update employee');</script>";
    }
}

$departments = mysqli_query($conn, "SELECT * FROM tbldepartments");
?>

    
        <h2>Update Employee</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">
            <div class="input-group">
                <input type="text" name="emp_id" value="<?php echo $employee['EmpId']; ?>" required>
                <label>Employee ID</label>
            </div>
            <div class="input-group">
                <input type="text" name="first_name" value="<?php echo $employee['FirstName']; ?>" required>
                <label>First Name</label>
            </div>
            <div class="input-group">
                <input type="text" name="last_name" value="<?php echo $employee['LastName']; ?>" required>
                <label>Last Name</label>
            </div>
            <div class="input-group">
                <input type="email" name="email" value="<?php echo $employee['EmailId']; ?>" required>
                <label>Email</label>
            </div>
            <div class="input-group">
                <input type="text" name="gender" value="<?php echo $employee['Gender']; ?>" required>
                <label>Gender</label>
            </div>
            <div class="input-group">
                <input type="date" name="dob" value="<?php echo $employee['Dob']; ?>" required>
                <label>Date of Birth</label>
            </div>
            <div class="input-group">
                <select name="department" required>
                    <option value="">Select Department</option>
                    <?php while($row = mysqli_fetch_assoc($departments)) { ?>
                    <option value="<?php echo $row['DepartmentName']; ?>" <?php echo ($row['DepartmentName'] == $employee['Department']) ? 'selected' : ''; ?>><?php echo $row['DepartmentName']; ?></option>
                    <?php } ?>
                </select>
                <label>Department</label>
            </div>
            <div class="input-group">
                <input type="text" name="address" value="<?php echo $employee['Address']; ?>" required>
                <label>Address</label>
            </div>
            <div class="input-group">
                <input type="text" name="city" value="<?php echo $employee['City']; ?>" required>
                <label>City</label>
            </div>
            <div class="input-group">
                <input type="text" name="country" value="<?php echo $employee['Country']; ?>" required>
                <label>Country</label>
            </div>
            <div class="input-group">
                <input type="text" name="phone_number" value="<?php echo $employee['Phonenumber']; ?>" required>
                <label>Phone Number</label>
            </div>
            <div class="input-group">
                <input type="text" name="status" value="<?php echo $employee['Status']; ?>" required>
                <label>Status</label>
            </div>
            <button type="submit" name="update_employee" class="button">Update Employee</button>
        </form>
   
