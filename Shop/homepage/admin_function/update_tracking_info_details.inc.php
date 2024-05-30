<?php
require_once 'update_tracking_info_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update tracking details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* Light blue background color */
            margin: 0;
            padding: 0;
        }

        button {
            background-color: #007bff; /* Blue button background color */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 300px;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #007bff; /* Blue border color on focus */
        }

        h3 {
            color: #007bff; /* Blue heading color */
        }
    </style>
</head>

<body>


    <h3> Enter latest tracking update </h3>

    <form action="update_tracking_info.inc.php" method="post">
        <input type="text" name="tracking_update_text" placeholder="Details" required>
        <button>Update</button>
    </form>
    
    <?php
        check_tracking_info_update_errors();
    ?>
        <form action="../admin_homepage.inc.php" method="post">
        <button>Back</button>
    </form>

</body>

</html>
