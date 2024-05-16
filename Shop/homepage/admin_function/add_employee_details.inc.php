<?php
require_once 'add_employee_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create employee account</title>
    </head>

    <body>
        <h3>Add employee details</h3>
        <h5>Employees can later add further details from their profile page</h5>

        <form action="add_employee.inc.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <button>Signup</button>
        </form>

        <?php
        check_signup_errors();
        ?>

    </body>

</html>