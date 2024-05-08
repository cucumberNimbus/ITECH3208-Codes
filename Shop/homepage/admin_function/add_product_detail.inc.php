<?php
require_once 'add_product_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Admin</title>
</head>

<h3> Enter product details for addition </h3>

<body>
    <form action="add_product.inc.php" method="post" enctype="multipart/form-data">
        <input type="text" name="prod_name" placeholder="Product Name" required>
        <input type="number" name="prod_price" placeholder="Product Price" step="0.01" required>
        <input type="text" name="prod_description" placeholder="Product Description" maxlength="200" required>
        
        <label for="prod_gender">Is the product for Men or Women</label>
        <select id="prod_gender" name="prod_gender">
            <option value="men">Men</option>
            <option value="women">Women</option>
        </select>
        <input type="file" name="prod_image" accept="image/*" required>
        <button>upload</button>
    </form>

    <?php
        check_prod_add_errors();
    ?>

</body>

</html>

