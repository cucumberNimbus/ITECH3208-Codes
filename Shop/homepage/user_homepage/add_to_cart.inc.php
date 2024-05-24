<?php

    $prod_id = $_POST["prod_id"];

    try {
        require_once 'dbh.inc.php';

        session_start();

        //the details of products added to the shopping cart are stored in a global variable named 'cart'
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        if (isset($_SESSION['cart'][$prod_id])) {
        // If the product is already in the cart, the quantity of the product in the cart will increase by 1
            $_SESSION['cart'][$prod_id]++;
            header("Location: user_homepage.inc.php?cartAction=one");
            die();
        } else {
        // If the product is not in the cart, the product will be added to the cart with default quantity of 1
            $_SESSION['cart'][$prod_id] = 1;
            header("Location: user_homepage.inc.php?cartAction=two");
            die();
        }

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
