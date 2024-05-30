<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>

<body>

<nav>
        <ul>
            <li><a href="../user_homepage.inc.php">Homepage</a></li>
            <li><a href="../shopping_cart.inc.php">Shopping Cart</a></li>
            <li><a href="../user_homepage.inc.php#mens">All Men's Clothing</a></li>
            <li><a href="../user_homepage.inc.php#womens">All Women's Clothing</a></li>
            <li><a href="profile_settings_homepage.inc.php">Profile</a></li>
        </ul>
    </nav>

    <h4> Enter new delivery address: </h4>
    
    <form action="change_delivery_address.inc.php" method="post">
        <input type="text" name="new_delivery_address" placeholder="New Delivery Address" required>
        <button type="submit" name="action" >Change address</button>
        <br>
    </form>

</body>

</html>

