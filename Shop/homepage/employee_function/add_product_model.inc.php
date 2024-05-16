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

function set_prod(object $pdo, string $prod_name, string $search_name, float $prod_price, string $prod_description, string $prod_gender, string $file_destination, $file_type, int $in_stock)
{
    $query = "INSERT INTO prod_detail (prod_name, search_name, prod_price, prod_description, prod_gender, prod_image_location, image_type, in_stock) VALUES (:prod_name, :search_name, :prod_price, :prod_description, :prod_gender, :prod_image_location, :image_type, :in_stock);";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":prod_name", $prod_name);
    $stmt->bindParam(":search_name", $search_name);
    $stmt->bindParam(":prod_price", $prod_price);
    $stmt->bindParam(":prod_description", $prod_description);
    $stmt->bindParam(":prod_gender", $prod_gender);
    $stmt->bindParam(":prod_image_location", $file_destination);
    $stmt->bindParam(":image_type", $file_type);
    $stmt->bindParam(":in_stock", $in_stock);
    $stmt->execute();
}

