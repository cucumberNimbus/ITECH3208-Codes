<?php

try {
    session_start();
    $_SESSION["user_type"] = "guest";
    header("Location: ../homepage/user_homepage/user_homepage.inc.php");
    die();
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}

