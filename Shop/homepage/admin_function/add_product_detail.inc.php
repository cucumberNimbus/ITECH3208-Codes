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
</body>

</html>
