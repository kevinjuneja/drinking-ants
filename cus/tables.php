<?php
   
   	include_once "query.php";
   
	$type = "CREATE TABLE type (
		type_id INTEGER NOT NULL,
		code VARCHAR(30),
		PRIMARY KEY (type_id)
	)";


	$alcohol = "CREATE TABLE alcohol (
		alc_id INTEGER NOT NULL AUTO_INCREMENT,
		name VARCHAR(30),
		maker VARCHAR(30),
		alcohol_content DECIMAL(4,2),
		type_code INTEGER,
		PRIMARY KEY (alc_id),
		FOREIGN KEY (type_code) REFERENCES type (type_id)
	)";

	$menu = "CREATE TABLE menu (
		m_id INTEGER NOT NULL AUTO_INCREMENT,
		name VARCHAR (40),
		description VARCHAR(100),
		price DECIMAL(2,2),
		type_code INTEGER,
		PRIMARY KEY (m_id),
		FOREIGN KEY (type_code) REFERENCES type (type_id)
	)";

	$events = "CREATE TABLE event (
		e_id INTEGER NOT NULL AUTO_INCREMENT,
		title VARCHAR(100),
		description VARCHAR(100),
		date DATE,
		time TIME,
		PRIMARY KEY (e_id)
	)";
	
	$user = "CREATE TABLE user (
		u_id INTEGER NOT NULL AUTO_INCREMENT,
		username VARCHAR(30) NOT NULL,
		password VARCHAR(30) NOT NULL,
		PRIMARY KEY (u_id)
	
	)";

	$press = "CREATE TABLE press (
		p_id INTEGER NOT NULL AUTO_INCREMENT,
		title VARCHAR(40),
		description VARCHAR(100),
		date VARCHAR(30),
		picture_location VARCHAR(100),
		article_link VARCHAR(100),
		PRIMARY KEY (p_id)
	)";
	


	$runner = new Query();
	
	$array = array($type, $alcohol, $menu, $events, $user, $press);
	$length = count($array);
	
	for ($i = 0; $i < $length; $i++) {
		$table = $array[$i];	
			
		$runner->queryRunner($table);
	}

	$runner->disconnect();
	
/*    $beers = "CREATE TABLE beer (
    	beer_id INTEGER NOT NULL AUTO_INCREMENT,
    	beer_name VARCHAR(30),
    	brewery VARCHAR(30),
    	alcohol_content DECIMAL(2,1),
    	PRIMARY KEY (beer_id)
    )";
	
	
	$tap = "CREATE TABLE taps (
		tap_id INTEGER NOT NULL,
		beer_id INTEGER,
		PRIMARY KEY (tap_id),
		FOREIGN KEY (beer_id) REFERENCES beer (beer_id)
	)";
	
	$bottle = "CREATE TABLE bottle (
		bottle_id INTEGER NOT NULL AUTO_INCREMENT,
		name VARCHAR(30),
		company VARCHAR(30),
		alcohol_content DECIMAL(2,1),
		PRIMARY KEY (bottle_id)
	)";
	
	$isABeer = "CREATE TABLE isAbeer (
		id INTEGER NOT NULL AUTO_INCREMENT,
		bottle_id INTEGER,
		PRIMARY KEY (isb_id),
		FOREIGN KEY (bottle_id) REFERENCES bottle (bottle_id)
	)";
	
	$isAWine = "CREATE TABLE isAwine (
		id INTEGER NOT NULL AUTO_INCREMENT,
		bottle_id INTEGER,
		PRIMARY KEY (isb_id),
		FOREIGN KEY (bottle_id) REFERENCES bottle (bottle_id)
	)"; */
	

	
	/*$appetizer = "CREATE TABLE appetizer (
		id INTEGER NOT NULL AUTO_INCREMENT,
		m_id INTEGER,
		PRIMARY KEY (id),
		FOREIGN KEY (m_id) REFERENCES menu (m_id)
	)";
	
	$soupsalad = "CREATE TABLE soupSalad (
		id INTEGER NOT NULL AUTO_INCREMENT,
		m_id INTEGER,
		PRIMARY KEY (id),
		FOREIGN KEY (m_id) REFERENCES menu (m_id)
	)";
	
	$grill = "CREATE TABLE grill(
		id INTEGER NOT NULL AUTO_INCREMENT,
		m_id INTEGER,
		PRIMARY KEY (id),
		FOREIGN KEY (m_id) REFERENCES menu (m_id)
	)";
	
	$sandwich = "CREATE TABLE sandwich (
		id INTEGER NOT NULL AUTO_INCREMENT,
		m_id INTEGER,
		PRIMARY KEY (id),
		FOREIGN KEY (m_id) REFERENCES menu (m_id)
	)";
	
	$drinks = "CREATE TABLE drinks (
		id INTEGER NOT NULL AUTO_INCREMENT,
		m_id INTEGER,
		PRIMARY KEY (id),
		FOREIGN KEY (m_id) REFERENCES menu (m_id)
	)"; */
	

	
	
	
	
?>