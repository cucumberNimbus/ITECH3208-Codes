<?php

    $prod_name = $_POST["prod_name"];
    $prod_price_string = $_POST['prod_price'];
    $prod_price = (float)$prod_price_string;
    $prod_description = $_POST["prod_description"];
    $prod_gender = $_POST["prod_gender"];
    $in_stock_string = $_POST["in_stock"];
    $in_stock = (int)$in_stock_string;

    $file = $_FILES['file'];
    $file_name = $_FILES['file']['name'];
    $file_tmp_name = $_FILES["file"]["tmp_name"];
    $file_size = $_FILES['file']['size'];
    $file_error = $_FILES['file']['error'];
    $file_type = $_FILES["file"]["type"];

    try {
        $file_ext = explode('.', $file_name);
        $file_actual_ext = strtolower(end($file_ext)); //stores the last element in the array $file_ext
        $allowed = array('jpg', 'jpeg', 'png'); //array stores the allowed datatypes of images in the website 
    
        $search_name_lcase = strtolower($prod_name); //converts product name input to lowercase 
        $search_name = str_replace(" ", "", $search_name_lcase); //removes spaces between words. This string will be used to search for the product in the database

        $new_image_name = $search_name . "." . $file_actual_ext;
        $file_destination = '../prod_image/' . $new_image_name;

        require_once 'dbh.inc.php';
        require_once 'add_product_model.inc.php';
        require_once 'add_product_contr.inc.php';

        //error handlers

        $errors = [];
       
        if(is_prod_name_taken($pdo, $prod_name)){
            $errors["prod_name_taken"] = "Product name taken, please choose another";
        }
        if(in_array($fileActualExt, $allowed)){
            $errors["image_type_error"] = "Image of this type cannot be stored in the database";
        }
        if(!$file_error === 0) {
            $errors["image_upload_error"] = "Error while uploading the image to the website";
        }
        if($file_size > 10000000) {
            $errors["image_over_size"] = "File is too large to be stored in the database";
        }
        if($in_stock < 10 ){
            $errors["low_stock"] = "Product needs to have a minimium of 10qty in stock";
        }
        session_start();

        if ($errors) {  //the code checks for basic errors at this point and terminates the code if the file type is incorrect, file is oversized, file was not uploaded properly or if the name is already taken
            $_SESSION["errors_add_prod"] = $errors;

            header("Location: add_product_detail.inc.php");
            die();
        }

        if(move_uploaded_file($file_tmp_name, $file_destination)) {
            add_prod($pdo, $prod_name, $search_name, $prod_price, $prod_description, $prod_gender, $file_destination, $file_type, $in_stock); //if the image file is uploaded to the desired folder, the code then takes the image destination along with all product data and stores it in the database 
        } else {
            $errors["image_move_failure"] = "Image was not moved to the destination folder"; // if image is not moved properly, the program terminates here and an upload failure message is shown to the user 
            $_SESSION["errors_add_prod"] = $errors;

            header("Location: add_product_detail.inc.php");
            die();
        }

        header("Location: add_product_detail.inc.php?addProd=success");

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
    