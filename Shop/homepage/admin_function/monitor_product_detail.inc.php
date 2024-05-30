<?php
require_once 'monitor_product_view.inc.php';
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
            padding: 20px;
        }
        .container {
            background: white;
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }
        h3 {
            text-align: center;
        }
        form {
            text-align: center;
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
            margin-bottom: 20px;
        }
        .back-button:hover {
            background-color: #ec971f;
        }
    </style>
</head>

<body>
    <div class="container">


        <h3>Enter Product Name to Monitor</h3>
        
        <form action="monitor_product.inc.php" method="post">
            <input type="text" name="prod_name_input" placeholder="Product Name" required>
            <button type="submit">Details</button>
        </form>

        <?php
            check_monitor_prod_errors();
        ?>
                <form action="../admin_homepage.inc.php" method="post">
            <button type="button" class="back-button" onclick="window.location.href='../admin_homepage.inc.php'">Back</button>
        </form>
    </div>
</body>

</html>
