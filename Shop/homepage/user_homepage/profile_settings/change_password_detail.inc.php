
<?php
require_once 'change_password_view.inc.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>

<body>
    <h4> Enter current password: </h4>
    
    <form action="change_password.inc.php" method="post">
        <h4> Enter current password: </h4>
        <input type="text" name="current_password" placeholder="Current password" required>
        <h4> Enter new password: </h4>
        <input type="text" name="new_password" placeholder="New password" required>
        <input type="text" name="confirm_password" placeholder="Confirm password" required>
        <button type="submit">Update</button>
    </form>

    <?php
    change_password_error();
    ?>

</body>

</html>

