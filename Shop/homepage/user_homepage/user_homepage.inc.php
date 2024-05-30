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
        h3 {
            color: #007bff; /* Blue heading */
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
            }
        ?>
    </ul>
</nav>

<?php
    check_cart_status();
?>

<h3 id="mens">All men's clothing</h3>
<?php
    $gender = "men";
    show_cloth_detail($pdo, $gender);
?>

<h3 id="womens">All women's clothing</h3>
<?php
    $gender = "women";
    show_cloth_detail($pdo, $gender);
?>

</body>
</html>
