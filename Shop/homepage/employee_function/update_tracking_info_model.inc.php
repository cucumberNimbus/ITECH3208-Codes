<?php

declare(strict_types=1);

function fetch_all_orders(object $pdo)
{
    $query = "SELECT * FROM order_placed ORDER BY delivery_status ASC, order_date DESC;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function fetch_order_details(object $pdo, int $order_id)
{
    $query = "SELECT * FROM order_placed WHERE order_id = :order_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':order_id', $order_id);
    $stmt->execute();

    $order = $stmt->fetch(PDO::FETCH_ASSOC);
    return $order;

}

function fetch_order_updates(object $pdo, int $order_id)
{
    $query = "SELECT * FROM order_tracking_updates WHERE order_id = :order_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':order_id', $order_id);
    $stmt->execute();

    $order = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $order;

}

function update_order_update(object $pdo, int $order_id, $status, $comment, string $updated_by)
{
    $update_date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO order_tracking_updates (order_id, update_date, status, comment, updated_by) VALUES (?, ?, ?, ?, ?);";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$order_id, $update_date, $status, $comment, $updated_by]);
}

function set_order_as_delivered(object $pdo, int $order_id)
{
    $query = "UPDATE order_placed SET delivery_status = 'delivered' WHERE order_id = :order_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
    $stmt->execute();
}

