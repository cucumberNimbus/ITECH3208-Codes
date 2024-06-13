<?php

declare(strict_types=1);

function prod_exists(object $pdo, string $search_name)
{
    if (get_prod_name($pdo, $search_name)) {
        return true;
    } else {
        return false;
    }
}

function update_inventory(object $pdo, string $search_name, int $new_stock)
{
    set_inventory($pdo, $search_name, $new_stock);
}

function get_prod_details(object $pdo, int $prod_id)
{
    $product = fetch_prod_details($pdo, $prod_id);
    return $product;
} 

function get_all_products_men(object $pdo)
{
    $all_products = fetch_all_products_men($pdo);
    return $all_products;
}

function get_all_products_women(object $pdo)
{
    $all_products = fetch_all_products_women($pdo);
    return $all_products;
}