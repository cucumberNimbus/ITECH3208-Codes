<?php

    $total_price = $_POST["total_price"];
    $user_address = $_POST["guest_delivery_address"];
    $guest_payment_details = $_POST["guest_payment_details"];
   
    try {

        require_once 'dbh.inc.php';
        require_once 'place_order_model.inc.php';
        require_once 'place_order_contr.inc.php';

        session_start();

        $errors = []; //error handlers 

        $user_id = $_SESSION['user_id'];
        $cart = $_SESSION['cart'];
        if ($_SESSION['user_type'] == "user") {
            $user_address = get_user_address($pdo, $user_id);
        }

        $placeholders = implode(',', array_fill(0, count($cart), '?'));
        $products = get_cart_prod_detail($pdo, $placeholders, $cart);
        
        foreach ($products as $product) {
            $prod_id = $product['id'];
            $quantity_cart = $cart[$prod_id];
            $quantity_inventory = $product['in_stock'];
            if ($quantity_cart > $quantity_inventory) {
                $errors['error_quantity_insufficient'] = "We only have " . $product['in_stock'] . " of product " . $product['prod_name'];
            }

        } //checks if the quantity in cart is available in stock

        if ($errors) {
            $_SESSION["errors_place_order"] = $errors;

            header("Location: shopping_cart.inc.php");
            die();
        }
        
        if ($_SESSION['user_type'] == "user") {
            $order_id_string = add_order_placed($pdo, $user_id, $user_address, $total_price); //order details is stored in database and new order number is generated
        } else if ($_SESSION['user_type'] == "guest") {
            $order_id_string = add_order_placed_guest($pdo, $user_address, $total_price); //order details is stored in database and new order number is generated
        }
            $order_id = intval($order_id_string);
         
        foreach ($products as $product) {
            $prod_id = $product['id'];
            $quantity = $cart[$prod_id];
            $total = $product['prod_price'] * $quantity;

            add_order_details($pdo, $order_id, $prod_id, $quantity, $total); //individual products of order details is stored

            $new_prod_stock = $product['in_stock'] - $quantity;
            $new_prod_bought_number = $product['number_bought'] + $quantity;

            update_product_details($pdo, $prod_id, $new_prod_stock, $new_prod_bought_number); //product details is updated with new inventory numbers and new performance metrics 
        }
        
        $_SESSION['guest_order_id'] = $order_id;

        $pdo = null;
        $statement = null;
        unset($_SESSION['cart']);

        header("location: order_detail.inc.php?recentOrder=yes");
        die();


    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }