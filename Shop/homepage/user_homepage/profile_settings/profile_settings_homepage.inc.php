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
        h3 {
            margin-bottom: 20px;
        }
        h4 {
            margin-bottom: 10px;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 10px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .profile-alert {
            margin-top: 20px;
            padding: 10px;
            background-color: #ffeeba;
            border: 1px solid #ffc107;
            border-radius: 5px;
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
        </ul>
    </nav>
    <h3>Profile Settings</h3>
    <h4>Your Current Profile Details:</h4>

    <?php show_current_details($pdo); ?>

    <form action="change_delivery_address_detail.inc.php" method="post">
        <button>Change Delivery Address</button>
    </form>

    <form action="change_payment_info_detail.inc.php" method="post">
        <button>Change Payment Information</button>
    </form>    

    <form action="change_password_detail.inc.php" method="post">
        <button>Change Password</button>
    </form> 

    <form action="../order_detail.inc.php" method="post">
        <button>Placed Orders</button>
    </form> 
    
    <form action="contact_admin_details.inc.php" method="post">
        <button>Contact Admin</button>
    </form> 

    <form action="logout.inc.php" method="post">
        <button>Log Out</button>
    </form> 

    <?php
    show_profile_alert();
    ?>
 

</body>

</html>
