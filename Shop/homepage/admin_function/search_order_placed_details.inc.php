<?php
require_once 'search_order_placed_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update tracking information</title>
</head>



<body>
    <form action="../admin_homepage.inc.php" method="post">
        <button>Back</button>
    </form>

    <h3> Enter tracking ID to update tracking information </h3>
    
    <form action="search_order_placed.inc.php" method="post">
        <input type="text" name="track_id" placeholder="Track ID" required>
        <button>Search</button>
    </form>

    <?php
        check_search_order_errors();
    ?>

</body>

</html>

