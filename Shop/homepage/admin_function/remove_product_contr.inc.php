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

function remove_prod(object $pdo, string $search_name)
{
    delete_prod($pdo, $search_name);
}

function get_image_location(object $pdo, string $search_name)
{
    return get_prod_image_location($pdo, $search_name);
}