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
</head>

<body>
    <form action="../admin_homepage.inc.php" method="post">
        <button>Back</button>
    </form>

    <h3> Enter latest tracking update </h3>

    <form action="update_tracking_info.inc.php" method="post">
        <input type="text" name="tracking_update_text" placeholder="Details" required>
        <button>Update</button>
    </form>
    

    <?php
        check_tracking_info_update_errors();
    ?>

</body>

</html>
