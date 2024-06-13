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

//

function get_all_orders(object $pdo)
{
    $result = fetch_all_orders($pdo);
    return $result;
}

function get_order_details(object $pdo, int $order_id)
{
    $result = fetch_order_details($pdo, $order_id);
    return $result;
}

function get_order_updates(object $pdo, int $order_id)
{
    $result = fetch_order_updates($pdo, $order_id);
    return $result;
}

function add_order_update(object $pdo, int $order_id, $status, $comment, string $updated_by)
{
    update_order_update($pdo, $order_id, $status, $comment, $updated_by);
}

function mark_order_as_delivered(object $pdo, int $order_id)
{
    set_order_as_delivered($pdo, $order_id);
}
