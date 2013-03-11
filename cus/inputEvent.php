<?php
	include_once 'admin_functions.php';

	$admin = new AdminFunctions();


	$title = "St. Patricks Day";
	$desc = "Get a head start in celebrating St. Patricks day in your pajamas at the Anthill Pub. Irish food specials available starting 3/15.";
	$sdate = "2013-03-17";
	$edate = NULL;
	$time = "8:00am - 10:00pm";

	$result = $admin->addEvent($title, $desc, $sdate, $edate, $time);


	if (!$result) {
		print mysqli_error($admin->getQuery()->getConn());
	}



?>