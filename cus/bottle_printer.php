<?php
	include_once 'query.php';

	class bottle_printer {

		var $queryRunner;
		var $numberOfRows;

		function bottle_printer() {
			$this->queryRunner = new Query();
			//$this->numberOfRows = 0;

			//echo $this->numberOfRows;
		}

		function countRows($type_code) {
			$query = "SELECT count(alc_id) FROM alcohol WHERE type_code = $type_code";
			$this->queryRunner->queryRunner($query);
			$row = $this->queryRunner->getRow();
			
			$this->numberOfRows = $row[0];

		}

		function getBottles($type_code) {
			
			//$this->countRows($type_code);

			$query = "SELECT a.alc_id, a.name, a.maker," .
			 "a.alcohol_content FROM alcohol a WHERE type_code=" . $type_code;
			 $this->queryRunner->queryRunner($query);
		}

		function printBottlesForFront() {
			$numberOfEntriesPerColumn = 0;
			
			//echo $this->numberOfRows;

			if ($this->numberOfRows % 2 == 0) {
				$numberOfEntriesPerColumn = $this->numberOfRows / 2;
			}
			else {
				$numberOfEntriesPerColumn = (int)(($this->numberOfRows / 2) + 1);
			}
			
			$count = 0;

			//echo $numberOfEntriesPerColumn;
			
			while ($row = $this->queryRunner->getRow()) {

				$name = $this->queryRunner->removeEscapeChars($row[1]);
				$maker = $this->queryRunner->removeEscapeChars($row[2]);
				$alcoholcont = $row[3];

				if ($count == 0) {
					echo "<div class=\"six columns\">";
					echo "<ul id=\"wine-column\">";

				}

				if (!is_null($alcoholcont)) {
					$alcoholcont = $this->queryRunner->removeEscapeChars(", " . $alcoholcont . "%");
				}

				echo "<li>" . $name . " " . $maker . $alcoholcont . "</li>";

				if (++$count == $numberOfEntriesPerColumn) {
					echo "</ul>";
					echo "</div>";
					echo "<div class=\"six columns\">";
					echo "<ul id=\"wine-column\">";
				}
			}
			if ($count > 0) {
				echo "</ul>";
				echo "</div>";
			}

			$this->queryRunner->disconnect();
		}
	};
?>