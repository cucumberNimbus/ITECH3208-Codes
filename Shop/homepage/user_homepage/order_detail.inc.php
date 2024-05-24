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
</head>

<body>
    <nav>
        <ul>
            <li><a href="user_homepage.inc.php">Homepage</a></li>
            <li><a href="shopping_cart.inc.php">Shopping Cart</a></li>
            <li>
                <form action="/search" method="get">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit">Search</button>
                </form>
            </li>
            <li><a href="user_homepage.inc.php#mens">All Men's Clothing</a></li>
            <li><a href="user_homepage.inc.php#womens">All Women's Clothing</a></li>
        </ul>
    </nav>

    <?php show_order_confirmation_message(); ?>
    
    <h5> Here are your order details </h5>
    <h6> Order number: <?php show_order_number($pdo) ?></h6>
    <h6> Order date: <?php show_order_date($pdo) ?></h6>
    <h6> Order amount: $ <?php show_order_amount($pdo) ?></h6>
    <h6> Shipping address: <?php show_shipping_address($pdo) ?></h6>
    <h6> Order summary: </h6>
    <?php show_order_summary($pdo) ?>



</body>

</html>