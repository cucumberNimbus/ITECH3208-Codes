<?php

declare(strict_types=1);

function get_user_details(object $pdo, int $user_id)
{
    $result = retrieve_user_details($pdo, $user_id);
    return $result;
}

function is_password_wrong(string $pwd, string $hashedPwd)
{
    if (!password_verify($pwd, $hashedPwd)) {
        return true;
    } else {
        return false;
    }
}

function new_password_match($new_password, $confirm_password)
{
    if ($new_password == $confirm_password) {
        return true;
    } else {
        return false;
    }
}

function change_password(object $pdo, int $user_id, string $new_password)
{
    update_password($pdo, $user_id, $new_password);
}