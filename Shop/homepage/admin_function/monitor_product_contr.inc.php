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

function get_prod_data(object $pdo, string $search_name)
{
    $result = retrieve_prod_data($pdo, $search_name);
    return $result;
}
