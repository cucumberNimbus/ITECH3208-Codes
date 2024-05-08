<?php

    $prod_name = $_POST["prod_name"];
    $prod_price_string = $_POST['prod_price'];
    $prod_price = (float)$prod_price_string;
    $prod_description = $_POST["prod_description"];
    $prod_gender = $_POST["prod_gender"];
    $file_tmp_name = $_FILES["prod_image"]["tmp_name"];
    $file_type = $_FILES["prod_image"]["type"];

    $search_name_lcase = strtolower($prod_name); //converts product name input to lowercase 
    $search_name = str_replace(" ", "", $search_name_lcase); //removes spaces between words. This string will be stored in the database to make searching the item easier 

    $file_content = addslashes(file_get_contents($file_tmp_name));

    try {
        require_once 'dbh.inc.php';
        require_once 'add_product_model.inc.php';
        require_once 'add_product_contr.inc.php';

        //error handlers

        $errors = [];
       
        if(is_prod_name_taken($pdo, $prod_name)){
            $errors["prod_name_taken"] = "Product name taken, please choose another";
        }

        session_start();

        if ($errors) {
            $_SESSION["errors_add_prod"] = $errors;

            header("Location: add_product_detail.inc.php");
            die();
        }

        add_prod($pdo, $prod_name, $search_name, $prod_price, $prod_description, $prod_gender, $file_content, $file_type);

        header("Location: add_product_detail.inc.php?addProd=success");

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
    