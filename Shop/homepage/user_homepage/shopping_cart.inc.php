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
            background-color: #f5f5f5; /* Light gray background */
            margin: 0;
            padding: 0;
        }
        nav {
            background-color: #007bff; /* Blue navigation background */
            color: white;
            padding: 10px 0;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        nav ul li {
            display: inline-block;
            margin-right: 20px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
        }
        nav ul li a:hover {
            text-decoration: underline;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #e3f2fd; /* Light blue container background */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h3, h4, h5 {
            color: #333;
        }
        .cart-item {
            border-bottom: 1px solid #ccc; /* Light gray border */
            padding: 10px 0;
        }
        .cart-item:last-child {
            border-bottom: none;
        }
        form {
            margin-bottom: 20px;
        }
        form input[type="text"] {
            padding: 8px;
            border: 1px solid #ccc; /* Light gray border */
            border-radius: 4px;
        }
        form button {
            padding: 8px 20px;
            background-color: #0056b3; /* Darker blue button background */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        form button:hover {
            background-color: #004080; /* Darker shade on hover */
        }
    </style>
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

    <?php if ($_SESSION['user_type'] == 'user'): //the layout for information will be changed for intuitive UI. This layout is for a registered user ?> 

        <h3> Your shopping cart items: </h3>
        <?php
        display_cart($pdo); //this function in shopping_cart_contr.inc.php will display all contents of their shopping cart and also add a place order button to confirm their order and send it to the database
        ?>

        <h4> Payment and delivery details:</h4>
        <p> Credit card details: <?php show_card_details($pdo); ?>
        <p> Delivery Address: <?php show_delivery_address($pdo); ?>
        <h5> Please go to <a href="profile_settings/profile_settings_homepage.inc.php">your profile page </a> to change your delivery address or payment details</h5>
    
    <?php endif; ?>

    <?php if ($_SESSION['user_type'] == 'guest'){ //the layout for information will be changed for intuitive UI. This layout is for a guest user
        display_cart($pdo);
    }
    ?>
    <h4><?php check_place_order_errors(); ?> </h4>

</body>

</html>
