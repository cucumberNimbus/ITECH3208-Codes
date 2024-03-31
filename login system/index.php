<?php
//require_once 'includes/config_session.inc.php';
session_start();
require_once 'includes/signup_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
	</head>

	<body>

		<h3>Signup Account</h3>

		<form action="includes/signup.inc.php" method="post">
			<input type="text" name="username" placeholder="Username">
			<input type="password" name="pwd" placeholder="Password">
			<input type="text" name="email" placeholder="E-mail">
			<button>Signup</button>
		</form>

		<?php

		check_signup_errors();

		?>

		<h3>Login to exsting account </h3>

		<form action="includes/login_existing.inc.php" method="post">
			<input type="text" name="username" placeholder="Username">
			<input type="password" name="pwd" placeholder="Password">
			<button>Login</button>
		</form>

	</body>

</html>
