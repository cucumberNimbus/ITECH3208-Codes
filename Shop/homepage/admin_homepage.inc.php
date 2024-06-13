<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Admin</title>
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

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h2> Admin</h2>
        <ul>
            <li><a href="admin_function/add_product_detail.inc.php">Add Product</a></li>
            <li><a href="admin_function/add_product_inventory_detail.inc.php">Add Product Inventory</a></li>
            <li><a href="admin_function/remove_product_detail.inc.php">Remove Product</a></li>
            <li><a href="admin_function/monitor_product_detail.inc.php">Monitor Product</a></li>
            <li><a href="admin_function/show_alerts.inc.php">Check Alerts</a></li>
            <li><a href="admin_function/inbox_details.inc.php">Inbox</a></li>
            <li><a href="admin_function/add_employee_details.inc.php">Add Employee Account</a></li>
            <li><a href="admin_function/update_tracking_info_details.inc.php">Update Tracking Info</a></li>
            <li><a href="user_homepage/profile_settings/logout.inc.php">Log Out</a></li>
        </ul>
    </div>

    <div class="content">
        <h2>Admin Functionality</h2>
        <div class="container">
            <?php
            include_once 'admin_function/show_alerts_view.inc.php';
            check_alerts();
            ?>
        </div>
    </div>

</body>

</html>
