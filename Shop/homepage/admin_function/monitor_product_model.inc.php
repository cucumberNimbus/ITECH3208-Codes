<?php

declare(strict_types=1);

function fetch_prod_details(object $pdo, int $prod_id)
{
    $query = "SELECT * FROM prod_detail WHERE id = :id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $prod_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function fetch_all_products_men(object $pdo)
{
    $query = "SELECT id, prod_name FROM prod_detail WHERE prod_gender = 'men';";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $result;
}

function fetch_all_products_women(object $pdo)
{
    $query = "SELECT id, prod_name FROM prod_detail WHERE prod_gender = 'women';";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $result;
}