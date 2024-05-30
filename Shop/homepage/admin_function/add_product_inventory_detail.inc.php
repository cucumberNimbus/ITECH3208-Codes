<?php
session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

function check_update_prod_errors() {
    // Example function to display errors. This should be implemented as needed.
    if (isset($_SESSION['update_prod_errors'])) {
        foreach ($_SESSION['update_prod_errors'] as $error) {
            echo '<p class="error">' . htmlspecialchars($error) . '</p>';
        }
        unset($_SESSION['update_prod_errors']);
    }
}
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
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        input {
            margin-bottom: 15px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>

<body>
    <div class="container">
       
        <h3>Add Product Inventory</h3>

        <form action="add_product_inventory.inc.php" method="post">
            <label for="prod_name">Product Name</label>
            <input type="text" id="prod_name" name="prod_name" placeholder="Product Name" required>

            <label for="new_stock">New Total Stock</label>
            <input type="number" id="new_stock" name="new_stock" placeholder="New total stock" required>

            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
            <button type="submit">Update</button>
        </form>
        <br>

        <form action="../admin_homepage.inc.php" method="post">
            <button type="submit">Back</button>
        </form>

        <?php check_update_prod_errors(); ?>
    </div>
</body>

</html>
