<?php

declare(strict_types=1);

function get_prod_name(object $pdo, string $prod_name)
{
    $query = "SELECT prod_name FROM prod_detail WHERE prod_name = :prod_name;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":prod_name", $prod_name);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_prod(object $pdo, string $prod_name, string $search_name, float $prod_price, string $prod_description, string $prod_gender, $file_content, $file_type)
{
    $query = "INSERT INTO prod_detail (prod_name, search_name, prod_price, prod_description, prod_gender, image_data, image_type) VALUES (:prod_name, :search_name, :prod_price, :prod_description, :prod_gender, :file_content, :file_type);";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":prod_name", $prod_name);
    $stmt->bindParam(":search_name", $search_name);
    $stmt->bindParam(":prod_price", $prod_price);
    $stmt->bindParam(":prod_description", $prod_description);
    $stmt->bindParam(":prod_gender", $prod_gender);
    $stmt->bindParam(":file_content", $file_content);
    $stmt->bindParam(":file_type", $file_type);
    $stmt->execute();
}

