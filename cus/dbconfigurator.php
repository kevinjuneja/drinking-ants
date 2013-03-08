<?php
	// dbconfigurator.php
	//	apart of package for inital site set up 


	include 'tables.php';
	include_once 'query.php';
	/***
	 *	This Area will include notes about TypeCodes and the initial type codes.
	 *	There are a fixed amount of type codes for this system; however the 
	 *	the corresponding names they are given can change over time as these names correspond with the section header name.
	 *	For now they are:
	 *		ID 1: "Taps"
	 *		ID 2: "Bottled Beers"
	 *		ID 3: "Bottled Wines"
	 *
	 *		ID 4: "Appetizers"
	 *		ID 5: "Soups and Salads"
	 *		ID 6: "From the Grille"
	 *		ID 7: "Build You Own Burger"
	 *		ID 8: "Burger Add-ons"
	 *		ID 9: "Sandwiches"
	 *		ID 10: "Drinks"
	 */

	$runner = new Query();

	$one = "Taps";
	$two = "Bottled Beers";
	$three = "Bottled Wines";
	$four = "Appetizers";
	$five = "Salads & Soups";
	$six = "From the Grille";
	$seven = "Build Your Own Burger";
	$eight = "Add-ons";
	$nine = "Sandwiches";
	$ten = "Drinks";

	$arrayOfTypes = array($one, $two, $three, $four,
		$five, $six, $seven, $eight, $nine, $ten);

	$length = count($arrayOfTypes);

	for ($i = 0; $i < $length; $i++) {
		$code = $i + 1;
		$temp = mysqli_escape_string($this->runner->getConn(), $arrayOfTypes[$i]);
		$runner->queryRunner("INSERT INTO type (type_id, code) VALUES ($code, '$temp') ");
	}

	for ($j = 0; $j < 30; $j++) {
		$runner->queryRunner("INSERT INTO alcohol (name, type_code) VALUES ('Empty Tap' , 1) ");
	}

	
	$runner->disconnect();

?>