<?php

declare(strict_types=1);

function is_credentials_set($pdo, $username)
{
    $row = get_email($pdo, $username);

    if ($row["email"] == "not_set"){
        return false;
    } else {
        return true;
    }
}

function is_input_empty(string $email, string $full_name)
{
    if (empty($full_name) || empty($email)) {
        return true;
    } else {
        return false;
    }
}

function add_credentials(object $pdo, string $username, string $email, string $full_name)
{
    set_credentials($pdo, $username, $email, $full_name);
}