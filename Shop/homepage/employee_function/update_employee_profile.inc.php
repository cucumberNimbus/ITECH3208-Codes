<?php
require_once 'update_employee_profile_contr.inc.php';
require_once 'update_employee_profile_view.inc.php';
require_once 'dbh.inc.php';
session_start();
$emp_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Employee</title>
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
            background-color: #1e90ff;
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

        .container {
            background: white;
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }

        h2, h3 {
            text-align: center;
        }

        p {
            margin: 10px 0;
        }

        form {
            margin-top: 20px;
            text-align: center;
        }

        button {
            background-color: #5cb85c;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px 0;
            display: block;
            width: 100%;
            box-sizing: border-box;
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
        <div class="container">
            <h2>Update Employee Profile</h2>
            <h3>Your current credentials:</h3>
            <p>Username: <?php show_emp_username($pdo, $emp_id); ?></p>
            <p>Email: <?php show_emp_email($pdo, $emp_id); ?></p>
            <p>Full name: <?php show_emp_full_name($pdo, $emp_id); ?></p>
            <p>Address: <?php show_emp_address($pdo, $emp_id); ?></p>
            <p>Phone number: <?php show_emp_phone_number($pdo, $emp_id); ?></p>
            <p>Date of birth: <?php show_emp_dob($pdo, $emp_id); ?></p>

            <?php show_na_message($pdo, $emp_id); ?>

            <form action="enter_credentials_detail.inc.php" method="post">
                <button>Update Details</button>
            </form>

            <form action="change_password_detail.inc.php" method="post">
                <button>Change Password</button>
            </form>

            <form action="../employee_homepage.inc.php" method="post">
                <button type="submit" class="back-button">Back</button>
            </form>

            <?php show_profile_alert(); ?>
        </div>
    </div>

</body>
</html>
