<?php

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];
    $delivery_address = $_POST["delivery_address"];
    $payment_details = $_POST["payment_details"];

    try {

        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        // ERROR HANDLERS
        $errors = [];

        if (is_input_empty($username, $pwd, $email, $delivery_address, $payment_details)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email used!";
        }
        if (is_username_taken($pdo, $username)) {
            $errors["username_taken"] = "Username already taken!";
        }
        if (is_email_registered($pdo, $email)) {
            $errors["email_used"] = "Email already registered!";
        }

        session_start();

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;

            header("Location: ../login_signup.inc.php");
            die();
        }

        create_user($pdo, $pwd, $username, $email, $delivery_address, $payment_details);

        header("Location: ../login_signup.inc.php?signup=success");

        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
