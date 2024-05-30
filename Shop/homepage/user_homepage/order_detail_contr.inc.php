<?php

declare(strict_types=1);

require_once 'order_detail_model.inc.php';

session_start();

function show_order_number(object $pdo) {

    $user_id = $_SESSION['user_id'];
    $order_details = get_order_details($pdo, $user_id);
    echo $order_details['order_id'];
}

function show_order_date(object $pdo) {
    $user_id = $_SESSION['user_id'];
    $order_details = get_order_details($pdo, $user_id);
    echo $order_details['order_date'];
}

function show_order_date_guest(object $pdo, int $guest_order_id) {
    $order_details = get_order_details_guest($pdo, $guest_order_id);
    echo $order_details['order_date'];
}

function show_order_amount(object $pdo) {
    $user_id = $_SESSION['user_id'];
    $order_details = get_order_details($pdo, $user_id);
    echo $order_details['total_price'];
}

function show_order_amount_guest(object $pdo, int $guest_order_id) {
    $order_details = get_order_details_guest($pdo, $guest_order_id);
    echo $order_details['total_price'];
}

function show_shipping_address(object $pdo) {
    $user_id = $_SESSION['user_id'];
    $order_details = get_order_details($pdo, $user_id);
    echo $order_details['user_address'];
}

function show_shipping_address_guest(object $pdo, int $guest_order_id) {
    $order_details = get_order_details_guest($pdo, $guest_order_id);
    echo $order_details['user_address'];
}

function show_order_summary(object $pdo) {
    if ($_SESSION['user_type'] == "user"){
        $user_id = $_SESSION['user_id'];
        $order_details = get_order_details($pdo, $user_id);
    } else if ($_SESSION['user_type'] == "guest"){
        $order_details = get_order_details_guest($pdo, $_SESSION['guest_order_id']);
    }
    $order_id = $order_details['order_id'];
    $purchased_items = get_ordered_item_details($pdo, $order_id); //details of each purchased item

    echo '<table border="1">';
    echo '<tr><th>Image</th><th>Name</th><th>Price</th><th>Quantity</th><th>Total</th></tr>';

    $total_price = $order_details['total_price'];

    foreach ($purchased_items as $purchased_item) {
        $item_id = $purchased_item['prod_id'];
        $inventory_detail = get_inventory_detail($pdo, $item_id);
        echo '<tr>';
        echo '<td><img src="' . htmlspecialchars($inventory_detail['prod_image_location']) . '" " width="50"></td>';
        echo '<td>' . htmlspecialchars($inventory_detail['prod_name']) . '</td>';
        echo '<td>' . htmlspecialchars($inventory_detail['prod_price']) . '</td>';
        echo '<td>' . $purchased_item['quantity'] . '</td>';
        echo '<td>$' . htmlspecialchars($purchased_item['total_price']) . '</td>';
    }
    echo '</table>';

}
