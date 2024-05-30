<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Employee</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        form {
            margin-bottom: 20px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .alert {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <form action="employee_function/add_product_detail.inc.php" method="post">
        <button>Add Product</button>
    </form>

    <form action="employee_function/remove_product_detail.inc.php" method="post">
        <button>Remove Product</button>
    </form>

    <form action="employee_function/show_alerts.inc.php" method="post">
        <button>Check Alerts</button>
    </form>

    <form action="employee_function/enter_credentials_detail.inc.php" method="post">
        <button>Add Credentials</button>
    </form>

    <form action="user_homepage/profile_settings/logout.inc.php" method="post">
        <button>Log Out</button>
    </form>

    <?php
    check_alerts();
    ?>

</body>

</html>
