<?php

require_once 'employee_function/dbh.inc.php';
require_once 'employee_homepage_model.inc.php';
require_once 'employee_homepage_contr.inc.php';

$new_orders = get_new_orders($pdo);
$new_messages = get_new_messages($pdo);
$low_stock_items = get_low_stock_items($pdo);
?>

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
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .dashboard {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
        }

        .dashboard-section {
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            flex: 1;
            min-width: 300px;
        }

        .dashboard-section h3 {
            margin-top: 0;
        }

        .order-list {
            list-style-type: none;
            padding: 0;
        }

        .order-list li {
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .order-list form {
            display: inline-block;
            margin: 0;
        }

        .order-list button {
            background-color: #007bff; /* Blue button background color */
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .order-list button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        .dashboard-header {
            text-align: center;
            width: 100%;
            margin-bottom: 20px;
        }

        .message-list {
            list-style-type: none;
            padding: 0;
        }

        .message-list li {
            margin-bottom: 10px;
        }

        .inbox-button {
            display: block;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            margin-top: 10px;
        }

        .inbox-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

<div class="sidebar">
        <h2>Employee</h2>
        <ul>
            <li><a href="employee_function/add_product_detail.inc.php">Add Product</a></li>
            <li><a href="employee_function/remove_product_detail.inc.php">Remove Product</a></li>
            <li><a href="employee_function/update_tracking_info_details.inc.php">Update Tracking Information</a></li>
            <li><a href="employee_function/show_alerts.inc.php">Check Alerts</a></li>
            <li><a href="employee_function/update_employee_profile.inc.php">Update Profile</a></li>
            <li><a href="employee_function/inbox_details.inc.php">Inbox</a></li>
            <li><a href="user_homepage/profile_settings/logout.inc.php">Log Out</a></li>
        </ul>
    </div>

    <div class="content">
        <div class="dashboard-header">
            <h2>Employee Dashboard</h2>
        </div>

        <div class="dashboard">
            <div class="dashboard-section">
                <h3>New Orders</h3>
                <?php if (empty($new_orders)): ?>
                    <p>No new orders.</p>
                <?php else: ?>
                    <ul class="order-list">
                        <?php foreach ($new_orders as $order): ?>
                            <li>
                                <strong>Order ID: <?php echo htmlspecialchars($order['order_id']); ?></strong> - Total: $<?php echo htmlspecialchars($order['total_price']); ?>
                                <form method="POST" action="employee_function/update_tracking_info_details.inc.php">
                                    <input type="hidden" name="order_id" value="<?php echo htmlspecialchars($order['order_id']); ?>">
                                    <button type="submit">Update</button>
                                </form>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
            
            <div class="dashboard-section">
                <h3>Low Stock Items</h3>
                <?php if (empty($low_stock_items)): ?>
                    <p>No items with low stock.</p>
                <?php else: ?>
                    <ul>
                        <?php foreach ($low_stock_items as $item): ?>
                            <li><?php echo htmlspecialchars($item['prod_name']); ?>: <?php echo htmlspecialchars($item['in_stock']); ?> left</li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <div class="dashboard-section">
                <h3>New Messages</h3>
                <?php if (empty($new_messages)): ?>
                    <p>No new messages.</p>
                <?php else: ?>
                    <ul class="message-list">
                        <?php foreach ($new_messages as $message): ?>
                            <strong><li><?php echo htmlspecialchars($message['email']); ?></strong> <br>
                            <strong>Message: </strong> <?php echo htmlspecialchars($message['message']); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <a class="inbox-button" href="employee_function/inbox_details.inc.php">Go to Inbox</a>
            </div>

        </div>
    </div>

</body>

</html>
