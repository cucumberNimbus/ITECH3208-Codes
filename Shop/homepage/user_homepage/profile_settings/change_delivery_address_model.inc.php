<?php

declare(strict_types=1);

function set_address(object $pdo, int $user_id, string $new_address) 
{
    $query = "UPDATE users SET delivery_address = :new_address WHERE id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':new_address', $new_address);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
}