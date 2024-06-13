<?php
require_once 'add_employee_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Employee Account</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f5f5;
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

        form {
            margin: 20px auto;
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="password"],
        button {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
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

        h3 {
            text-align: center;
        }

        h5 {
            text-align: center;
            color: #666;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h2>Admin</h2>
        <ul>
            <li><a href="add_product_detail.inc.php">Add Product</a></li>
            <li><a href="add_product_inventory_detail.inc.php">Add Product Inventory</a></li>
            <li><a href="remove_product_detail.inc.php">Remove Product</a></li>
            <li><a href="monitor_product_detail.inc.php">Monitor Product</a></li>
            <li><a href="show_alerts.inc.php">Check Alerts</a></li>
            <li><a href="inbox_details.inc.php">Inbox</a></li>
            <li><a href="add_employee_details.inc.php">Add Employee Account</a></li>
            <li><a href="update_tracking_info_details.inc.php">Update Tracking Info</a></li>
            <li><a href="../user_homepage/profile_settings/logout.inc.php">Log Out</a></li>
        </ul>
    </div>

    <div class="content">
        <h3>Add Employee Details</h3>
        <h5>Employees can later add further details from their profile page</h5>

        <form action="add_employee.inc.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <button>Signup</button>
        </form>
        <form action="../admin_homepage.inc.php" method="post">
            <button class="back-button">Back</button>
        </form>

        <?php
        check_signup_errors();
        ?>
    </div>

</body>

</html>
