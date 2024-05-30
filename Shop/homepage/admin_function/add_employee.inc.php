<?php

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {

        require_once 'dbh.inc.php';
        require_once 'add_employee_model.inc.php';
        require_once 'add_employee_contr.inc.php';

        // ERROR HANDLERS
        $errors = [];

        if (is_input_empty($username, $pwd)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        if (is_username_taken($pdo, $username)) {
            $errors["username_taken"] = "Username already taken!";
        }

        session_start();

        if ($errors) {
            $_SESSION["errors_employee_signup"] = $errors;

            header("Location: add_employee_details.inc.php");
            die();
        }

        create_user($pdo, $pwd, $username);

        header("Location: add_employee_details.inc.php?signup=success");

        $pdo = null;
        $stmt = null;

        die();


    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }