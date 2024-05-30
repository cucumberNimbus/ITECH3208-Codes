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