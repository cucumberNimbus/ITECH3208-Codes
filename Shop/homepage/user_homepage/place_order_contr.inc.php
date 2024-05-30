<?php

declare(strict_types=1);

function get_user_address(object $pdo, int $user_id)
{
    $result = retrieve_user_address($pdo, $user_id);
    return $result['delivery_address'];
}

function add_order_placed(object $pdo, int $user_id, string $user_address, float $total_price)
{
    $result = set_order_placed($pdo, $user_id, $user_address, $total_price);
    return $result;
}

function add_order_placed_guest(object $pdo, string $user_address, float $total_price)
{
    $result = set_order_placed_guest($pdo, $user_address, $total_price);
    return $result;
}

function add_order_details(object $pdo, int $order_id, int $prod_id, int $quantity, float $total)
{
    set_order_details($pdo, $order_id, $prod_id, $quantity, $total);
}

function update_product_details(object $pdo, int $prod_id, int $new_prod_stock, int $new_prod_bought_number)
{
    revise_product_details($pdo, $prod_id, $new_prod_stock, $new_prod_bought_number);
}