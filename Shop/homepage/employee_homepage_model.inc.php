<?php

declare(strict_types=1);

function fetch_undelivered_orders(object $pdo)
{
    $query = "SELECT order_id, total_price FROM order_placed WHERE delivery_status = 'in progress'";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function fetch_unresolved_messages($pdo)
{
    $query = "SELECT email, message FROM user_messages WHERE status = 'unread'";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function fetch_low_stock_prod(object $pdo)
{
    $threshold = 10;
    $query = "SELECT prod_name, in_stock FROM prod_detail WHERE in_stock <= :threshold";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':threshold', $threshold, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}