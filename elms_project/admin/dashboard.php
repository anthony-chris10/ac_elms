<?php
session_start();
if (!isset($_SESSION['admin_loggedin'])) {
    header('Location: admin_login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            display: flex;
        }
        .navbar {
            width: 200px;
            height: 100vh;
            position: fixed;
            background-color: #333;
            color: white;
            padding: 20px;
        }
        .navbar a {
            display: block;
            color: white;
            text-decoration: none;
            margin: 10px 0;
        }
        .content {
            margin-left: 220px;
            padding: 20px;
            width: 100%;
        }
        .navbar a:hover {
            background-color: #575757;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h2>Admin Panel</h2>
        <a href="#" onclick="loadContent('add_employee.php')">Add Employee</a>
        <a href="#" onclick="loadContent('manage_employee.php')">Manage Employees</a>
        <a href="#" onclick="loadContent('add_department.php')">Add Department</a>
        <a href="#" onclick="loadContent('manage_department.php')">Manage Departments</a>
        <a href="#" onclick="loadContent('add_leave_type.php')">Add Leave Type</a>
        <a href="#" onclick="loadContent('manage_leave_type.php')">Manage Leave Types</a>
        <a href="#" onclick="loadContent('pending_leaves.php')">Pending Leaves</a>
        <a href="#" onclick="loadContent('approved_leaves.php')">Approved Leaves</a>
        <a href="#" onclick="loadContent('not_approved_leaves.php')">Not Approved Leaves</a>
        <a href="#" onclick="loadContent('assign_work.php')">Assign Work</a>
        <a href="#" onclick="loadContent('work_status.php')">Work Status</a>
        <a href="#" onclick="loadContent('change_password.php')">Change Password</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="content" id="content">
        <h1>Welcome to the Admin Dashboard</h1>
        <p>Select an option from the menu to get started.</p>
    </div>

    <script>
        function loadContent(page) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', page, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById('content').innerHTML = xhr.responseText;
                } else {
                    document.getElementById('content').innerHTML = '<p>Failed to load content.</p>';
                }
            };
            xhr.send();
        }
    </script>
</body>
</html>