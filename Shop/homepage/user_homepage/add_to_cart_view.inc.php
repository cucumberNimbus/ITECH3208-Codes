<?php

declare(strict_types=1);

session_start();

function check_cart_status()
{
    if (isset($_GET['cartAction']) && $_GET['cartAction'] === "one") {
        echo '<br>';
        echo '<p>Item is already in cart. Quantity has been increaded</p>';
    } else if (isset($_GET['cartAction']) && $_GET['cartAction'] === "two") {
        echo '<br>';
        echo '<p>Item has been added to cart</p>';
    }
}
