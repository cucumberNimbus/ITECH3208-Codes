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
            background-color: white;
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

        .container {
            display: flex;
            align-items: flex-start;
            padding: 20px;
        }

        .product-image {
            flex: 1;
            max-width: 50%;
        }

        .product-details {
            flex: 1;
            max-width: 50%;
            padding-left: 20px;
            box-sizing: border-box;
        }

        h3, p {
            color: #333;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
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
        </ul>
    </nav>
    
    <div class="container">
        <div class="product-image">
            <?php show_prod_image($pdo, $_POST["prod_id"]); ?>
        </div>
        <div class="product-details">
            <h3><?php show_product_name($pdo, $_POST["prod_id"]); ?></h3>
            <p>Description: <?php show_prod_description($pdo, $_POST["prod_id"]); ?></p>
            <p>Price: $<?php show_prod_price($pdo, $_POST["prod_id"]); ?></p>
            <form action="add_to_cart.inc.php" method="POST">
                <input type="hidden" name="prod_id" value= "<?php echo $_POST["prod_id"]; ?>">
                <button type="submit">Add to Cart</button>
            </form>
            <?php
                check_cart_status();
            ?>
        </div>
    </div>

</body>
</html>
