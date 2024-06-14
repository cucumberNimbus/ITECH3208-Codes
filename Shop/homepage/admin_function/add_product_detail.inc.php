<?php
require_once 'add_product_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Admin</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 500px;
            width: 100%;
        }

        form {
            margin-bottom: 20px;
        }

        input,
        select,
        button {
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
        }

        .back-button:hover {
            background-color: #ec971f;
        }

        label {
            display: block;
            margin-top: 10px;
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
            <h3>Enter Product Details for Addition</h3>
            <form action="add_product.inc.php" method="post" enctype="multipart/form-data">
                <input type="text" name="prod_name" placeholder="Product Name" required>
                <input type="number" name="prod_price" placeholder="Product Price" step="0.01" required>
                <input type="text" name="prod_description" placeholder="Product Description" maxlength="200" required>

                <label for="prod_gender">Is the product for Men or Women</label>
                <select id="prod_gender" name="prod_gender" required>
                    <option value="men">Men</option>
                    <option value="women">Women</option>
                </select>
                <input type="file" name="file" accept="image/*" required>
                <input type="number" name="in_stock" placeholder="Quantity to add" required>
                <button type="submit">Upload</button>
            </form>

            <form action="../admin_homepage.inc.php" method="post">
                <button type="button" class="back-button" onclick="window.location.href='../admin_homepage.inc.php'">Back</button>
            </form>

            <?php
            check_prod_add_errors();
            ?>
        </div>
    </div>

</body>

</html>
