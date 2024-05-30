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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* Light blue background color */
            margin: 0;
            padding: 0;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #007bff; /* Blue navigation background color */
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
            background-color: #0056b3; /* Darker blue on hover */
        }

        h3, h4, h5 {
            color: #007bff; /* Blue heading color */
            margin-top: 20px;
        }

        p {
            margin-bottom: 10px;
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

    <?php if ($_SESSION['user_type'] == 'user'): ?>

        <h3> Your shopping cart items: </h3>
        <?php
        display_cart($pdo);
        ?>

        <h4> Payment and delivery details:</h4>
        <p> Credit card details: <?php show_card_details($pdo); ?>
        <p> Delivery Address: <?php show_delivery_address($pdo); ?>
        <h5> Please go to <a href="profile_settings/profile_settings_homepage.inc.php">your profile page </a> to change your delivery address or payment details</h5>
    
    <?php endif; ?>

    <?php if ($_SESSION['user_type'] == 'guest'){
        display_cart($pdo);
    }
    ?>
    <h4><?php check_place_order_errors(); ?> </h4>

</body>

</html>
