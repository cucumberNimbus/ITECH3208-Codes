<?php

declare(strict_types=1);

function is_input_empty(string $username, string $pwd)
{
    if (empty($username) || empty($pwd)) {
        return true;
    } else {
        return false;
    }
}

function is_password_wrong(string $pwd, string $hashedPwd)
{
    if (!password_verify($pwd, $hashedPwd)) {
        return true;
    } else {
        return false;
    }
}

function get_user_type(object $pdo, string $username)
{
    if (get_user_users($pdo, $username)){
        return 0;
    } else if (get_user_employees($pdo, $username)) {
        return 1;
    } else {
        return 3;
    }
}
