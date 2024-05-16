<?php

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {
        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

        // ERROR HANDLERS
        $errors = [];

        if (is_input_empty($username, $pwd)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        $user_type_employee = get_user_type($pdo, $username);

        if ($user_type_employee == 0) {
            $result = get_user_users($pdo, $username);
        } else if ($user_type_employee == 1) {
            $result = get_user_employees($pdo, $username);
        } else if ($user_type_employee == 3) {
            $errors["login_incorrect"] = "Incorrect username!";
        }

        if ($result && is_password_wrong($pwd, $result["pwd"])){
            $errors["login_incorrect"] = "Incorrect password!";
        }

        session_start();

        if ($errors) {
            $_SESSION["errors_login"] = $errors;

            header("Location: ../index.php");
            die();
        }

        $_SESSION["user_username"] = htmlspecialchars($result["username"]);
        if ($user_type_employee == 0) {
            $_SESSION["user_type"] = "user";
        } else if ($user_type_employee == 1) {
            $_SESSION["user_type"] = "employee";
            header("Location: ../homepage/employee_homepage.inc.php");
            $pdo = null;
            $statement = null;
    
            die();
        }

        if ($username == "admin") {
            header("Location: ../homepage/admin_homepage.inc.php");
        } else {
            header("Location: ../index.php?login=success");
        }

        $pdo = null;
        $statement = null;

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

