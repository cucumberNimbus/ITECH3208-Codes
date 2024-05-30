<?php

declare(strict_types=1);

function get_unread_messages(object $pdo)
{
    $unread_messages = retrieve_unread_messages($pdo);
    return $unread_messages;
}

function get_read_messages(object $pdo)
{
    $all_messages = retrieve_read_messages($pdo);
    return $all_messages;
}