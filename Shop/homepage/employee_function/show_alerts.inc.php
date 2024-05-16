<?php

try {

    require_once 'dbh.inc.php';
    require_once 'show_alerts_model.inc.php';
    require_once 'show_alerts_contr.inc.php';

    $no_alerts = 1;

    session_start();

    if (low_stock_prod_exist($pdo)) {
        $low_items = save_low_stock_prod($pdo);
        $no_alerts = 0;
        $_SESSION['low_stock_prod'] = $low_items;
    }
    
    if($no_alerts == 1) {
        header("Location: ../employee_homepage.inc.php?noAlert=yes");

        $pdo = null;
        $stmt = null;
        die();
    }

    header("Location: ../employee_homepage.inc.php?noAlert=no");
    $pdo = null;
    $stmt = null;
    die();

} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}