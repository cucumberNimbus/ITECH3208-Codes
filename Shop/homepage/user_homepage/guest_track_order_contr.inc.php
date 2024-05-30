<?php

declare(strict_types=1);

function is_input_empty(string $order_id)
{
    if (empty($order_id)) {
        return true;
    } else {
        return false;
    }
}

function order_exists(object $pdo, int $track_id)
{
    if (get_order_details($pdo, $track_id)) {
        return true;
    } else {
        return false;
    }
}