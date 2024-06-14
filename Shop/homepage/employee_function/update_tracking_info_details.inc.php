<?php
require_once 'dbh.inc.php';
require_once 'update_tracking_info_contr.inc.php';
require_once 'update_tracking_info_model.inc.php';

$order_id = null;
$order_details = null;
$all_orders = get_all_orders($pdo);

$delivered_orders_heading = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['order_id'])) {
        $order_id = intval($_POST['order_id']);
        $order_details = get_order_details($pdo, $order_id);
        $order_updates = get_order_updates($pdo, $order_id);

        if (isset($_POST['status'])) {
            $status = $_POST['status'];
            $comment = $_POST['comment'] ?? 'No comment yet';

            session_start(); 

            $updated_by = ($_SESSION['user_username']);
            add_order_update($pdo, $order_id, $status, $comment, $updated_by);
            $order_details = get_order_details($pdo, $order_id); 
            $order_updates = get_order_updates($pdo, $order_id); 
        }
    }

    if (isset($_POST['mark_as_delivered'])) {
        $order_id = intval($_POST['mark_as_delivered']);
        mark_order_as_delivered($pdo, $order_id);
        $all_orders = get_all_orders($pdo); 
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update tracking details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* Light blue background color */
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

        button {
            background-color: #007bff; /* Blue button background color */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 300px;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #007bff; /* Blue border color on focus */
        }

        h3 {
            color: #007bff; /* Blue heading color */
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

        <ul>
        <h3>Pick an order to update tracking info</h3>
        <?php 
        if (!get_all_orders($pdo)){
            echo "No orders to show!";
        }
        foreach ($all_orders as $order): ?>  <!-- shows a list of all orders made -->
                
                <?php 
                    if ($order['delivery_status'] != 'in progress'){
                        if ($delivered_orders_heading == 0){
                            echo "<h3>Delivered orders:</h3>";
                            $delivered_orders_heading = 1;
                        }
                    }
                ?>
                <li>
                    Order ID: <?php echo htmlspecialchars($order['order_id']); ?> <br>
                    User ID: <?php 
                    if ($order['user_id'] == null){
                        echo "Guest";
                    } else {
                    echo htmlspecialchars($order['user_id']);
                    } ?>  <br>
                    Total Price: $<?php echo htmlspecialchars($order['total_price']); ?>
                    <?php if ($order['delivery_status'] == 'in progress'): ?>
                        <form method="POST" action="" style="display:inline;">
                            <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
                            <button type="submit">Update</button>
                        </form>
                        <form method="POST" action="" style="display:inline;">
                            <input type="hidden" name="mark_as_delivered" value="<?php echo $order['order_id']; ?>">
                            <button type="submit">Delivered</button>
                        </form>
                        <br><br>
                    <?php else: ?>
                        <span><h5>Delivered</h5></span>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
       

        <?php if ($order_details): ?>  <!-- shows current or updates order details of an order has been selected -->
            <h2>Order Details for Order #<?php echo htmlspecialchars($order_details['order_id']); ?></h2>
            <p>User ID: <?php if ($order_details['user_id'] == null){
                        echo "Guest";
                    } else {
                    echo htmlspecialchars($order['user_id']);
                    } ?></p>
            <p>User Address: <?php echo htmlspecialchars($order_details['user_address']); ?></p>
            <p>Order Date: <?php echo htmlspecialchars($order_details['order_date']); ?></p>
            <p>Status: <?php echo htmlspecialchars($order_details['delivery_status']); ?></p>
            <p>Total Price: $<?php echo htmlspecialchars($order_details['total_price']); ?></p>

            <h3>Order Updates</h3>
            <ul>
                <?php foreach ($order_updates as $update): ?>
                    <li>
                        <strong><?php echo htmlspecialchars($update['update_date']); ?>:</strong>
                        <?php echo htmlspecialchars($update['status']); ?> - <?php echo htmlspecialchars($update['comment']); ?>
                        <strong>Updated by: <?php echo htmlspecialchars($update['updated_by']);?></strong>
                    </li>
                <?php endforeach; ?>
            </ul>

            <h3>Add New Update</h3>
            <form method="POST" action="">
                <input type="hidden" name="order_id" value="<?php echo htmlspecialchars($order_details['order_id']); ?>">
                <label for="status">Status:</label>
                <div>
                    <input type="radio" id="pending" name="status" value="pending" required>
                    <label for="pending">Pending</label><br>
                    <input type="radio" id="order_received" name="status" value="order received" required>
                    <label for="order_received">Order Received</label><br>
                    <input type="radio" id="order_shipped" name="status" value="order shipped" required>
                    <label for="order_shipped">Order Shipped</label><br>
                    <input type="radio" id="order_in_transit" name="status" value="order in transit" required>
                    <label for="order_in_transit">Order In Transit</label><br>
                </div>
                <label for="comment">Comment:</label>
                <textarea name="comment" id="comment">No comment yet</textarea><br>
                <button type="submit">Add Update</button>
            </form>
        <?php endif; ?>

        <form action="../employee_homepage.inc.php" method="post">
            <button>Back</button>
        </form>
    </div>
    </ul>

</body>

</html>
