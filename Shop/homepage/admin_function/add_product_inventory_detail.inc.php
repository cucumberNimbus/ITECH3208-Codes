<?php
require_once 'add_product_inventory_view.inc.php';
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
            max-width: 400px;
            width: 100%;
        }
        form {
            margin-bottom: 20px;
        }
        input, button {
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
    <div class="container">

        <h3>Add Product Inventory</h3>
        <form action="add_product_inventory.inc.php" method="post">
            <input type="text" name="prod_name" placeholder="Product Name" required>
            <input type="number" name="new_stock" placeholder="New Total Stock" required>
            <button type="submit">Update</button>
        </form>

        <?php
            check_update_prod_errors();
        ?>
                <form action="../admin_homepage.inc.php" method="post">
            <button type="button" class="back-button" onclick="window.location.href='../admin_homepage.inc.php'">Back</button>
        </form>
    </div>
</body>

</html>
