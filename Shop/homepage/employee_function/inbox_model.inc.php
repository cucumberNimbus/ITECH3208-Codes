<?php

declare(strict_types=1);

function retrieve_unread_unactioned_messages(object $pdo)
{
    $query = "SELECT * FROM user_messages WHERE status = 'unread' AND action = 'unactioned';";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $result;
}

function retrieve_read_unactioned_messages(object $pdo)
{
    $query = "SELECT * FROM user_messages WHERE status = 'read' AND action = 'unactioned';";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $result;
}

function retrieve_read_actioned_messages(object $pdo)
{
    $query = "SELECT * FROM user_messages WHERE status = 'read' AND action = 'actioned';";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $result;
}


