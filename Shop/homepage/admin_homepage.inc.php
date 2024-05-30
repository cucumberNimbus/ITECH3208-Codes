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
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        h3 {
            color: #333;
        }
        form {
            margin: 10px 0;
        }
        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <form action="admin_function/add_product_detail.inc.php" method="post">
        <button>Add Product</button>
    </form>

    <form action="admin_function/add_product_inventory_detail.inc.php" method="post">
        <button>Add Product Inventory</button>
    </form>

    <form action="admin_function/remove_product_detail.inc.php" method="post">
        <button>Remove Product</button>
    </form>

    <form action="admin_function/monitor_product_detail.inc.php" method="post">
        <button>Monitor Product</button>
    </form>

    <form action="admin_function/show_alerts.inc.php" method="post">
        <button>Check Alerts</button>
    </form>

    <form action="admin_function/inbox_details.inc.php" method="post">
        <button>Inbox</button>
    </form>

    <form action="admin_function/add_employee_details.inc.php" method="post">
        <button>Add Employee Account</button>
    </form>

    <form action="user_homepage/profile_settings/logout.inc.php" method="post">
        <button>Log Out</button>
    </form>

    <form action="admin_function/search_order_placed_details.inc.php" method="post">
        <button>Update Tracking Info</button>
    </form>

    <?php
        check_alerts();
    ?>

</body>

</html>
