<?php

declare(strict_types=1);

function get_new_orders(object $pdo)
{
    $result = fetch_undelivered_orders($pdo);
    return $result;
}

function get_new_messages(object $pdo)
{
    $result = fetch_unresolved_messages($pdo);
    return $result;
}

function get_low_stock_items(object $pdo)
{
    $result = fetch_low_stock_prod($pdo);
    return $result;
}