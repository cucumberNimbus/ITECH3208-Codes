<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 50px auto;
            text-align: center;
        }

        h3 {
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 10px;
            width: 300px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff; /* Original blue color */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .back-btn {
            background-color: #007bff;
            margin-top: 10px;
        }

        .delete-btn {
            background-color: #007bff; /* Keep original blue color */
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Enter product name for deletion</h3>
        <form action="remove_product.inc.php" method="post">
            <input type="text" name="prod_name_input" placeholder="Product Name" required>
            <button class="delete-btn">Delete</button>
        </form>
        <form action="../employee_homepage.inc.php" method="post">
            <button class="back-btn">Back</button>
        </form>
        <?php
            check_prod_remove_errors();
        ?>
    </div>
</body>
</html>
