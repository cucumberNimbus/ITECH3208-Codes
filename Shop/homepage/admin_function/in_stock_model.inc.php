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

function get_prod_stock(object $pdo, string $search_name)
{
    $query = "SELECT in_stock FROM prod_detail WHERE search_name = :search_name;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":search_name", $search_name);
    $stmt->execute();

    $allResult = $stmt->fetch(PDO::FETCH_ASSOC);
    $result = $allResult["in_stock"];
    var_dump($result); 
    return $result;
}

function adjust_prod_out(object $pdo, string $search_name)
{
    $query = "UPDATE prod_detail SET in_stock = 0 WHERE search_name = :search_name ;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":search_name", $search_name);
    $stmt->execute();
}

function adjust_prod_in(object $pdo, string $search_name)
{
    $query = "UPDATE prod_detail SET in_stock = 1 WHERE search_name = :search_name ;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":search_name", $search_name);
    $stmt->execute();
}