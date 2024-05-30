<?php

declare(strict_types=1);

function set_new_tracking_information(object $pdo, int $order_id, string $new_tracking_info)
{
    $query = "UPDATE order_placed SET order_status = :new_tracking_info WHERE order_id = :order_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':new_tracking_info', $new_tracking_info);
    $stmt->bindParam(':order_id', $order_id);
    $stmt->execute();
}