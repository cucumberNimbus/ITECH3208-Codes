<?php
require_once 'remove_product_view.inc.php';
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
            padding: 20px;
        }
        .container {
            background: white;
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
            text-align: center;
        }
        h3 {
            margin-bottom: 20px;
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
            background-color: #d9534f;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #c9302c;
        }
        .back-button {
            background-color: #f0ad4e;
        }
        .back-button:hover {
            background-color: #ec971f;
        }
    </style>
</head>

<body>
    <div class="container">


        <h3>Enter Product Name for Deletion</h3>
        
        <form action="remove_product.inc.php" method="post">
            <input type="text" name="prod_name_input" placeholder="Product Name" required>   
            <button type="submit">Delete</button>
        </form>

        <?php
            check_prod_remove_errors();
        ?>
                <form action="../employee_homepage.inc.php" method="post">
            <button type="button" class="back-button" onclick="window.location.href='../employee_homepage.inc.php'">Back</button>
        </form>
    </div>
</body>

</html>
