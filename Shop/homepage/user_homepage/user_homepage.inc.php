<?php
// Start the session at the beginning
session_start();

// Include necessary files
require_once 'dbh.inc.php';
require_once 'user_homepage_contr.inc.php';
require_once 'user_homepage_model.inc.php';
require_once 'add_to_cart_view.inc.php';

// Ensure the session is started and check the user type
$user_type = isset($_SESSION['user_type']) ? $_SESSION['user_type'] : 'guest';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome User</title>
    <style>

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f5f5;
        }
        nav {
            background-color: #1e90ff;
            overflow: hidden;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex; /
            align-items: center; /
        }

        nav ul li {
            margin-right: 20px;
            font-size: 18px;
        }

        nav ul li:first-child {
            margin-right: auto; /* Push logo to the left */
        }

        nav ul li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav ul li a:hover {
            background-color: #4169e1;
        }
        
        li img {
        
            height: 100%;
            width: 20%;
        }
        img {
            height: 50%;
            width: 50%
        }
        h3 {
            color: rgb(126,149,200);
            font-size: 20px;
            Font-family: "Times New Roman", Times, serif;
            margin-top: 20px;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(80px, 1fr)); 
            gap: 20px;
            margin: 20px 20px 20px 20px;
        }
        .product {
            height: 50px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            background-color: #fff;
            text-align: center;

        }
        .product img {
            width: 100px;
            height: 50px;
            object-fit: cover; 
            margin-bottom: 10px;
        

        }
        .footer {
            background-color: #007bff; /* Blue background color */
            color: white;
            padding: 20px;
            margin-top: auto; /* Push the footer to the bottom */
        }

        .footer .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .footer .column {
            flex: 1;
            min-width: 200px;
            margin: 10px;
        }

        .footer h4 {
            margin-top: 0;
        }

        .footer ul {
            list-style-type: none;
            padding: 0;
        }

        .footer ul li {
            margin: 5px 0;
        }

        .footer ul li a {
            color: white;
            text-decoration: none;
        }

        .footer ul li a:hover {
            text-decoration: underline;
        }

        .footer .subscribe {
            display: flex;
            flex-direction: column;
        }

        .footer .subscribe input[type="email"] {
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            max-width: 300px;
        }

        .footer .subscribe button {
            background-color: #0056b3; /* Darker blue */
            border: none;
            padding: 10px;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .footer .subscribe button:hover {
            background-color: #003f7f; /* Even darker blue */
        }

        .footer .bottom {
            text-align: center;
            margin-top: 20px;
        }
        .product-card {
            transition: transform 0.3s ease;
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 300px;
        }

        .product-card:hover {
            transform: scale(1.05);
        }

        .product-card img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .product-card h3 {
            margin: 10px 0;
        }

        .product-card p {
            margin: 10px 0;
        }

        .product-card button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .product-card button:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>

<nav>
    <ul>
        <li><img src="../prod_image/logo.jpeg" alt="Logo"></li>
        <li><a href="user_homepage.inc.php">Homepage</a></li>
        <li><a href="shopping_cart.inc.php">Shopping Cart</a></li>
        <li><a href="#mens">All Men's Clothing</a></li>
        <li><a href="#womens">All Women's Clothing</a></li>
        <?php if ($user_type != "guest"): ?>
            <li><a href="profile_settings/profile_settings_homepage.inc.php">Profile</a></li>
        <?php else: ?>
         
            <li><a href="profile_settings/contact_admin_details.inc.php">Contact Admin</a></li>
            <li><a href="guest_track_order_detail.inc.php">Track your Order</a></li>
            <li><a href="profile_settings/logout.inc.php">Signup/Login</a></li>
        <?php endif; ?>
    </ul>
</nav>

<?php
// Check cart status
check_cart_status();
?>
<h3 id="mens">All Men's Clothing</h3>
<div class="product-grid">
    <?php
    // Display men's clothing
    $gender = "men";
    show_cloth_detail($pdo, $gender);
    ?>
</div>

<h3 id="womens">All Women's Clothing</h3>
<div class="product-grid">
    <?php
    // Display women's clothing
    $gender = "women";
    show_cloth_detail($pdo, $gender);
    ?>
</div>

</body>
<footer class="footer">
    <div class="container">
        <div class="column">
            <h4>HELP</h4>
            <ul>
                <li><a href="#">FAQs</a></li>
                <li><a href="#">Returns and Exchanges</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">General Size Chart</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Do Not Sell</a></li>
                <li><a href="#">GDPR</a></li>
            </ul>
        </div>
        <div class="column">
            <h4>SHOP WITH US</h4>
            <ul>
                <li><a href="#">Search</a></li>
                <li><a href="#">All Products</a></li>
                <li><a href="#">Gift Card</a></li>
                <li><a href="#">Rewards</a></li>
                <li><a href="#">Shipping Protection</a></li>
            </ul>
        </div>
        <div class="column">
            <h4>EXPLORE</h4>
            <ul>
                <li><a href="#">Our Story</a></li>
                <li><a href="#">Customer Reviews</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Account</a></li>
            </ul>
        </div>
        <div class="column">
            <h4>JOIN THE Aussie Garment Club</h4>
            <p>Instantly receive updates, access to exclusive deals, product launch details, and more.</p>
            <div class="subscribe">
                <input type="email" placeholder="Enter your email address">
                <button type="submit">SUBSCRIBE</button>
            </div>
        </div>
    </div>
    <div class="bottom">
        <p>ABOUT THE SHOP</p>
        <p>Aussie Garment Club is a lifestyle clothing brand headquartered in Los Angeles, CA. From start to finish, each product is designed with our customers and quality in mind. We take a much different approach to our products than others. Our goal is not to make products in large quantities, but rather make unique and special products that our customers can wear with pride. Any Questions? (818) 206-8764</p>
        <p>Country/region: Australia (AUD $)</p>
        <p>&copy; Aussie Garment Club</p>
    </div>
</footer>
</html>
