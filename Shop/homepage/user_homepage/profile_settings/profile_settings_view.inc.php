<?php

declare(strict_types=1);

require_once 'profile_settings_model.inc.php';

session_start();

function show_current_details(object $pdo) 
{
    $user_id = $_SESSION['user_id'];
    $result=get_user_details($pdo, $user_id);
    echo "<p> Username: " . $result['username'];
    echo "<p> Email: " . $result['email'];
    echo "<p> Delivery Address: " . $result['delivery_address'];
    echo "<p> Payment Details: " . $result['payment_details'];
    echo "<p> Account active since: " . $result['created_at'];
}

function show_profile_alert()
{
    if (isset($_GET["changeAddress"]) && $_GET["changeAddress"] === "success") {
        echo '<br>';
        echo '<p>Your address has been changed!</p>';
    } else if (isset($_GET["changePayment"]) && $_GET["changePayment"] === "success") {
        echo '<br>';
        echo '<p>Your payment info has been updated!</p>';
    } else if (isset($_GET["changePassword"]) && $_GET["changePassword"] === "success") {
        echo '<br>';
        echo '<p>Your password has been changed!</p>';
    }
}