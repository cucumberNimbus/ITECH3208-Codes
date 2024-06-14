<?php
require_once 'monitor_product_model.inc.php';
require_once 'monitor_product_contr.inc.php';
require_once 'dbh.inc.php';

$product = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if ((!isset($_POST['prod_id_men']) || $_POST['prod_id_men'] == "not_selected") &&
        (!isset($_POST['prod_id_women']) || $_POST['prod_id_women'] == "not_selected")) {
        $product = null;
    } else if (isset($_POST['prod_id_men']) && $_POST['prod_id_men'] != "not_selected") {
        $prod_id_string = $_POST['prod_id_men'];
        $prod_id = intval($prod_id_string);
        $product = get_prod_details($pdo, $prod_id);
    } else if (isset($_POST['prod_id_women']) && $_POST['prod_id_women'] != "not_selected") {
        $prod_id_string = $_POST['prod_id_women'];
        $prod_id = intval($prod_id_string);
        $product = get_prod_details($pdo, $prod_id);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitor Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .sidebar {
            width: 200px;
            background-color: #1e90ff;
            padding: 20px;
            height: 100vh;
            position: fixed;
            overflow-y: auto;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar a {
            display: block;
            background-color: #1e90ff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .sidebar a:hover {
            background-color: #4169e1;
        }

        .sidebar h2 {
            text-align: center;
            color: #fff;
        }

        .content {
            margin-left: 220px;
            padding: 20px;
            width: calc(100% - 220px);
        }

        .container {
            background: white;
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
            overflow: hidden;
        }

        h3 {
            text-align: center;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        input, select, button {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #5cb85c;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #4cae4c;
        }

        .back-button {
            background-color: #f0ad4e;
            margin-bottom: 20px;
        }

        .back-button:hover {
            background-color: #ec971f;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            display: block;
            margin: 10px 0;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h2>Admin</h2>
        <ul>
            <li><a href="add_product_detail.inc.php">Add Product</a></li>
            <li><a href="add_product_inventory_detail.inc.php">Add Product Inventory</a></li>
            <li><a href="remove_product_detail.inc.php">Remove Product</a></li>
            <li><a href="monitor_product_detail.inc.php">Monitor Product</a></li>
            <li><a href="show_alerts.inc.php">Check Alerts</a></li>
            <li><a href="inbox_details.inc.php">Inbox</a></li>
            <li><a href="add_employee_details.inc.php">Add Employee Account</a></li>
            <li><a href="update_tracking_info_details.inc.php">Update Tracking Info</a></li>
            <li><a href="../user_homepage/profile_settings/logout.inc.php">Log Out</a></li>
        </ul>
    </div>

    <div class="content">
        <div class="container">
            <h2>Product Performance</h2>
            <form action="" method="POST">
                <h4>Men's Products</h4>
                <select name="prod_id_men">
                    <option value="not_selected">--Select a product--</option>
                    <?php
                    $products = get_all_products_men($pdo);
                    foreach ($products as $product_item) {
                        echo "<option value=\"{$product_item['id']}\">{$product_item['prod_name']}</option>";
                    }
                    ?>
                </select>

                <h4>Women's Products</h4>
                <select name="prod_id_women">
                    <option value="not_selected">--Select a product--</option>
                    <?php
                    $products = get_all_products_women($pdo);
                    foreach ($products as $product_item) {
                        echo "<option value=\"{$product_item['id']}\">{$product_item['prod_name']}</option>";
                    }
                    ?>
                </select>
                <button type="submit">GO</button>
            </form>

            <?php if ($product): ?>
                <h2>Product Details:</h2>
                <p>Product ID: <?php echo htmlspecialchars($product['id']); ?></p>
                <p>Product Name: <?php echo htmlspecialchars($product['prod_name']); ?></p>
                <p>Price: $<?php echo htmlspecialchars($product['prod_price']); ?></p>
                <p>Gender: <?php echo htmlspecialchars($product['prod_gender']); ?></p>
                <p>Number in stock: <?php echo htmlspecialchars($product['in_stock']); ?></p>
                <p>Number bought: <?php echo htmlspecialchars($product['number_bought']); ?></p>
                <p>Number viewed by customers: <?php echo htmlspecialchars($product['number_viewed']); ?></p>
                <p>Image: <img src='<?php echo htmlspecialchars($product['prod_image_location']); ?>' alt='Product Image'></p>
            <?php endif; ?>
            <form action="../admin_homepage.inc.php" method="post">
                <button type="button" class="back-button" onclick="window.location.href='../admin_homepage.inc.php'">Back</button>
            </form>
        </div>
    </div>

</body>

</html>
