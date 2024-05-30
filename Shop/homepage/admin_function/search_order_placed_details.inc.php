<?php
session_start();

// Function to prevent CSRF attacks
function generate_csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function check_search_order_errors() {
    if (isset($_SESSION['search_order_errors'])) {
        foreach ($_SESSION['search_order_errors'] as $error) {
            echo '<p class="error">' . htmlspecialchars($error) . '</p>';
        }
        unset($_SESSION['search_order_errors']);
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
    <title>Update tracking information</title>
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
        <form action="../admin_homepage.inc.php" method="post">
            <button>Back</button>
        </form>
        <h3>Enter tracking ID to update tracking information</h3>
        
        <form action="search_order_placed.inc.php" method="post">
            <input type="text" name="track_id" placeholder="Track ID" required>
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
            <button type="submit">Search</button>
        </form>

        <?php
            check_search_order_errors();
        ?>
    </div>
</body>

</html>
