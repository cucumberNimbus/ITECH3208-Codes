<?php

declare (strict_types=1);

function is_input_empty(string $username, string $pwd, string $email)
{
	if (empty($username) || empty($pwd) ||empty($email) ||){

		return true
	}
	else{

		return false;
	}
}

function is_input_empty(string $email)
{
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){

		return true
	}
	else{

		return false;
	}
}

function is_username_taken(object $pdo, string $username)
{
	if (get_username($pdo, string $username)){

		return true
	}
	else{

		return false;
	}
}

function is_email_taken(object $pdo, string $email)
{
	if (et_email($pdo, $email) ){

		return true
	}
	else{

		return false;
	}
}

function create_user(object $pdo, string $pwd, string $username, string $email)
{
	set_user( $pdo,  $pwd,  $username,  $email)
}