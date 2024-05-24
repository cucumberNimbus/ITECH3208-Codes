<?php
require_once 'shopping_cart_contr.inc.php';
require_once 'dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
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

    <h3> Your shopping cart items: </h3>
    <?php
    display_cart($pdo); //this function in shopping_cart_contr.inc.php will display all contents of their shopping cart and also add a place order button to confirm their order and send it to the database
    ?>

    <h4> Payment and delivery details:</h4>
    <p> Credit card details: <?php show_card_details($pdo); ?>
    <p> Delivery Address: <?php show_delivery_address($pdo); ?>

    <h5> Please go to <a href="profile_settings/profile_settings_homepage.inc.php">your profile page </a> to change your delivery address or payment details</h5>
    <h4><?php check_place_order_errors(); ?> </h4>

</body>

</html>
