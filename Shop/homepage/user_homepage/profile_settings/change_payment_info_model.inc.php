<?php

declare(strict_types=1);

function set_payment(object $pdo, int $user_id, string $new_payment) 
{
    $query = "UPDATE users SET payment_details = :new_payment WHERE id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':new_payment', $new_payment);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
}