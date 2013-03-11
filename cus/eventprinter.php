<?php
	
	include_once 'query.php';

	class EventPrinter {

		var $queryRunner;

		function EventPrinter() {
			$this->queryRunner = new Query();
		}

		function dateFormatter($date) {
			$dateArray = explode("-", $date);

			$year = $dateArray[0];
			
			$month = $dateArray[1];
			$mArray = str_split($month);

			if ($mArray[0] == '0') {
				$month = $mArray[1];
			}
			$day = $dateArray[2];
			$dArray = str_split($day);

			if($dArray[0] == '0') {
				$day = $dArray[1];
			}

			$format = $month . "/" . $day . "/" . $year;

			return $format;
		}

		function printEvent() {

			$query = "SELECT * FROM event ORDER BY startdate LIMIT 10";

			$this->queryRunner->queryRunner($query);

			while($row = $this->queryRunner->getRow()) {
				
				$title = $this->queryRunner->removeEscapeChars($row[1]);
				$desc = $this->queryRunner->removeEscapeChars($row[2]);
				$startDate = $this->dateFormatter($row[3]);
				$endDate = $row[4];
				$time = $this->queryRunner->removeEscapeChars($row[5]);

				echo "<div class=\"event-container\">";
				echo "<p class=\"date\">";

				if(!is_null($endDate) && $endDate != "0000-00-00") {
					echo "<span class=\"event-date\">" . trim($startDate) . "-" . 
					trim($this->dateFormatter($endDate)) . "</span>";
				}
				else {
					echo "<span class=\"event-date\">" . $startDate . "</span>";
				}
				echo "<br />";
				echo "<span class=\"event-time\">" . $time . "</span>";
				echo "</p>";

				echo "<p class=\"event\">";
				echo "<span class=\"event-title\">" . $title . "</span>";
				echo "<br />";
				echo "<span class=\"event-description\">" . $desc . "</desc>";
				echo "</p>";
				echo "</div>";
			}

		}

	};

?>