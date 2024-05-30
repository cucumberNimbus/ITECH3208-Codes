<?php
require_once 'enter_credentials_view.inc.php';
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
        h4 {
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
        button[type="submit"] {
            background-color: #5cb85c;
            color: white;
            border: none;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #4cae4c;
        }
        button[type="button"] {
            background-color: #f0ad4e;
        }
        button[type="button"]:hover {
            background-color: #ec971f;
        }
    </style>
</head>

<body>
    <div class="container">


        <h4>Enter Additional Credentials or Press "Check" to Check if Credentials Have Already Been Added</h4>

        <form action="enter_credentials.inc.php" method="post">
            <input type="text" name="email" placeholder="E-Mail" required>
            <input type="text" name="full_name" placeholder="Full Name" required>
            <button type="submit" name="action" value="add_credentials">Update Credentials</button>
        </form>

        <form action="enter_credentials.inc.php" method="post">
            <button type="submit" name="action" value="check_credentials">Check</button>
        </form>

        <?php
            check_employee_credentials_errors();
        ?>
                <form action="../employee_homepage.inc.php" method="post">
            <button type="button">Back</button>
        </form>
    </div>
</body>

</html>
