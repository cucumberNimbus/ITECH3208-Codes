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

function set_credentials(object $pdo, string $username, string $email, string $full_name, string $address, string $phone_number, string $dob)
{
    $query = "UPDATE employees SET email = :email, full_name = :full_name, address = :address, phone_number = :phone_number, dob = :dob WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':full_name', $full_name);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':phone_number', $phone_number);
    $stmt->bindParam(':dob', $dob);
    $stmt->execute();
}

