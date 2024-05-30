<?php

declare(strict_types=1);

session_start();

function change_password_error()
{
    if (isset($_SESSION['errors_password_update'])) {
        $errors = $_SESSION['errors_password_update'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }

        unset($_SESSION['errors_password_update']);
    }
}
