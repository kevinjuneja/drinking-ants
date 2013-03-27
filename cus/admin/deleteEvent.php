<?php
	
	include '../admin_functions.php';

	$admin = new AdminFunctions();

	if (isset($_POST['id'])) {
		$id = $_POST['id'];

		$admin->deleteEvent($id);
		$admin->kill_connection();

		unset($_POST['id']);
	}
	else {

		//echo "<script> alert(\"Post was not successful\")</script>";
		echo "Post was not successful";
	}
?>