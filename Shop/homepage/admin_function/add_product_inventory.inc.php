<?php

    $input_prod_name = $_POST["prod_name"];
    $new_stock = $_POST['new_stock'];


    try {
        require_once 'dbh.inc.php';
        require_once 'add_product_inventory_model.inc.php';
        require_once 'add_product_inventory_contr.inc.php';

        $search_name = str_replace(" ", "", strtolower($input_prod_name));

        $errors = []; //error handlers

        if(!prod_exists($pdo, $search_name)){
            $errors["no_prod"] = "Error!! Product name does not exist, please choose another!";
        }
        if($new_stock < 1) {
            $errors["invalid_quantity"] = "Error!! Invalid quantity input";
        }

        session_start();

        if ($errors) {  //any errors in the input will not let the admin make changes to the database
            $_SESSION["errors_add_quantity"] = $errors;

            header("Location: add_product_inventory_detail.inc.php");
            die();
        }

        update_inventory($pdo, $search_name, $new_stock);

        header("Location: add_product_inventory_detail.inc.php?updateInventory=success");

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
    