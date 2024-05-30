<?php

declare(strict_types=1);

function get_prod_detail(object $pdo, int $prod_id)
{
    $query = "SELECT * FROM prod_detail WHERE id = :prod_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":prod_id", $prod_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}