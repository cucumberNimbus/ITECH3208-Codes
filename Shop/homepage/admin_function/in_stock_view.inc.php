<?php

declare(strict_types=1);

session_start();

function check_prod_mark_errors()
{
    if (isset($_SESSION['errors_mark_prod'])) {
        $errors = $_SESSION['errors_mark_prod'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }

        unset($_SESSION['errors_mark_prod']);

    } else if (isset($_GET["markProdIn"]) && $_GET["markProdIn"] === "success") {
        echo '<br>';
        echo '<p>Product has been marked as available!</p>';

    } else if (isset($_GET["markProdOut"]) && $_GET["markProdOut"] === "success") {
        echo '<br>';
        echo '<p>Product has been marked as unavailable!</p>';
    }
}