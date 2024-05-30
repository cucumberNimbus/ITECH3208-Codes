<?php

    $track_id_string = $_POST["track_id"];
    $track_id = intval($track_id_string);

    try {
        require_once 'dbh.inc.php';
        require_once 'search_order_placed_model.inc.php';
        require_once 'search_order_placed_contr.inc.php';

        //error handlers

        $errors = [];

        if(!order_exist($pdo, $track_id)){
            $errors["no_order"] = "Error!! An order with that tracking ID does not exist!";
        }

        session_start();

        if ($errors) {
            $_SESSION["error_update_tracking"] = $errors;

            header("Location: search_order_placed_details.inc.php");
            die();
        }

        header("Location: update_tracking_info_details.inc.php");

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }