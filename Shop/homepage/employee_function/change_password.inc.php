<?php

    $current_password = $_POST["current_password"];
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];

    try {
        require_once 'dbh.inc.php';
        require_once 'change_password_model.inc.php';
        require_once 'change_password_contr.inc.php';

        session_start();

            $user_id = $_SESSION['user_id'];
            $row = get_user_details($pdo, $user_id);

            $errors = []; //error handlers

            if(is_password_wrong($current_password, $row["pwd"])){
                $errors["login_incorrect"] = "Incorrect current password!";
            }
            if (!new_password_match($new_password, $confirm_password)){
                $errors["new_password_match"] = "Confirm password does not match!";
            }

            if ($errors) {
                $_SESSION["errors_password_update"] = $errors;
    
                header("Location: change_password_detail.inc.php");
                die();
            }

            change_password($pdo, $user_id, $new_password);
            header("Location: update_employee_profile.inc.php?changePassword=success");

            $pdo = null;
            $stmt = null;

            die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }