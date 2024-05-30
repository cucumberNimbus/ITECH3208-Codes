<?php

    $order_id = $_POST["order_id"];

    try {
        require_once 'dbh.inc.php';
        require_once 'guest_track_order_model.inc.php';
        require_once 'guest_track_order_contr.inc.php';

        $errors = []; //error handlers

        if (is_input_empty($order_id)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        
        if (!order_exists($pdo, $order_id)) {
            $errors["invalid_input"] = "No order with that tracking ID exists!";
        }

        session_start();

        if ($errors) {
            $_SESSION["errors_guest_order_id"] = $errors;

            header("Location: guest_track_order_details.inc.php");
            die();
        }

        $_SESSION['guest_order_id'] = $order_id;

        header("Location: order_detail.inc.php");

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }