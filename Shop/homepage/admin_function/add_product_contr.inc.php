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

function add_prod(object $pdo, string $prod_name, string $search_name, float $prod_price, string $prod_description, string $prod_gender, $file_content, $file_type)
{
    set_prod($pdo, $prod_name, $search_name, $prod_price, $prod_description, $prod_gender, $file_content, $file_type);
}