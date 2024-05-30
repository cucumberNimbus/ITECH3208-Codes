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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        h3, h4 {
            text-align: center;
        }
        .message {
            background: #f9f9f9;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        form {
            display: inline-block;
        }
        button {
            background-color: #5cb85c;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background-color: #4cae4c;
        }
        .back-button {
            background-color: #f0ad4e;
            margin-bottom: 20px;
        }
        .back-button:hover {
            background-color: #ec971f;
        }
    </style>
</head>

<body>
    <div class="container">


        <h3>Inbox</h3>

        <?php 
        // Codes to show unread messages 
        $unread_messages = get_unread_messages($pdo);
        if ($unread_messages) {
            echo '<h4>Unread Messages</h4>';
            
            foreach ($unread_messages as $message) {
                echo '<div class="message">';
                echo '<p><strong>User Email:</strong> ' . htmlspecialchars($message['email']) . '</p>';
                echo '<p><strong>User Message:</strong> ' . htmlspecialchars($message['message']) . '</p>';
                echo '<form action="mark_message_read_model.inc.php" method="post">';
                echo '<input type="hidden" name="message_id" value="' . htmlspecialchars($message['id']) . '">';
                echo '<button type="submit">Mark Read</button>';
                echo '</form>';
                echo '</div>';
            }
        } else {
            echo '<p>You are all caught up!!</p>';
        }
        ?>

        <?php 
        // Codes to show all messages
        if (isset($_GET["allMessages"]) && $_GET["allMessages"] === "yes") {
            $read_messages = get_read_messages($pdo);
            if ($read_messages) {
                echo '<h4>Read Messages</h4>';
                
                foreach ($read_messages as $message) {
                    echo '<div class="message">';
                    echo '<p><strong>User Email:</strong> ' . htmlspecialchars($message['email']) . '</p>';
                    echo '<p><strong>User Message:</strong> ' . htmlspecialchars($message['message']) . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>There are no messages!!</p>';
            }
        } else {
            echo '<form action="inbox_details.inc.php?allMessages=yes" method="post">';
            echo '<button type="submit">Show All</button>';
            echo '</form>';
        }
        ?>
        <br>
        
                <form action="../admin_homepage.inc.php" method="post">
            <button type="button" class="back-button" onclick="window.location.href='../admin_homepage.inc.php'">Back</button>
        </form>
    </div>
</body>
</html>
