<?php

declare(strict_types=1);

session_start();

function check_employee_credentials_errors()
{
    if (isset($_SESSION['credentials_set']) && $_SESSION['credentials_set'] == "yes") {
        echo '<p> Credentials have already been set! You can enter new credentials to update existing credentials</p>';

        unset($_SESSION['credentials_set']);
    } else if (isset($_SESSION['credentials_set']) && $_SESSION['credentials_set'] == "no") {
        echo "<br> Credentials have not been set. Please set new credentials!";

        unset($_SESSION['credentials_set']);
    } else if (isset($_SESSION['errors_add_credentials'])) {
        $errors = $_SESSION['errors_add_credentials'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }

        unset($_SESSION['errors_add_credentials']);
    } else if (isset($_GET["addCredentials"]) && $_GET["addCredentials"] === "success") {
        echo '<br>';
        echo '<p>Your credentials have been updated!</p>';
    }

}
