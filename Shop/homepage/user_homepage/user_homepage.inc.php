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