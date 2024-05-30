<?php
    include_once 'admin_function/show_alerts_view.inc.php';
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
        <button>Check alerts</button>
    </form>

    <form action="admin_function/inbox_details.inc.php" method="post">
        <button>Inbox</button>
    </form>

    <form action="admin_function/add_employee_details.inc.php" method="post">
        <button>Add employee account</button>
    </form>

    <form action="user_homepage/profile_settings/logout.inc.php" method="post">
        <button>Log out</button>
    </form>

    <form action="admin_function/search_order_placed_details.inc.php" method="post">
        <button>Update tracking info</button>
    </form>

    <?php
        check_alerts();
    ?>

</body>

</html>
