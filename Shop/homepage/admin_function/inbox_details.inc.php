<?php
require_once 'dbh.inc.php';
require_once 'inbox_model.inc.php';
require_once 'inbox_contr.inc.php';

session_start();

// Function to prevent CSRF attacks
function generate_csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function check_update_prod_errors() {
    if (isset($_SESSION['update_prod_errors'])) {
        foreach ($_SESSION['update_prod_errors'] as $error) {
            echo '<p class="error">' . htmlspecialchars($error) . '</p>';
        }
        unset($_SESSION['update_prod_errors']);
    }
}

$csrf_token = generate_csrf_token();
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
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h3 {
            margin-top: 0;
        }
        button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .message {
            background-color: #fff;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .read {
            background-color: #f0f0f0;
        }
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        
        <h3>Inbox</h3>

        <?php
        // Show unread messages
        if ($unread_messages = get_unread_messages($pdo)) {
            echo '<h4>Unread Messages</h4>';
            foreach ($unread_messages as $message) {
                echo '<div class="message">';
                echo '<p>User Email: ' . $message['email'] . '</p>';
                echo '<p>User Message: ' . $message['message'] . '</p>';
                echo '<form action="mark_message_read_model.inc.php" method="post">';
                echo '<input type="hidden" name="message_id" value="' . $message['id'] . '">';
                echo '<input type="hidden" name="csrf_token" value="' . htmlspecialchars($csrf_token) . '">';
                echo '<button type="submit">Mark read</button>';
                echo '</form>';
                echo '</div>';
            }
        } else {
            echo '<p>You are all caught up!</p>';
        }

        // Show all messages
        if (isset($_GET["allMessages"]) && $_GET["allMessages"] === "yes") {
            if ($read_messages = get_read_messages($pdo)) {
                echo '<h4>Read Messages</h4>';
                foreach ($read_messages as $message) {
                    echo '<div class="message read">';
                    echo '<p>User Email: ' . $message['email'] . '</p>';
                    echo '<p>User Message: ' . $message['message'] . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>There are no messages!</p>';
            }
        } else {
            echo '<form action="inbox_details.inc.php?allMessages=yes" method="post">';
            echo '<input type="hidden" name="csrf_token" value="' . htmlspecialchars($csrf_token) . '">';
            echo '<button type="submit">Show all</button>';
            echo '</form>';
        }
        
        ?>
        <br>
            <form action="../admin_homepage.inc.php" method="post">
            <button>Back</button>
        </form>
    </div>

</body>

</html>
