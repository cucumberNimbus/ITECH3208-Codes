<?php
session_start();

// Function to prevent CSRF attacks
function generate_csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function check_employee_credentials_errors() {
    if (isset($_SESSION['employee_credentials_errors'])) {
        foreach ($_SESSION['employee_credentials_errors'] as $error) {
            echo '<p class="error">' . htmlspecialchars($error) . '</p>';
        }
        unset($_SESSION['employee_credentials_errors']);
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
    <title>Employee Credentials</title>
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
        h4 {
            margin-top: 0;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3; /* Darker shade of blue on hover */
        }
        input[type="text"] {
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
      
        <h4>Enter additional credentials or press "check" to check if credentials have already been added</h4>

        <form action="enter_credentials.inc.php" method="post">
            <input type="text" name="email" placeholder="E-Mail" required>
            <input type="text" name="full_name" placeholder="Full Name" required>
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
            <button type="submit" name="action" value="add_credentials">Update credentials</button>
            <br>
        </form>
        <br>

        <form action="enter_credentials.inc.php" method="post">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
            <button type="submit" name="action" value="check_credentials">Check</button>
        </form>
        <br>

        <?php
            check_employee_credentials_errors();
        ?>
          <form action="../employee_homepage.inc.php" method="post">
            <button>Back</button>
        </form>
    </div>
</body>

</html>
