<?php

declare(strict_types=1);

function retrieve_user_address(object $pdo, int $user_id)
{
    $query = "SELECT delivery_address FROM users WHERE id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();


    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_order_placed(object $pdo, int $user_id, string $user_address, float $total_price)
{
    $query = "INSERT INTO order_placed (user_id, user_address, total_price) VALUES (:user_id, :user_address, :total_price);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":user_address", $user_address);
    $stmt->bindParam(":total_price", $total_price);
    $stmt->execute();

    $result = $pdo->lastInsertId();
    return $result;
}

function set_order_details(object $pdo, int $order_id, int $prod_id, int $quantity, float $total)
{
    $query = "INSERT INTO order_detail (order_id, prod_id, quantity, total_price) VALUES (:order_id, :prod_id, :quantity, :total);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":order_id", $order_id);
    $stmt->bindParam(":prod_id", $prod_id);
    $stmt->bindParam(":quantity", $quantity);
    $stmt->bindParam(":total", $total);
    $stmt->execute();

    $result = $pdo->lastInsertId();
    return $result;
}

function revise_product_details(object $pdo, int $prod_id, int $new_prod_stock, int $new_prod_bought_number)
{
    $query = "UPDATE prod_detail SET in_stock = :new_prod_stock, number_bought = :new_prod_bought_number  WHERE id = :prod_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':new_prod_stock', $new_prod_stock);
    $stmt->bindParam(':new_prod_bought_number', $new_prod_bought_number);
    $stmt->bindParam(':prod_id', $prod_id);
    $stmt->execute();
}

function get_cart_prod_detail(object $pdo, $placeholders, $cart) {
    $query = "SELECT * FROM prod_detail WHERE id IN ($placeholders)";
    $stmt = $pdo->prepare($query);
    $stmt->execute(array_keys($cart));

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}