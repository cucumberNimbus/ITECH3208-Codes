<?php

    $email = $_POST["email"];
    $full_name = $_POST["full_name"];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $dob = $_POST['dob'];

    try {
        require_once 'dbh.inc.php';
        require_once 'enter_credentials_model.inc.php';
        require_once 'enter_credentials_contr.inc.php';

        session_start();
        $username = $_SESSION["user_username"];

        if (isset($_POST["action"])) { 
            $action = $_POST["action"];
        }
        if ($action == "check_credentials"){ //if the user clicked on "update credentials" button, the script to update their credentials will run

            if(is_credentials_set($pdo, $username)){
                $_SESSION["credentials_set"] = "yes";
                
                header("Location: enter_credentials_detail.inc.php");
                die();
            } else if (!is_credentials_set($pdo, $username)){
                $_SESSION["credentials_set"] = "no";
                
                header("Location: enter_credentials_detail.inc.php");
                die();
            }

        } else if ($action == "add_credentials"){ //if the user clicked on "check" button, the script to check if their credentials exists will run
            
            $errors = []; //error handlers

            if (is_input_empty($email, $full_name)) {
                $errors["empty_input"] = "Fill in all fields!";
            }

            if ($errors) {  
                $_SESSION["errors_add_credentials"] = $errors;
    
                header("Location: enter_credentials_detail.inc.php");
                die();
            }

            add_credentials($pdo, $username, $email, $full_name, $address, $phone_number, $dob);

            header("Location: enter_credentials_detail.inc.php?addCredentials=success");

            $pdo = null;
            $stmt = null;
    
            die();

        }

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
