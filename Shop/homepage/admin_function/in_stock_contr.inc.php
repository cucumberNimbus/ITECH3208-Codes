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

function is_prod_in_stock(object $pdo, string $search_name)
{
    if (get_prod_stock($pdo, $search_name) == 1) {
        return true;
    } else {
        return false;
    }
}

function mark_prod_out(object $pdo, string $search_name)
{
    adjust_prod_out($pdo, $search_name);
}

function mark_prod_in(object $pdo, string $search_name)
{
    adjust_prod_in($pdo, $search_name);
}