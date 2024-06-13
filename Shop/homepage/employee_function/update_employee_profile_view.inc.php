<?php

declare(strict_types=1);

function show_profile_alert()
{
    if (isset($_GET["changePassword"]) && $_GET["changePassword"] === "success") {
    echo '<br>';
    echo '<p>Your password has been changed!</p>';
}
}