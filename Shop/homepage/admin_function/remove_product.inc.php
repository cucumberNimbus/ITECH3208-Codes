<?php

    $prod_name_raw = $_POST["prod_name_input"];
    $prod_name_raw_lcase = strtolower($prod_name_raw); //converts product name input to lowercase 
    $search_name = str_replace(" ", "", $prod_name_raw_lcase); //removes spaces between words. This string will be used to search for the product in the database


    try {
        require_once 'dbh.inc.php';
        require_once 'remove_product_model.inc.php';
        require_once 'remove_product_contr.inc.php';

        //error handlers

        $errors = [];

        if(!prod_exists($pdo, $search_name)){
            $errors["no_prod"] = "Product name does not exist, please choose another!";
        }

        session_start();

        if ($errors) {
            $_SESSION["errors_remove_prod"] = $errors;

            header("Location: remove_product_detail.inc.php");
            die();
        }

        remove_prod($pdo, $search_name);

        header("Location: remove_product_detail.inc.php?removeProd=success");

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }