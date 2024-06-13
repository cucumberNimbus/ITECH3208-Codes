<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

    try {
        require_once 'dbh.inc.php';
        require_once 'remove_product_model.inc.php';
        require_once 'remove_product_contr.inc.php';

        if ((!isset($_POST['prod_id_men']) || $_POST['prod_id_men'] == "not_selected") &&
            (!isset($_POST['prod_id_women']) || $_POST['prod_id_women'] == "not_selected")) {
            $errors["unknown_error"] = "Error, please try again!";
        } else if (isset($_POST['prod_id_men']) && $_POST['prod_id_men'] != "not_selected") {
            $prod_id_string = $_POST['prod_id_men'];
            $prod_id = intval($prod_id_string);
            $product = get_prod_details($pdo, $prod_id);
        } else if (isset($_POST['prod_id_women']) && $_POST['prod_id_women'] != "not_selected") {
            $prod_id_string = $_POST['prod_id_women'];
            $prod_id = intval($prod_id_string);
            $product = get_prod_details($pdo, $prod_id);
    }

        session_start();

        if ($errors) {
            $_SESSION["errors_remove_prod"] = $errors;

            header("Location: remove_product_detail.inc.php");
            die();
        }
        $search_name = $product['search_name'];
        $image_location = get_image_location($pdo, $search_name);

        if (unlink($image_location['prod_image_location'])){
            remove_prod($pdo, $prod_id);
            header("Location: remove_product_detail.inc.php?removeProd=success");

            $pdo = null;
            $stmt = null;
    
            die();
        } else {
            $errors["error_to_unlink_image"] = "Product image could not be deleted!";
            $_SESSION["errors_remove_prod"] = $errors;

            header("Location: remove_product_detail.inc.php");
            $pdo = null;
            $stmt = null;
            die();
        }


    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}