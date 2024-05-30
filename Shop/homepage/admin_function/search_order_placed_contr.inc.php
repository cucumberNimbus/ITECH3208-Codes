<?php

declare(strict_types=1);

function order_exist(object $pdo, int $track_id)
{
    if (get_order_details($pdo, $track_id)) {
        return true;
    } else {
        return false;
    }
}