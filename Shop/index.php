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
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        h3 {
            color: #333;
        }
        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: red;
            margin-top: 5px;
        }
    </style>
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