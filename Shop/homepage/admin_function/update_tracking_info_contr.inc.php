<?php

declare(strict_types=1);

function is_input_empty(string $new_tracking_info)
{
    if (empty($new_tracking_info)) {
        return true;
    } else {
        return false;
    }
}

function save_new_tracking_info(object $pdo, int $order_id, string $new_tracking_info)
{
    set_new_tracking_information($pdo, $order_id, $new_tracking_info);
}