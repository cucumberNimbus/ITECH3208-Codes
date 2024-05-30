<?php

session_start(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prod_id = $_POST['prod_id'];
    $action = $_POST['action'];

    if (isset($_SESSION['cart'][$prod_id])) {
        if ($action == 'increase') {
            $_SESSION['cart'][$prod_id]++;
        } else if ($action == 'decrease') {
            $_SESSION['cart'][$prod_id]--;
            if ($_SESSION['cart'][$prod_id] <= 0) {
                unset($_SESSION['cart'][$prod_id]);
            }
        }
    }

    header('Location: shopping_cart.inc.php');
    exit;
}
