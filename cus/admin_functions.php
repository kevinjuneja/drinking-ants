<?php


include 'query.php';
/*********************************
 *
 * 	Administrator View Functions
 *
 *
 * *******************************/
class AdminFunctions {
		
		
	var $runner;
	
	function AdminFunctions() {
		$this->runner = new Query();
	}

	function cleanUp($info) {

		//$conn = connect();
		$info = trim($info);
		$info = htmlspecialchars($info);
		$info = mysqli_escape_string($this->runner->getConn(), $info);

		return $info;
	}


	/*** Functions for use throughout app ***/


	function updateTap($alc_id, $name, $brewery, $alcohol_content) {
		
		$query = "UPDATE alcohol a SET a.name = '$name', a.maker = '$brewery'," . 
			"a.alcohol_content = '$alcohol_content' WHERE a.alc_id = $alc_id";

		return $this->runner->queryRunner($query);
	}

	function addBeerBottle($name, $brewer, $alcohol_content) {
		$query = "INSERT INTO alcohol (name, maker, alcohol_content, type_code) " .
		"VALUES('$name', '$brewer', $alcohol_content, 2)";
		 return $this->runner->queryRunner($query);
	}

	function addWineBottle($name, $brewer, $alcohol_content) {
		$query = "INSERT INTO alcohol (name, maker, alcohol_content, type_code) " .
		"VALUES('$name', '$brewer', $alcohol_content, 3)";
		 return $this->runner->queryRunner($query);
	}



	/*function updateTap($tap_id, $beer_id) {
		$tap_id = $this->cleanUp($tap_id);
		$beer_id = $this->cleanUp($beer_id);

		$query = "UPDATE taps t SET t.beer_id = $beer_id WHERE t.tap_id = $tap_id";

		return $this->runner->queryRunner($query);
	}


	function addBeer($beer_name, $brewery, $alchol_content) {
		$beer_name = $this->cleanUp($beer_name);
		$brewery = $this->cleanUp($brewery);
		$alchol_content = $this->cleanUp($alchol_content);

		$query = "INSERT INTO beer (beer_name, brewery, alcohol_content) " . "VALUES('$beer_name','$brewery', $alchol_content )";

		return $this->runner->queryRunner($query);
	}*/

	function addMenuItem($name, $description, $price, $menuCode) {

		$name = $this->cleanUp($name);
		$description = $this->cleanUp($description);
		
		if(is_null($price) || $price == "") {
			$price = NULL;
		}
		else {
			$price = $this->cleanUp($price);
		}
		
		$query = "INSERT INTO menu (name, description, price, type_code) " . "VALUES('$name','$description', $price, $menuCode)";

		//return 
		return $this->runner->queryRunner($query);
		
	}

	function addEvent($title, $description, $date, $time) {
		$title = $this->cleanUp($title);
		$description = $this->cleanUp($description);
		$date = $this->cleanUp($date);

		$query = "INSERT INTO event (title, description, date, time) " . "VALUES('$title', '$description', '$date','$time')";

		return $this->runner->queryRunner($query);
	}

	function addPress($title, $description, $date, $picture, $article, $conn) {
		$title = cleanUp($title, $conn);
		$description = cleanUp($description, $conn);
		$date = cleanUp($date, $conn);
		$picture = cleanUp($picture, $conn);
		$article = cleanUp($article, $conn);

		$query = sprintf("INSERT INTO press (title, description, date, picture, article_link)" . 
		"VALUES ('%s', '%s', '%s', '%s', '%s')", $title, $description, $date, $picture, $article);

		return queryRunner($query, $conn);
	}
	
	function isValidUser($username, $password) {
		$username = $this->cleanUp($username);
		$password = $this->cleanUp($password);

		$query = "SELECT username FROM user WHERE username = '$username'";

		return $this->runner->queryRunner($query);
	}

	function login($username, $password) {
		$query = "SELECT password FROM user WHERE username = $username";
		return $this->runner->queryRunner($query);
	}

	function registration() {
		
	}

	function kill_connection() {
		$this->runner->disconnect();
	}

	 function validate($pw, $hash) {
			
		$salt = substr($hash, 0, 64);
		$validHash = substr($hash, 64,64);
		$testHash = hash("sha256",$salt . $pw);
		$checkHash=utf8_encode($testHash);
		return $checkHash === $validHash;
	}

	   function hashIt($pw) {
		$saltysalt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
		$hashsack = hash("sha256", $saltysalt . $pw);
		$dontthinkaboutithackers = $saltysalt . $hashsack;
		$lol = utf8_encode($dontthinkaboutithackers);
		return $lol;
	}

};
?>