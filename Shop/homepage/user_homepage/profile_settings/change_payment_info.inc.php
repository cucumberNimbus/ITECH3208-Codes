<?php

    $new_payment = $_POST["new_payment"];

    try {
        require_once 'dbh.inc.php';
        require_once 'change_payment_info_model.inc.php';
        require_once 'change_payment_info_contr.inc.php';

        session_start();

            $user_id = $_SESSION['user_id'];
            change_payment($pdo, $user_id, $new_payment);

            header("Location: profile_settings_homepage.inc.php?changePayment=success");

            $pdo = null;
            $stmt = null;
    
            die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
