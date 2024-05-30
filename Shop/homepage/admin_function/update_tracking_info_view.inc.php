<?php

declare(strict_types=1);

session_start();

function check_tracking_info_update_errors()
{
    if (isset($_SESSION['errors_update_tracking_information'])) {
        $errors = $_SESSION['errors_update_tracking_information'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }

        unset($_SESSION['errors_update_tracking_information']);

    } else if (isset($_GET["update"]) && $_GET["update"] === "success") {
        echo '<p> Tracking details have been updated </p>';
    }
}