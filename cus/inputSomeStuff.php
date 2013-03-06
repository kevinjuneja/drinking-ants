<?php
	
	include 'admin_functions.php';

	$func = new AdminFunctions();

	/*echo $func->addBeerBottle('Duchesse', 'Verhaeghe', 6);
	echo $func->addBeerBottle('Suplication', 'Russian River', 7);
	echo $func->addBeerBottle('Sanctification', 'Russian River', 6.75);
	echo $func->addBeerBottle('Salvation', 'Russian River', 9);*/
	
	echo $func->addWineBottle('Pinot Grigio', 'Barefoot', 12.5);
	echo $func->addWineBottle('Merlot', 'Barefoot', 12.5);
	echo $func->addWineBottle('Chianti', 'Barefoot', 12.5);

	$func->kill_connection();


?>