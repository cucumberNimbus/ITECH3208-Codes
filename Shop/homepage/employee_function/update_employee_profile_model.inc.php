<?php

declare(strict_types=1);

function get_emp_details(object $pdo, int $emp_id)
{
    $query = "SELECT * FROM employees WHERE id = :emp_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":emp_id", $emp_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}