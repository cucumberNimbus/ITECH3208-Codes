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

function delete_prod(object $pdo, string $search_name)
{
    $query = "DELETE FROM prod_detail WHERE search_name = :search_name ;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":search_name", $search_name);
    $stmt->execute();
}

function get_prod_image_location(object $pdo, string $search_name)
{
    $query = "SELECT prod_image_location FROM prod_detail WHERE search_name = :search_name;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":search_name", $search_name);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}