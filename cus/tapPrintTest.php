<?php
	include 'admin_functions.php';

	$admin = new AdminFunctions();

	$title = "Hopped Up: The Quarter Club";
	$description = "Finding reasons to drink is an unwritten obligation of being a college student. From bar-hopping in Newport on Saturday, to “Wastey Wednesday” and “12-Pack Tuesday” themed drinking during the week, there’s no shortage of opportunities to get your drink on. Therefore, the popularity of The Anthill Pub and Grille’s infamous Quarter Club comes as no surprise.";
	$publication = "New University";
	$picture = "3.jpg";
	$article = "http://www.newuniversity.org/2012/04/features/hopped-up-the-quarter-club/";


	$result = $admin->addPress($title, $publication, $description, $picture, $article);

	if (!$result) {
		print mysqli_error($admin->getQuery()->getConn());
	}

?>