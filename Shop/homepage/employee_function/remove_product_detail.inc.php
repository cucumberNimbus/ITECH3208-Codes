<?php
require_once 'remove_product_view.inc.php';
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

    <form action="../employee_homepage.inc.php" method="post">
        <button>Back</button>
    </form>

    <h3> Enter product name for deletion </h3>
    
    <form action="remove_product.inc.php" method="post">
        <input type="text" name="prod_name_input" placeholder="Product Name" required>   
        <button>Delete</button>
    </form>

    <?php
        check_prod_remove_errors();
    ?>

</body>

</html>