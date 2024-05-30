<?php

declare(strict_types=1);

function low_stock_prod_exist(object $pdo)
{

    if (get_low_stock_items($pdo)) {
        return true;
    } else {
        return false;
    }

}

function unread_messages_exist(object $pdo)
{
    if (unread_messages($pdo)) {
        return true;
    } else {
        return false;
    }
}

function save_low_stock_prod(object $pdo)
{
    $low_stock_prod = get_low_stock_items($pdo);
    return $low_stock_prod;
}