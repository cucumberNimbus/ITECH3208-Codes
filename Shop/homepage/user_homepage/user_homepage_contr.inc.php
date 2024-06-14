<?php

declare(strict_types=1);

function show_cloth_detail(object $pdo, string $gender) {
    $all_rows = get_cloth_detail($pdo, $gender); 
    
    foreach ($all_rows as $row) {
        $prod_name = $row['prod_name'];
        $prod_id = $row['id'];
        $prod_price = floatval($row['prod_price']);
        $prod_description = $row['prod_description'];
        $prod_gender = $row['prod_gender'];
        $prod_image_location = $row['prod_image_location'];
        $image_type = $row['image_type'];
        $in_stock = $row['in_stock'];
        
        echo '<div class="product-card">';
        echo "<img src='$prod_image_location'>";
        echo "<h3>$prod_name</h3>";
        echo "<p><strong>$prod_description</strong></p>";
        echo "<p>Price: $$prod_price</p>";
        if ($in_stock < 1){
            echo '<p> Out of stock</p>';
        } else if ($in_stock >= 1 && $in_stock <= 10) {
            echo '<p> Low stock</p>';
        }
        echo '<form action="add_to_cart.inc.php" method="POST">
                <input type="hidden" name="prod_id" value="'. $prod_id .'">
                <button type="submit">Add to Cart</button>
            </form>';
        echo '<form action="prod_detail.inc.php" method="POST">
            <input type="hidden" name="prod_id" value="'. $prod_id .'">
            <button type="submit">More Details</button>
            </form>';
        echo '</div>';
    }

    $pdo = null;
    $stmt = null;
}

