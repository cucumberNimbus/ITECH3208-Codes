<?php

declare(strict_types=1);

session_start();

function check_prod_add_errors()
{
    if (isset($_SESSION['errors_add_prod'])) {
        $errors = $_SESSION['errors_add_prod'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }

        unset($_SESSION['errors_add_prod']);
    } else if (isset($_GET["addProd"]) && $_GET["addProd"] === "success") {
        echo '<br>';
        echo '<p>Product has been added to the database!</p>';
    }
}
