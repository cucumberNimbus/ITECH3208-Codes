<?php

declare(strict_types=1);

function get_low_stock_items(object $pdo)
{
    $query = "SELECT prod_name FROM prod_detail WHERE in_stock < 10;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;

}

function unread_messages(object $pdo)
{
    $query = "SELECT * FROM user_messages WHERE status = 'unread';";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}