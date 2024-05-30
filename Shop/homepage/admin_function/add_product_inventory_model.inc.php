<?php

declare(strict_types=1);

function get_prod_name(object $pdo, string $search_name)
{
    $query = "SELECT prod_name FROM prod_detail WHERE search_name = :search_name;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":search_name", $search_name);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_inventory(object $pdo, string $search_name, int $new_stock)
{
    $query = "UPDATE prod_detail SET in_stock = :new_stock WHERE search_name = :search_name;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':new_stock', $new_stock);
    $stmt->bindParam(':search_name', $search_name);
    $stmt->execute();
}