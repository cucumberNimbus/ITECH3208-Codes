<?php

    $prod_name_raw = $_POST["prod_name_input"];
    $prod_name_raw_lcase = strtolower($prod_name_raw); //converts product name input to lowercase 
    $search_name = str_replace(" ", "", $prod_name_raw_lcase); //removes spaces between words. This string will be used to search for the product in the database
    $stock_action_var = $_POST["stock_action"];
    $stock_action = intval($stock_action_var); // variable dictates wether to mark the item as in stock or out of stock

    try {
        require_once 'dbh.inc.php';
        require_once 'in_stock_model.inc.php';
        require_once 'in_stock_contr.inc.php';

        //error handlers

        $errors = [];

        if(!prod_exists($pdo, $search_name)){
            $errors["no_prod"] = "Error!! Product name does not exist, please choose another!";
        }

        if(prod_exists($pdo, $search_name) && ($stock_action === 1) && (is_prod_in_stock($pdo, $search_name))) {
            $errors["already_in_stock"] = "Error!! Product has already been marked as in stock";
        }

        if(prod_exists($pdo, $search_name) && ($stock_action === 0) && (!is_prod_in_stock($pdo, $search_name))) {
            $errors["already_out_stock"] = "Error!! Product has already been marked out of stock";
        }

        session_start();

        if ($errors) {
            $_SESSION["errors_mark_prod"] = $errors;

            header("Location: in_stock_detail.inc.php");
            die();
        }

        if($stock_action === 0){
            mark_prod_out($pdo, $search_name);
            header("Location: in_stock_detail.inc.php?markProdOut=success");
        }

        if($stock_action === 1){
            mark_prod_in($pdo, $search_name);
            header("Location: in_stock_detail.inc.php?markProdIn=success");
        }

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }