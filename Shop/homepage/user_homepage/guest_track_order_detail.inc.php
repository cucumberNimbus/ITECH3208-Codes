<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Order</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        nav {
            background-color: #1e90ff;
            color: white;
            padding: 10px;
            margin-bottom: 20px;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
        }
        nav ul li {
            display: inline;
            margin-right: 10px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
        }
        h3 {
            margin-bottom: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<nav>
        <ul>
            <li><a href="user_homepage.inc.php">Homepage</a></li>
            <li><a href="shopping_cart.inc.php">Shopping Cart</a></li>
            <li><a href="#mens">All Men's Clothing</a></li>
            <li><a href="#womens">All Women's Clothing</a></li>
            <?php
                session_start();
                if ($_SESSION['user_type'] <> "guest") {
                    echo '<li><a href="profile_settings/profile_settings_homepage.inc.php">Profile</a></li>';
                } elseif ($_SESSION['user_type'] == "guest") {
                    echo '<li><a href="profile_settings/logout.inc.php">Signup/Login</a></li>';
                }
            ?>
            <?php
                session_start();
                if ($_SESSION['user_type'] == "guest") {
                    echo '<li><a href="profile_settings/contact_admin_details.inc.php">Contact Admin</a></li>';
                }
            ?>
        </ul>
    </nav>

    <h3>Enter Your Order ID</h3>
    <form action="guest_track_order.inc.php" method="post">
        <input type="text" name="order_id" placeholder="Order ID" required>
        <button type="submit">Track</button>
    </form>
</body>
</html>
