<?php
	
	include '../admin_functions.php';

	$admin = new AdminFunctions();

	if(isset($_POST['id']) && isset($_POST['brewer']) && isset($_POST['name']) 
		&& isset($_POST['type']) && isset($_POST['perc'])) {

		$id = $_POST['id'];
		$brewer = $_POST['brewer'];
		$name = $_POST['name'];
		$type = $_POST['type'];
		$perc = $_POST['perc'];

		$type = trim($type);

		if (count($brewer) < 31 && count($brewer) > 0 && count($name) < 31 
			&& count($name) > 0 && $perc < 20.00 && $perc > 0) {

		//if ($type == "Tap") {
			$admin->update($id, $name, $brewer, $perc);
		//}
		}

		unset($_POST['id']);
		unset($_POST['brewer']);
		unset($_POST['name']);
		unset($_POST['type']);
		unset($_POST['perc']);

		$admin->kill_connection();
	}
	else {
		echo "Post was not successful";
	}
?>