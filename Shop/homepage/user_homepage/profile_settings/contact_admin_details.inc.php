<?php
    require_once 'contact_admin_view.inc.php';
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
            <li><a href="../user_homepage.inc.php#mens">All Men's Clothing</a></li>
            <li><a href="../user_homepage.inc.php#womens">All Women's Clothing</a></li>
        </ul>
    </nav>
    <h3>Contact Admin</h3>
    <p> Enter your email address and message to admin</p>

    <form action="contact_admin.inc.php" method="post">
        <input type="text" name="email" placeholder="E-Mail">
        <input type="text" name="message" placeholder="Message" size="50">
        <button>Post</button>
    </form>

    <?php
        check_message_errors();
    ?>

    </body>

</html>