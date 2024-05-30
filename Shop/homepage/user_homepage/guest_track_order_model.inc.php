<?php

declare(strict_types=1);

function get_order_details(object $pdo, int $track_id)
{
    $query = "SELECT * FROM order_placed WHERE order_id = :track_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":track_id", $track_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}