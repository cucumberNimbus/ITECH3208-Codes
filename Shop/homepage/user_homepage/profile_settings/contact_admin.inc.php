<?php

    $email = $_POST["email"];
    $message = $_POST["message"];

    try {
        require_once 'dbh.inc.php';
        require_once 'contact_admin_model.inc.php';
        require_once 'contact_admin_contr.inc.php';

        // ERROR HANDLERS
        $errors = [];

        if (is_input_empty($email, $message)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email used!";
        }

        session_start();

        if ($errors) {
            $_SESSION["errors_message"] = $errors;

            header("Location: contact_admin_details.inc.php");
            die();
        }

        save_message($pdo, $email, $message);
        header("Location: contact_admin_details.inc.php?sendMessage=success");


        $pdo = null;
        $statement = null;

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }