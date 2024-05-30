<?php
require_once 'dbh.inc.php';
require_once 'inbox_model.inc.php';
require_once 'inbox_contr.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inbox</title>
</head>



<body>
    <form action="../admin_homepage.inc.php" method="post">
        <button>Back</button>
    </form>

    <h3> Inbox </h3>

    <?php //codes to show unread messages 
    if (get_unread_messages($pdo))
    {    $unread_messages = get_unread_messages($pdo);

        echo '<h4>Unead Messages</h4>';
        
        foreach ($unread_messages as $message)
        {
            echo '<p>User Email = '. $message['email'] . '</p>';
            echo '<p>User Message = '. $message['message'] . '</p>';
            echo '    
            <form action="mark_message_read_model.inc.php" method="post">
                <input type="hidden" name="message_id" value="' . $message['id'] . '">
                <button type="submit">Mark read</button>
            </form>';
            echo '<br>';
            echo '<br>';
        }
    } else {
        echo 'You are all caught up!!';
    }
    ?>

    <?php //codes to show all messages
    if (isset($_GET["allMessages"]) && $_GET["allMessages"] === "yes") {
        if (get_read_messages($pdo)) {
            $read_messages = get_read_messages($pdo);

            echo '<h4>Read Messages</h4>';

            foreach ($read_messages as $message)
            {
                echo '<p>User Email = '. $message['email'] . '</p>';
                echo '<p>User Message = '. $message['message'] . '</p>';
                echo '<br>';
                echo '<br>';
            }
        } else {
            echo 'There are no messages!!';
        }
    } else {
        echo '            
            <form action="inbox_details.inc.php?allMessages=yes" method="post">
            <button type="submit">Show all</button>
            </form>';
    }
    ?>

</body>
</html>
