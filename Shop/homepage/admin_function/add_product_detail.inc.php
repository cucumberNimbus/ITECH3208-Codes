<?php
require_once 'add_product_view.inc.php';

// Function to generate CSRF token
function generate_csrf_token() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// Function to validate CSRF token
function validate_csrf_token($token) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    return hash_equals($_SESSION['csrf_token'], $token);
}

$csrf_token = generate_csrf_token();
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
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        h3 {
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input, select, button {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        
        <h3>Enter product details for addition</h3>
        <form action="add_product.inc.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
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
            <button type="submit">Back</button>
        </form>

        <?php
            check_prod_add_errors();
        ?>
    </div>
</body>

</html>
