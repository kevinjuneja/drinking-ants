<?php
	
	include_once 'query.php';

	class MenuPrinter {

		var $queryRunner;

		function MenuPrinter() {
			$this->queryRunner = new Query();
		}

		function printFirstColumnTypes($type_code) {

			$query = "SELECT t.code FROM type WHERE type_id = $type_code";

			$this->queryRunner->queryRunner($query);

			$hrow = $this->queryRunner->getRow();

			$header = $hrow[0];

			echo "<h4>" . $header . "</h4>";
			echo "<ul id=\"" . strtolower($header) . "\">";

			$query = "SELECT m.m_id, m.name, m.description, m.price 
			FROM menu m WHERE m.type_code = $type_code";

			$this->queryRunner->queryRunner($query);
			while($row = $this->queryRunner->getRow()) {
				$name = $this->queryRunner->removeEscapeChars($row[1]);
				$description = $row[2];
				$price = $row[3];

				echo "<li>";
				echo "<p class=\"menu-item\">" . $name . "</p>";
				
				if (!is_null($description)) {
					echo "<p class=\"menu-description\">" . $this->queryRunner->removeEscapeChars($description) . "</p>";
				}
				if (!is_null($price)) {
					echo "<p class=\"menu-description\">" . $price . "</p>";
				} 

				echo "</li>";
			}


		}
 	};
?>