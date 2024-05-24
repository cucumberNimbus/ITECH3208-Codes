<?php

declare(strict_types=1);

function get_order_details(object $pdo, int $user_id) {
    $query = "SELECT * FROM order_placed WHERE user_id = :user_id ORDER BY order_date DESC;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_ordered_item_details(object $pdo, int $order_id){
    $query = "SELECT * FROM order_detail WHERE order_id = :order_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":order_id", $order_id, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_inventory_detail(object $pdo, int $item_id) {
    $query = "SELECT * FROM prod_detail WHERE id = :item_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":item_id", $item_id, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}