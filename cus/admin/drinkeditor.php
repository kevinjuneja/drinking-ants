<?php
	
	include '../admin_functions.php';

	$admin = new AdminFunctions();

	if(isset($_POST['id']) && isset($_POST['brewer']) && isset($_POST['name']) && isset($_POST['type']) && isset($_POST['perc'])) {

		$id = $_POST['id'];
		$brewer = $_POST['brewer'];
		$name = $_POST['name'];
		$type = $_POST['type'];
		$perc = $_POST['perc'];

		$type = trim($type);

		if ($type == "Tap") {
			$admin->updateTap($id, $name, $brewer, $perc);
		}

	}
	else {
		echo "Post was not successful";
	}
?>