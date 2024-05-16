<?php

declare(strict_types=1);

function is_prod_name_taken(object $pdo, string $prod_name)
{
    if (get_prod_name($pdo, $prod_name)) {
        return true;
    } else {
        return false;
    }
}

function add_prod(object $pdo, string $prod_name, string $search_name, float $prod_price, string $prod_description, string $prod_gender, string $file_destination, $file_type, int $in_stock)
{
    set_prod($pdo, $prod_name, $search_name, $prod_price, $prod_description, $prod_gender, $file_destination, $file_type, $in_stock);
}