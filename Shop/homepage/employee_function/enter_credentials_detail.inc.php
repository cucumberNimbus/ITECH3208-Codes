<?php
require_once 'enter_credentials_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Credentials</title>
</head>


<body>

    <form action="../employee_homepage.inc.php" method="post">
        <button>Back</button>
    </form>

<h4> Enter additional credentials or press "check" to check if credentials have already been added </h4>

    <form action="enter_credentials.inc.php" method="post">
        <input type="text" name="email" placeholder="E-Mail" required>
        <input type="text" name="full_name" placeholder="Full Name" required>
        <button type="submit" name="action" value="add_credentials">Update credentials</button>
        <br>
    </form>

    <form action="enter_credentials.inc.php" method="post">
        <button type="submit" name="action" value="check_credentials">Check</button>
    </form>

    <?php
        check_employee_credentials_errors();
    ?>

</body>

</html>

