<?php
require_once 'change_password_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .sidebar {
            width: 200px;
            background-color: #333;
            padding: 20px;
            height: 100vh;
            position: fixed;
            overflow-y: auto;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar a {
            display: block;
            background-color: #1e90ff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .sidebar a:hover {
            background-color: #4169e1;
        }

        .sidebar h2 {
            text-align: center;
            color: #fff;
        }

        .content {
            margin-left: 220px;
            padding: 20px;
            width: calc(100% - 220px);
        }

        h4 {
            color: #007bff;
        }

        form {
            margin-bottom: 20px;
        }

        input, button {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #5cb85c;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #4cae4c;
        }

        .back-button {
            background-color: #f0ad4e;
        }

        .back-button:hover {
            background-color: #ec971f;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h2>Employee</h2>
        <ul>
            <li><a href="add_product_detail.inc.php">Add Product</a></li>
            <li><a href="remove_product_detail.inc.php">Remove Product</a></li>
            <li><a href="update_tracking_info_details.inc.php">Update Tracking Information</a></li>
            <li><a href="show_alerts.inc.php">Check Alerts</a></li>
            <li><a href="update_employee_profile.inc.php">Update Profile</a></li>
            <li><a href="inbox_details.inc.php">Inbox</a></li>
            <li><a href="../user_homepage/profile_settings/logout.inc.php">Log Out</a></li>
        </ul>
    </div>

    <div class="content">
        <h4>Change Password</h4>
        
        <form action="change_password.inc.php" method="post">
            <h4>Enter Current Password:</h4>
            <input type="password" name="current_password" placeholder="Current Password" required>
            <h4>Enter New Password:</h4>
            <input type="password" name="new_password" placeholder="New Password" required>
            <h4>Confirm New Password:</h4>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit">Update</button>
        </form>

        <form action="update_employee_profile.inc.php" method="post">
            <button type="submit" class="back-button">Back</button>
        </form>

        <?php
        change_password_error();
        ?>
    </div>

</body>

</html>
