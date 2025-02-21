<?php
session_start();
include('../config.php');
if(!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

if(isset($_POST['add_employee'])) {
    $empId = $_POST['emp_id'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $department = $_POST['department'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $phoneNumber = $_POST['phone_number'];
    $status = $_POST['status'];
    
    $query = "INSERT INTO tblemployees (EmpId, FirstName, LastName, EmailId, Password, Gender, Dob, Department, Address, City, Country, Phonenumber, Status) VALUES ('$empId', '$firstName', '$lastName', '$email', '$password', '$gender', '$dob', '$department', '$address', '$city', '$country', '$phoneNumber', '$status')";
    if(mysqli_query($conn, $query)) {
        echo "<script>alert('Employee added successfully');</script>";
    } else {
        echo "<script>alert('Failed to add employee');</script>";
    }
}

$departments = mysqli_query($conn, "SELECT * FROM tbldepartments");
?>

    <h2>Add Employee</h2>
<form method="POST">
    <div class="input-group">
        <input type="text" name="emp_id" required>
        <label>Employee ID</label>
    </div>
    <div class="input-group">
        <input type="text" name="first_name" required>
        <label>First Name</label>
    </div>
    <div class="input-group">
        <input type="text" name="last_name" required>
        <label>Last Name</label>
    </div>
    <div class="input-group">
        <input type="email" name="email" required>
        <label>Email</label>
    </div>
    <div class="input-group">
        <input type="password" name="password" required>
        <label>Password</label>
    </div>
    <div class="input-group">
        <input type="text" name="gender" required>
        <label>Gender</label>
    </div>
    <div class="input-group">
        <input type="text" name="dob" required>
        <label>Date of Birth</label>
    </div>
    <div class="input-group">
        <select name="department" required>
            <option value="">Select Department</option>
            <?php while ($row = mysqli_fetch_assoc($departments)) { ?>
                <option value="<?php echo $row['DepartmentName']; ?>"><?php echo $row['DepartmentName']; ?></option>
            <?php } ?>
        </select>
        <label>Department</label>
    </div>
    <div class="input-group">
        <input type="text" name="address" required>
        <label>Address</label>
    </div>
    <div class="input-group">
        <input type="text" name="city" required>
        <label>City</label>
    </div>
    <div class="input-group">
        <input type="text" name="country" required>
        <label>Country</label>
    </div>
    <div class="input-group">
        <input type="text" name="phone_number" required>
        <label>Phone Number</label>
    </div>
    <div class="input-group">
        <input type="text" name="status" required>
        <label>Status</label>
    </div>
    <button type="submit" name="add_employee" class="button">Add Employee</button>
</form>