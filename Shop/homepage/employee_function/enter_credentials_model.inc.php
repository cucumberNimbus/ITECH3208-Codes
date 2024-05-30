<?php

declare(strict_types=1);

function get_email(object $pdo, string $username)
{
    $query = "SELECT email FROM employees WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_credentials(object $pdo, string $username, string $email, string $full_name)
{
    $query = "UPDATE employees SET email = :email, full_name = :full_name WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':full_name', $full_name);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
}

