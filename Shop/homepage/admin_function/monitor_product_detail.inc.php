<?php
require_once 'monitor_product_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitor Product</title>
</head>



<body>
    <form action="../admin_homepage.inc.php" method="post">
        <button>Back</button>
    </form>

    <h3> Enter product name to monitor </h3>
    
    <form action="monitor_product.inc.php" method="post">
        <input type="text" name="prod_name_input" placeholder="Product Name" required>
        <button>Details</button>
    </form>

    <?php
        check_monitor_prod_errors();
    ?>

</body>

</html>

