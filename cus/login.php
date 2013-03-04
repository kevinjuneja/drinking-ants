<?php

	session_start();

	include_once 'admin_functions.php';
	include 'variables.php';

	$functions = new AdminFunctions();

	$registered = TRUE;
	$validated = TRUE;

	if (!isset($_SESSION['logged_in'])) {
		$_SESSION['logged_in'] = FALSE;
	}

	if ((isset($_POST["username"])) && (isset($_POST["password"]))) {

		$username = $_POST["username"];
		$password = $_POST["password"];

		if (!($functions->isValidUser($username, $password))) {
			$registered = FALSE;
		}

		if ($registered == FALSE) {
			header(sprintf("Location: %s", $index));
			exit;
		}

		if ($registered == TRUE) {
			$results = $functions->login($username, $password);

			if(!$results) {
				header(sprintf("Location: %s", $index);
				exit;
			}

			$row = mysqli_fetch_row($results);
			$hashedPw = $row['password'];
			$validated = $functions->validate($password, $hashedPw);

			if ($validated == FALSE) {
				header(sprintf("Location: %s", $index);
				exit;
			}
			if ($validated == TRUE) {
				$_SESSION["logged_in"] = TRUE;

				//redirct to admin panel.
			}
		}

	}

?>
