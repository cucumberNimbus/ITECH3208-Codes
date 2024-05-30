<?php
require_once 'dbh.inc.php';
require_once 'user_homepage_contr.inc.php';
require_once 'user_homepage_model.inc.php';
require_once 'add_to_cart_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f5f5;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            background-color: #1e90ff;
            overflow: hidden;
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
            background-color: #4169e1;
        }
        h3 {
            margin-top: 20px;
        }
        .product {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #fff;
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
        if ($_SESSION['user_type'] == "guest") {
            echo '<li><a href="profile_settings/contact_admin_details.inc.php">Contact Admin</a></li>';
            echo '<li><a href="guest_track_order_detail.inc.php">Track your Order</a></li>';
        }
        ?>
    </ul>
</nav>

<?php
check_cart_status();
?>
<h3 id="mens"> All men's clothing</h3>
<?php
$gender = "men";
show_cloth_detail($pdo, $gender);
?>

<h3 id="womens"> All women's clothing </h3>
<?php
$gender = "women";
show_cloth_detail($pdo, $gender);
?>

</body>
</html>
