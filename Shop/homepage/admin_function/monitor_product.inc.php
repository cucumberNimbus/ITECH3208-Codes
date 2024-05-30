<?php

    $prod_name_raw = $_POST["prod_name_input"];
    $prod_name_raw_lcase = strtolower($prod_name_raw); //converts product name input to lowercase 
    $search_name = str_replace(" ", "", $prod_name_raw_lcase); //removes spaces between words. This string will be used to search for the product in the database

    try {
        require_once 'dbh.inc.php';
        require_once 'monitor_product_model.inc.php';
        require_once 'monitor_product_contr.inc.php';

        //error handlers

        $errors = [];

        if(!prod_exists($pdo, $search_name)){
            $errors["no_prod"] = "Error!! Product name does not exist, please choose another!";
        }

        session_start();

        if ($errors) {
            $_SESSION["errors_monitor_prod"] = $errors;

            header("Location: monitor_product_detail.inc.php");
            die();
        }

        $result = get_prod_data($pdo, $search_name);
        $_SESSION["monitor_prod_id"] = $result["id"];
        $_SESSION["monitor_prod_name"] = $result["prod_name"];
        $_SESSION["monitor_prod_price"] = $result["prod_price"];
        $_SESSION["monitor_prod_description"] = $result["prod_description"];
        $_SESSION["monitor_prod_gender"] = $result["prod_gender"];
        $_SESSION["monitor_prod_stock"] = $result["in_stock"];
        $_SESSION["monitor_prod_bought"] = $result["number_bought"];
        $_SESSION["monitor_prod_viewed"] = $result["number_viewed"];

        $_SESSION["monitor_prod_image_location"] = $result["prod_image_location"];
        $_SESSION["monitor_prod_image_type"] = $result["image_type"];

        header("Location: monitor_product_detail.inc.php?getProdData=success");

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }