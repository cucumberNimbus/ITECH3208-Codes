<?php

declare(strict_types=1);

session_start();

function check_prod_remove_errors()
{
    if (isset($_SESSION['errors_remove_prod'])) {
        $errors = $_SESSION['errors_remove_prod'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }

        unset($_SESSION['errors_remove_prod']);
    } else if (isset($_GET["removeProd"]) && $_GET["removeProd"] === "success") {
        echo '<br>';
        echo '<p>Product has been deleted from the database!</p>';
    }
}