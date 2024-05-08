<?php

declare(strict_types=1);

session_start();

function check_monitor_prod_errors()
{
    if (isset($_SESSION['errors_monitor_prod'])) {
        $errors = $_SESSION['errors_monitor_prod'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }

        unset($_SESSION['errors_monitor_prod']);

    }  else if (isset($_GET["getProdData"]) && $_GET["getProdData"] === "success") {
        echo '<br>';
        echo 'Product ID: ' . $_SESSION["monitor_prod_id"] . '<br>';
        echo 'Product name: ' . $_SESSION["monitor_prod_name"] . '<br>';
        echo 'Product price: $' . $_SESSION["monitor_prod_price"] . '<br>';
        echo 'Product description: ' . $_SESSION["monitor_prod_description"] . '<br>';
        echo 'Product gender: ' . $_SESSION["monitor_prod_gender"] . '<br>';

        if ($_SESSION["monitor_prod_stock"] == 1){
            echo 'Product availability: In stock <br>';
        } else if ($_SESSION["monitor_prod_stock"] == 0){
            echo 'Product availability: Out of stock <br>';
        }
        echo 'Number of times product was bought: ' . $_SESSION["monitor_prod_bought"] . '<br>';
        echo 'Number of times product was viewed: ' . $_SESSION["monitor_prod_viewed"] . '<br>';

        echo 'Photo of the product: ' . '<br>';
        $image = $_SESSION["monitor_prod_image"];
        echo '<img src="data:image/jpeg;base64,'.base64_encode($image).'"/><br>';
        var_dump($_SESSION["monitor_prod_image"]);

        unset($_SESSION["monitor_prod_id"]);
        unset($_SESSION["monitor_prod_name"]);
        unset($_SESSION["monitor_prod_price"]);
        unset($_SESSION["monitor_prod_description"]);
        unset($_SESSION["monitor_prod_gender"]);
        unset($_SESSION["monitor_prod_stock"]);
        unset($_SESSION["monitor_prod_bought"]);
        unset($_SESSION["monitor_prod_viewed"]);
        unset($_SESSION["monitor_prod_image"]);
    }
}