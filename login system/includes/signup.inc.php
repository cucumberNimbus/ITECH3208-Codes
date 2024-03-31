<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {  //if statement checks if the user has landed on this page 'LEGITIMATELY'

	$username = $_POST["username"];
	$pwd = $_POST["pwd"];
	$email = $_POST["email"];

	try {   //try - catch statement catches and displays all query related errors

		require_once 'dbh.inc.php';
		require_once 'signup_model.inc.php';
		require_once 'signup_control.inc.php';

		//ERROR HANDLERS
		$errors = [];


		if (is_input_empty($username, $pwd, $email)){
			$errors["empty_input"] = "Fill in all fields!";
		}
		if (is_input_empty($email)){
			$errors["invalid_email"] = "Enter valid email!";
		}
		if (is_username_taken($pdo, $username)){
			$errors["username_taken"] = "username already taken!";
		}
		if(is_email_taken(object $pdo, string $email)){
			$errors["email_used"] = "Email already used!";
		}

		require_once 'config_session.inc.php';

		if($errors) {
			$_SESSION["errors_signup"] = $errors;
			header("Location: ../index.php");
			die();
		}

		create_user( $pdo,  $pwd,  $username,  $email);
		header("Location: ../index.php?signup=success");

		$pdo = null;
		$stmt = null;

		die();

	} catch (PDOException $e){
	die("Query Failed: " . $e->getMessage());
}

} else {
	header("Location: ../index.php");
	die();
}