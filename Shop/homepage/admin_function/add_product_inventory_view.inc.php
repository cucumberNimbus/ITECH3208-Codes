<?php

declare(strict_types=1);

session_start();

function check_update_prod_errors()
{
    if (isset($_SESSION['errors_add_quantity'])) {
        $errors = $_SESSION['errors_add_quantity'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }

        unset($_SESSION['errors_add_quantity']);
    } else if (isset($_GET["updateInventory"]) && $_GET["updateInventory"] === "success") {
        echo '<br>';
        echo '<p>Product quantity has been updated!</p>';
    }
}