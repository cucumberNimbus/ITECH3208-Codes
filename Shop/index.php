<?php
require_once 'login_functions/signup_view.inc.php';
require_once 'login_functions/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login & Signup</title>
    </head>

    <body>

        <h3>Login</h3>

        <form action="login_functions/login.inc.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <button>Login</button>
        </form>
        
        <?php
        check_login_errors();
        ?>

        <h3>Signup</h3>

        <form action="login_functions/signup.inc.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <input type="text" name="email" placeholder="E-Mail">
            <input type="text" name="delivery_address" placeholder="Delivery Address">
            <input type="text" name="payment_details" placeholder="Payment Details">
            <button>Signup</button>
        </form>
        <br>
        
        <form action="login_functions/guest_login.inc.php" method="post">
            <button>Login as a guest</button>
        </form>

        <?php
        check_signup_errors();
        ?>

    </body>

</html>