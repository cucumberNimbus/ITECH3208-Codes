<?php

declare(strict_types=1);

function show_order_confirmation_message() {
    if (isset($_GET['recentOrder']) && $_GET['recentOrder'] === "yes") {
        echo '<br>';
        echo '<h5><p>Your order has been confirmed!!</p></h5>';
    }
}