<?php

declare(strict_types=1);

function is_input_empty(string $email, string $message)
{
    if (empty($email) || empty($message)) {
        return true;
    } else {
        return false;
    }
}

function is_email_invalid(string $email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function save_message(object $pdo, string $email, string $message)
{
    set_message($pdo, $email, $message);
}