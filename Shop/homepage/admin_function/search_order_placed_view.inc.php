<?php

declare(strict_types=1);

session_start();

function check_search_order_errors()
{
    if (isset($_SESSION['error_update_tracking'])) {
        $errors = $_SESSION['error_update_tracking'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }

        unset($_SESSION['error_update_tracking']);

    }
}