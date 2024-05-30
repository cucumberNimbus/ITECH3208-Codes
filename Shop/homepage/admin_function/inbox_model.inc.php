<?php

declare(strict_types=1);

function retrieve_unread_messages(object $pdo)
{
    $query = "SELECT * FROM user_messages WHERE status = 'unread';";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $result;
}

function retrieve_read_messages(object $pdo)
{
    $query = "SELECT * FROM user_messages WHERE status = 'read';";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $result;
}