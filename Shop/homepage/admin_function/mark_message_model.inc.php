<?php

    $message_id = $_POST["message_id"];
    $action = $_POST['action'];

    try {
        require_once 'dbh.inc.php';

        if ($action == "mark_read") {
            $query = "UPDATE user_messages SET status = 'read' WHERE id = :message_id;";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':message_id', $message_id);
            $stmt->execute();
        } else if ($action == "mark_as_actioned") {
            $query = "UPDATE user_messages SET action = 'actioned', status = 'read' WHERE id = :message_id;";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':message_id', $message_id);
            $stmt->execute();
        }

        header("Location: inbox_details.inc.php");

        $pdo = null;
        $stmt = null;
        
        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }