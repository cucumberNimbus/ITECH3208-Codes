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
    <title>User Profile</title>
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

        h4 {
            margin-top: 20px;
            color: #007bff; /* Blue heading color */
        }

        button {
            padding: 10px 20px;
            background-color: #007bff; /* Blue button background color */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
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
    <h4>Your current profile details:</h4>

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

    <form action="../order_detail.inc.php" method="post">
        <button>Placed orders</button>
    </form> 
    
    <form action="contact_admin_details.inc.php" method="post">
        <button>Contact Admin</button>
    </form> 

    <form action="logout.inc.php" method="post">
        <button>Log out</button>
    </form> 

    <?php
    show_profile_alert();
    ?>
</body>

</html>
