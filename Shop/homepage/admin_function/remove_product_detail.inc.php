<?php
session_start();

// Function to prevent CSRF attacks
function generate_csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function check_prod_remove_errors() {
    if (isset($_SESSION['prod_remove_errors'])) {
        foreach ($_SESSION['prod_remove_errors'] as $error) {
            echo '<p class="error">' . htmlspecialchars($error) . '</p>';
        }
        unset($_SESSION['prod_remove_errors']);
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
        input {
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">

        <h3>Enter product name for deletion</h3>
        
        <form action="remove_product.inc.php" method="post">
            <input type="text" name="prod_name_input" placeholder="Product Name" required>   
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
            <button type="submit">Delete</button>
        </form>

        <?php
            check_prod_remove_errors();
        ?>
                <form action="../admin_homepage.inc.php" method="post">
            <button>Back</button>
        </form>
    </div>
</body>

</html>
