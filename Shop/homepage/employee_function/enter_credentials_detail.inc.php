<?php
require_once 'enter_credentials_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Details Credentials</title>
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

        .container {
            background: white;
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
            text-align: center;
        }

        h4 {
            margin-bottom: 20px;
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

        button[type="submit"] {
            background-color: #5cb85c;
            color: white;
            border: none;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #4cae4c;
        }

        button[type="button"] {
            background-color: #f0ad4e;
        }

        button[type="button"]:hover {
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
            <h4>Enter New Details</h4>

            <form action="enter_credentials.inc.php" method="post">
                <input type="text" name="email" placeholder="E-Mail" required>
                <input type="text" name="full_name" placeholder="Full Name" required>
                <input type="text" name="address" placeholder="Residential Address" required>
                <input type="text" name="phone_number" placeholder="Phone Number" required>
                <input type="text" name="dob" placeholder="Date of Birth (DD/MM/YYYY)" required>
                <button type="submit" name="action" value="add_credentials">Update Details</button>
            </form>

            <?php
            check_employee_credentials_errors();
            ?>

            <form action="update_employee_profile.inc.php" method="post">
                <button type="button" class="back-button" onclick="window.location.href='update_employee_profile.inc.php'">Back</button>
            </form>
        </div>
    </div>

</body>

</html>
