<?php

declare(strict_types=1);

function get_cart_prod_detail(object $pdo, $placeholders, $cart) {
    $query = "SELECT * FROM prod_detail WHERE id IN ($placeholders)";
    $stmt = $pdo->prepare($query);
    $stmt->execute(array_keys($cart));

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_card_details(object $pdo, int $user_id) {
   
    $query = "SELECT payment_details FROM users WHERE id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();


    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_delivery_address(object $pdo, int $user_id) {
    $query = "SELECT delivery_address FROM users WHERE id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

