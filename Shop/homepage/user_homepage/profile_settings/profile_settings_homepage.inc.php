<?php
    require_once 'dbh.inc.php';
    require_once 'profile_settings_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile </title>
</head>

<body>
<nav>
        <ul>
            <li><a href="../user_homepage.inc.php">Homepage</a></li>
            <li><a href="../shopping_cart.inc.php">Shopping Cart</a></li>
            <li>
                <form action="/search" method="get">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit">Search</button>
                </form>
            </li>
            <li><a href="../user_homepage.inc.php#mens">All Men's Clothing</a></li>
            <li><a href="../user_homepage.inc.php#womens">All Women's Clothing</a></li>
        </ul>
    </nav>
    <h3>Profile Settings</h3>
    <h4> Your current profile details: </h4>

    <?php show_current_details($pdo); ?>

    <form action="change_delivery_address_detail.inc.php" method="post">
        <button>Change delivery address</button>
    </form>

    <form action="change_payment_info_detail.inc.php" method="post">
        <button>Change payment information</button>
    </form>    

    <form action="change_password_detail.inc.php" method="post">
        <button>Change password</button>
    </form> 

    <?php
    show_profile_alert();
    ?>
 



</body>

</html>