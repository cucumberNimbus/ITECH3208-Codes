<?php
require_once 'add_product_inventory_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Admin</title>
</head>

<body>
    <form action="../admin_homepage.inc.php" method="post">
        <button>Back</button>
    </form>
    <h3> Add product inventory </h3>

    <form action="add_product_inventory.inc.php" method="post">
        <h4> 
        <input type="text" name="prod_name" placeholder="Product Name" required>

        <input type="number" name="new_stock" placeholder="New total stock" required>
        <button>Update</button>
    </form>

    <?php
        check_update_prod_errors();
    ?>

</body>

</html>