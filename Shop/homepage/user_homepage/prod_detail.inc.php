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
