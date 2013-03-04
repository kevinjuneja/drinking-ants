<?php
	
	include 'query.php';

	class Menu_Printer {

		var $queryRunner;

		function Menu_Printer() {
			$this->queryRunner = new Query();
		}

		function printSegmentBasedOnTypeCode($type_code) {
			$query = "SELECT m_id, name, description, price FROM menu WHERE type_code = $type_code";

			while ($row = $this->queryRunner->getRow()) {
				//print out corresponding

				$id = $row[0];
				$name = $row[1];
				$description = $row[2];
				$price = $row[3];

				if(is_null($description)) {
					$description = "";
				}
				if(is_null($price)) {
					$price = "";
				}

				
			} 

		}

	};

?>