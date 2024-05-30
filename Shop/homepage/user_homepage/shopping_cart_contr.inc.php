<?php

declare(strict_types=1);

require_once 'shopping_cart_model.inc.php';

session_start();

function display_cart(object $pdo) {
    if (empty($_SESSION['cart'])) {
        echo "<p>Your cart is empty</p>";
    } else {
        $cart = $_SESSION['cart'];
        $placeholders = implode(',', array_fill(0, count($cart), '?'));
        $products = get_cart_prod_detail($pdo, $placeholders, $cart);

        echo '<table border="1">';
        echo '<tr><th>Image</th><th>Name</th><th>Description</th><th>Price</th><th>Quantity</th><th>Total</th><th>Modify</th></tr>';

        $total_price = 0;

        foreach ($products as $product) {
            $prod_id = $product['id'];
            $quantity = $cart[$prod_id];
            $total = $product['prod_price'] * $quantity;
            $total_price += $total;

            echo '<tr>';
            echo '<td><img src="' . htmlspecialchars($product['prod_image_location']) . '" " width="50"></td>';
            echo '<td>' . htmlspecialchars($product['prod_name']) . '</td>';
            echo '<td>' . htmlspecialchars($product['prod_description']) . '</td>';
            echo '<td>$' . htmlspecialchars($product['prod_price']) . '</td>';
            echo '<td>' . $quantity . '</td>';
            echo '<td>$' . $total . '</td>';
            echo '<td>
                <form action="shopping_cart_quantity_modify.inc.php" method="post" style="display:inline;">
                    <input type="hidden" name="prod_id" value="' . $prod_id . '">
                    <button type="submit" name="action" value="increase">+</button>
                </form>
                <form action="shopping_cart_quantity_modify.inc.php" method="post" style="display:inline;">
                    <input type="hidden" name="prod_id" value="' . $prod_id . '">
                    <button type="submit" name="action" value="decrease">-</button>
                </form>
                </td>';
            echo '</tr>';
        }

        echo '<tr>';
        echo '<td colspan="6" style="text-align: right;">Total Price:</td>';
        echo '<td>$' . $total_price . '</td>';
        echo '</tr>';
        echo '</table>';

        if ($_SESSION['user_type'] <> "guest") {
            echo '<form action="place_order.inc.php" method="POST"> 
            <input type="hidden" name="total_price" value="' . $total_price . '">
            <button type="submit">Place Order </button>
            </form>'; //this line shows a "Place Order" button on the webpage that redirects to "place_order.inc.php" page for further processing if they are a user and logged in as a guest
        } elseif ($_SESSION['user_type'] == "guest") {
            echo '<h4>Please enter your delivery and payment details to place an order</h4>';

            echo '<form action="place_order.inc.php" method="post">
            <input type="text" name="guest_delivery_address" placeholder="Delivery Address" required>
            <input type="text" name="guest_payment_details" placeholder="Payment Details" required>
            <input type="hidden" name="total_price" value="' . $total_price . '">
            <button>Place Order</button>
        </form>';

        }
    }

}

function show_card_details(object $pdo) {
    $user_id = $_SESSION['user_id'];
    $result = get_card_details($pdo, $user_id);
    echo $result['payment_details'];
}

function show_delivery_address(object $pdo) {
    $user_id = $_SESSION['user_id'];
    $result = get_delivery_address($pdo, $user_id);
    echo $result['delivery_address'];
}

function check_place_order_errors(){
    if (isset($_SESSION["errors_place_order"])) {
        $errors = $_SESSION["errors_place_order"];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }

        unset($_SESSION['errors_place_order']);
    }
}