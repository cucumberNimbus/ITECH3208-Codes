<?php
session_start();

// Function to prevent CSRF attacks
function generate_csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function check_prod_add_errors() {
    if (isset($_SESSION['prod_add_errors'])) {
        foreach ($_SESSION['prod_add_errors'] as $error) {
            echo '<p class="error">' . htmlspecialchars($error) . '</p>';
        }
        unset($_SESSION['prod_add_errors']);
    }
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
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h3 {
            margin-top: 0;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff; /* Blue color */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3; /* Darker shade of blue on hover */
        }
        input[type="text"],
        input[type="number"],
        select,
        input[type="file"] {
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">

        <h3>Enter product details for addition</h3>
        
        <form action="add_product.inc.php" method="post" enctype="multipart/form-data">
            <input type="text" name="prod_name" placeholder="Product Name" required>
            <input type="number" name="prod_price" placeholder="Product Price" step="0.01" required>
            <input type="text" name="prod_description" placeholder="Product Description" maxlength="200" required>
            
            <label for="prod_gender">Is the product for Men or Women</label>
            <select id="prod_gender" name="prod_gender">
                <option value="men">Men</option>
                <option value="women">Women</option>
            </select>
            <input type="file" name="file" accept="image/*" required>
            <input type="number" name="in_stock" placeholder="Quantity to add" required>

            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
            <button type="submit">Upload</button>
        </form>

        <?php
            check_prod_add_errors();
        ?>
        <br>
                <form action="../employee_homepage.inc.php" method="post">
            <button>Back</button>
        </form>

    </div>
</body>

</html>
