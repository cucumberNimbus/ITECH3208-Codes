<?php

declare(strict_types=1);

function get_unread_unactioned_messages(object $pdo)
{
    $unread_unactioned_messages = retrieve_unread_unactioned_messages($pdo);
    return $unread_unactioned_messages;
}

function get_read_unactioned_messages(object $pdo)
{
    $read_unactioned_messages = retrieve_read_unactioned_messages($pdo);
    return $read_unactioned_messages;
}

function get_read_actioned_messages(object $pdo)
{
    $read_actioned_messages = retrieve_read_actioned_messages($pdo);
    return $read_actioned_messages;
}
