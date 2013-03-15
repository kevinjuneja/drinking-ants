<?php
	
	include '../admin_functions.php';

	$admin = new AdminFunctions();

	if(isset($_POST['id']) ) {

		$id = $_POST['id'];
		
		$admin->deleteDrink($id);
		
		$admin->kill_connection();

		unset($_POST['id']);
	}
	else {
		echo "Post was not successful";
	}
?>