<?php

declare(strict_types=1);

function set_message(object $pdo, string $email, string $message)
{
    $query = "INSERT INTO user_messages (email, message) VALUES (:email, :message);";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":message", $message);
    $stmt->execute();
}