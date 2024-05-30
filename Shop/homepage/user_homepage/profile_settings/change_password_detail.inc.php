<?php
require_once 'change_password_view.inc.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        nav {
            background-color: #333;
            color: white;
            padding: 10px;
            margin-bottom: 20px;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
        }
        nav ul li {
            display: inline;
            margin-right: 10px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
        }
        h4 {
            margin-bottom: 10px;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
        }
    </style>
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
    <h4>Change Password</h4>
    
    <form action="change_password.inc.php" method="post">
        <h4>Enter Current Password:</h4>
        <input type="password" name="current_password" placeholder="Current Password" required>
        <h4>Enter New Password:</h4>
        <input type="password" name="new_password" placeholder="New Password" required>
        <h4>Confirm New Password:</h4>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
        <button type="submit">Update</button>
    </form>

    <?php
    change_password_error();
    ?>

</body>

</html>
