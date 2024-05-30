<?php

declare(strict_types=1);

session_start();

function check_message_errors()
{
    if (isset($_SESSION["errors_message"])) {
        $errors = $_SESSION["errors_message"];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }

        unset($_SESSION['errors_message']);
    } else if (isset($_GET['sendMessage']) && $_GET['sendMessage'] === "success") {
        echo '<br>';
        echo '<p>Your message has been sent to the administrator! Please wait upto 3-4 business days for a response in your email address!</p>';
    }
}