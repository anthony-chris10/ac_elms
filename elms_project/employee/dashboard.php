<?php
session_start();
include('../config.php');
if (!isset($_SESSION['employee'])) {
    header("Location: employee_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            display: flex;
            margin: 0;
        }
        .sidebar {
            width: 250px;
            background: #333;
            color: #fff;
            height: 100vh;
            position: fixed;
        }
        .sidebar h2 {
            text-align: center;
            margin: 0;
            padding: 15px 0;
            background: #444;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .sidebar ul li {
            padding: 15px;
            text-align: center;
        }
        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
        }
        .sidebar ul li a:hover {
            background: #555;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }
        #content-area {
            padding: 20px;
            background: #f4f4f4;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Employee Dashboard</h2>
        <ul>
            <li><a href="#" class="nav-link" data-page="view_work.php">View Work</a></li>
            <li><a href="#" class="nav-link" data-page="apply_leave.php">Apply Leave</a></li>
            <li><a href="#" class="nav-link" data-page="leave_status.php">Leave Status</a></li>
            <li><a href="#" class="nav-link" data-page="profile.php">Profile</a></li>
            <li><a href="#" class="nav-link" data-page="change_password.php">Change Password</a></li>
            <li><a href="#" class="nav-link" data-page="leave_history.php">Leave History</a></li>
            <li><a href="../logout.php">Sign Out</a></li>
        </ul>
    </div>
    <div class="content">
        <div id="content-area">
            <!-- Dynamic content will be loaded here -->
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.nav-link').click(function(e) {
                e.preventDefault();
                var page = $(this).data('page');
                $('#content-area').load(page);
            });

            // Load default page
            $('#content-area').load('view_work.php');
        });
    </script>
</body>
</html>