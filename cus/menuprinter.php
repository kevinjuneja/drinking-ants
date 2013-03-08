<?php
	
	include_once 'query.php';

	class MenuPrinter {

		var $queryRunner;

		function MenuPrinter() {
			$this->queryRunner = new Query();
		}

		function printFirstColumnTypes($type_code) {

			$query = "SELECT code FROM type WHERE type_id = $type_code";

			$this->queryRunner->queryRunner($query);

			$hrow = $this->queryRunner->getRow();

			$header = $this->queryRunner->removeEscapeChars($hrow[0]);

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

		function printFromTheGrille() {
			$titleQuery = "SELECT code FROM type WHERE type_id = 6";
			$this->queryRunner->queryRunner($titleQuery);
			$titleRow = $this->queryRunner->getRow();
			$title = $this->queryRunner->removeEscapeChars($titleRow[0]);

			echo "<h4 class=\"section-with-description\">" . $title . "</h4>";
			echo "<p class=\"menu-description\">All entrees served with chips and pickle spear unless otherwise noted.</p>";
			echo "<ul id=\"from-the-grille\">";
			echo "<li>";
			$headerP = "SELECT code FROM type WHERE type_id = 7";
			$this->queryRunner->queryRunner($headerP);
			$headerRow = $this->queryRunner->getRow();
			$header = $this->removeEscapeChars($headerRow[0]);

			echo "<p class=\"menu-item\">" . $header . "</p>";
			echo "<p class=\"menu-description\">All burgers served w/ lettuce, tomato, onion, and mayo</p>";
			echo "<ul id=\"burger-options\">";
			$burgerQuery = "SELECT m.name FROM menu m WHERE m.type_code = 7";

			$this->queryRunner->queryRunner($burgerQuery);

			while ($row = $this->queryRunner->getRow()) {
				$name = $this->removeEscapeChars($row[0]);
				echo "<li>" . $name . "</li>";
			}

			$addQuery = "SELECT code FROM type WHERE type_id = 8";

			$this->queryRunner->queryRunner($addQuery);

			$addRow = $this->queryRunner->getRow();
			$addTitle = $addRow[0];

			echo "<li id=\"burger-addons-li\">";
			echo "<p class=\"menu-item\">" . $addTitle . "</p>";
			echo "<ul id=\"burger-addons\">";

			$addonQuery = "SELECT m.name, m.description FROM menu m WHERE m.type_code = 8";

			$this->queryRunner->queryrunner($addonQuery);

			while ($row = $this->queryRunner->getRow()) {
				$name = $this->removeEscapeChars($row[0]);
				$description = $row[1];

				if(is_null($description) || $description == "") {
					echo "<li>" . $name . "</li>";
				}
				else {
					echo "<li>" . $name . "<p class=\"menu-description\">" . $description . "</p></li>";
				}

			}
			echo "</ul></li></ul></li>";

			$query = "SELECT m.m_id, m.name, m.description, m.price 
			FROM menu m WHERE m.type_code = 6";

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
			echo "</ul>";
		}
 	};
?>