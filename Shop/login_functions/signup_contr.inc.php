<?php

declare(strict_types=1);

function is_input_empty(string $username, string $pwd, string $email, string $delivery_address, string $payment_details)
{
    if (empty($username) || empty($pwd) || empty($email) || empty($delivery_address || empty($payment_details))) {
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

function is_username_taken(object $pdo, string $username)
{
    if (get_username_users($pdo, $username)) {
        return true;
    } else if (get_username_employees($pdo, $username)) {
        return true;
    } else {
        return false;
    }
}

function is_email_registered(object $pdo, string $email)
{
    if (get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}

function create_user(object $pdo, string $pwd, string $username, string $email, string $delivery_address, string $payment_details)
{
    set_user($pdo, $pwd, $username, $email, $delivery_address, $payment_details);
}
