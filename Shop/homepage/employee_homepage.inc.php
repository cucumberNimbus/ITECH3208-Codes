<?php
    include_once 'employee_function/show_alerts_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Employee </title>
</head>

<body>

    <form action="employee_function/add_product_detail.inc.php" method="post">
        <button>Add Product</button>
    </form>
 
    <form action="employee_function/remove_product_detail.inc.php" method="post">
        <button>Remove Product</button>
    </form>

    <form action="employee_function/show_alerts.inc.php" method="post">
        <button>Check alerts</button>
    </form>

    <form action="employee_function/enter_credentials_detail.inc.php" method="post">
        <button>Add credentials</button>
    </form>

    <?php
        check_errors();
    ?>

</body>

</html>