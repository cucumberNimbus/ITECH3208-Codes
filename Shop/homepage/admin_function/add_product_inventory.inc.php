<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        try {
            require_once 'dbh.inc.php';
            require_once 'add_product_inventory_model.inc.php';
            require_once 'add_product_inventory_contr.inc.php';

            $new_stock = $_POST['new_stock'];
            if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {
                if ((!isset($_POST['prod_id_men']) || $_POST['prod_id_men'] == "not_selected") &&
                    (!isset($_POST['prod_id_women']) || $_POST['prod_id_women'] == "not_selected")) {
                    $product = null;
                } else if (isset($_POST['prod_id_men']) && $_POST['prod_id_men'] != "not_selected") {
                    $prod_id_string = $_POST['prod_id_men'];
                    $prod_id = intval($prod_id_string);
                    $product = get_prod_details($pdo, $prod_id);
                } else if (isset($_POST['prod_id_women']) && $_POST['prod_id_women'] != "not_selected") {
                    $prod_id_string = $_POST['prod_id_women'];
                    $prod_id = intval($prod_id_string);
                    $product = get_prod_details($pdo, $prod_id);
                }
            }

            $search_name = $product['search_name'];

            $errors = []; //error handlers

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
    }
    