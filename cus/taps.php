<?php
    include 'query.php';
	
	$runner = new Query();
	
	$runner->queryRunner("INSERT INTO beer(beer_name) VALUES('Empty Tap')");
	
	for($i = 1; $i <= 30; $i++) {
		$query = "INSERT INTO taps(tap_id, beer_id) VALUES($i, 1)";
		$runner->queryRunner($query);
	}
?>