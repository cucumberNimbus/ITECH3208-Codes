<?php

    $new_address = $_POST["new_delivery_address"];

    try {
        require_once 'dbh.inc.php';
        require_once 'change_delivery_address_model.inc.php';
        require_once 'change_delivery_address_contr.inc.php';

        session_start();

            $user_id = $_SESSION['user_id'];
            change_address($pdo, $user_id, $new_address);

            header("Location: profile_settings_homepage.inc.php?changeAddress=success");

            $pdo = null;
            $stmt = null;
    
            die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
