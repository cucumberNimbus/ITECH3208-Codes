<?php 
require_once 'order_detail_view.inc.php';
require_once 'order_detail_contr.inc.php';
require_once 'dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; 
            margin: 0;
            padding: 0;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #007bff; 
        }

        nav ul li {
            float: left;
        }

        nav ul li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav ul li a:hover {
            background-color: #0056b3; 
        }

        h5, h6 {
            color: #007bff; 
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="user_homepage.inc.php">Homepage</a></li>
            <li><a href="shopping_cart.inc.php">Shopping Cart</a></li>
            <li><a href="user_homepage.inc.php#mens">All Men's Clothing</a></li>
            <li><a href="user_homepage.inc.php#womens">All Women's Clothing</a></li>
            <?php
                session_start();
                if ($_SESSION['user_type'] <> "guest") {
                    echo '<li><a href="profile_settings/profile_settings_homepage.inc.php">Profile</a></li>';
                } elseif ($_SESSION['user_type'] == "guest") {
                    echo '<li><a href="profile_settings/logout.inc.php">Signup/Login</a></li>';
                }
            ?>
        </ul>
    </nav>

    <?php show_order_confirmation_message(); ?>
    
    <h5> Here are your order details </h5>
    <h6> Order number: <?php if ($_SESSION['user_type'] == "user"){show_order_number($pdo);} else if ($_SESSION['user_type'] == "guest"){echo $_SESSION['guest_order_id'];} ?></h6>
    <h6> Order date: <?php if ($_SESSION['user_type'] == "user"){show_order_date($pdo);} else if ($_SESSION['user_type'] == "guest") {show_order_date_guest($pdo, $_SESSION['guest_order_id']);}  ?></h6>
    <h6> Order amount: $ <?php if ($_SESSION['user_type'] == "user"){show_order_amount($pdo);} else if ($_SESSION['user_type'] == "guest") {show_order_amount_guest($pdo, $_SESSION['guest_order_id']);} ?></h6>
    <h6> Shipping address: <?php if ($_SESSION['user_type'] == "user"){show_shipping_address($pdo);} else if ($_SESSION['user_type'] == "guest") {show_shipping_address_guest($pdo, $_SESSION['guest_order_id']);} ?></h6>
    <h6> Tracking details: </h6>
        <?php if ($_SESSION['user_type'] == "user"){show_tracking_details($pdo);} else if ($_SESSION['user_type'] == "guest") {show_tracking_details_guest($pdo, $_SESSION['guest_order_id']);} ?>
    <h6> Order summary: </h6>
    <?php show_order_summary($pdo) ?>

</body>
</html>
