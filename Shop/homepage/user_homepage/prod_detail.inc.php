<?php
require_once 'dbh.inc.php';
require_once 'prod_detail_contr.inc.php';
require_once 'prod_detail_model.inc.php';
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

        h3 {
            color: #007bff; /* Blue heading color */
            margin-top: 20px;
        }

        p {
            margin-bottom: 20px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff; /* Blue button background color */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3; /* Darker blue on hover */
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
    </ul>
</nav>

<h3><?php show_product_name($pdo, $_POST["prod_id"]); ?> </h3>  
<?php show_prod_image($pdo, $_POST["prod_id"]); ?>
<p>Description: <?php show_prod_description($pdo, $_POST["prod_id"]); ?>  </p>
<p>Price: $<?php show_prod_price($pdo, $_POST["prod_id"]); ?>  </p>
<form action="add_to_cart.inc.php" method="POST">
    <input type="hidden" name="prod_id" value= "<?php echo $_POST["prod_id"]; ?>" >
    <button type="submit">Add to Cart</button>
</form>

<?php
    check_cart_status();
?>

</body>
</html>
