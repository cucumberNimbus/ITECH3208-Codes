<?php

    $new_tracking_info = $_POST["tracking_update_text"];

    try {
        require_once 'dbh.inc.php';
        require_once 'update_tracking_info_model.inc.php';
        require_once 'update_tracking_info_contr.inc.php';

        $errors = []; //error handlers

        if (is_input_empty($new_tracking_info)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        session_start();

        if ($errors) {
            $_SESSION["errors_tracking_update"] = $errors;

            header("Location: update_tracking_info_details.inc.php");
            die();
        }

        $order_id = $_SESSION['order_update_id'];
        save_new_tracking_info($pdo, $order_id, $new_tracking_info);

        unset($_SESSION['order_update_id']);

        header("Location: update_tracking_info_details.inc.php?update=success");

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }