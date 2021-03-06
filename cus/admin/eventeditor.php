<?php
	include '../admin_functions.php';

	$admin = new AdminFunctions();

	function dateReverseFormatter($date) {
		$dateArray = explode("/", $date);

		$month = $dateArray[0];
		$day = $dateArray[1];
		$year = $dateArray[2];

		$format = $year . "-" . $month . "-" .$day;

		return $format;
	}


	if (isset($_POST['id']) && isset($_POST['title']) 
		&& isset($_POST['datebegin']) && isset($_POST['dateend']) 
		&& isset($_POST['time']) && isset($_POST['desc'])) {

		$id = $_POST['id'];
		$title = $_POST['title'];
		$dateBegin = $_POST['datebegin'];
		$dateEnd = $_POST['dateend'];
		$time = $_POST['time'];
		$desc = $_POST['desc'];

		$dateBegin = dateReverseFormatter($dateBegin);

		//if(!is_null($dateEnd)) {
		$dateEnd = dateReverseFormatter($dateEnd);
		//}

		$admin->updateEvent($id,$title,$desc,$dateBegin,$dateEnd,$time);

		unset($_POST['id']);
		unset($_POST['title']);
		unset($_POST['datebegin']);
		unset($_POST['dateend']);
		unset($_POST['time']);
		unset($_POST['desc']);

		$admin->kill_connection();

	}
	else {
		echo "Post was not successful";
	}


?>