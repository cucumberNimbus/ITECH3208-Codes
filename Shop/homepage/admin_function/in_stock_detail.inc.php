<?php
require_once 'in_stock_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark out of stock</title>
</head>

<h3> Enter product name </h3>

<body>
    <form action="in_stock.inc.php" method="post">
        <input type="text" name="prod_name_input" placeholder="Product Name" required>
        <label for="stock_action">Is the product to be marked in stock or out of stock?</label>
        <select id="stock_action" name="stock_action">
            <option value="1">In stock</option>
            <option value="0">Out of stock</option>
        </select>
        <button>Mark</button>
    </form>

    <?php
        check_prod_mark_errors();
    ?>

</body>

</html>

