<?php

declare(strict_types=1);

function get_cloth_detail(object $pdo, string $gender) {
    $query = "SELECT * FROM prod_detail WHERE prod_gender = :prod_gender;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":prod_gender", $gender);
    $stmt->execute();

    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $result;
}