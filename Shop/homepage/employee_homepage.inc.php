<?php
    require_once 'employee_function/show_alerts_view.inc.php';
?>

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
            margin: 0;
            padding: 0;
            background-color: #f0f5f5;
        }
        form {
            margin: 10px 0;
        }
        button {
            background-color: #1e90ff;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            margin-right: 10px;
        }
        button:hover {
            background-color: #4169e1;
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
