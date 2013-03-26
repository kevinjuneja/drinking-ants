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

			$query = "SELECT e_id, title, description, startdate, enddate, time FROM event ORDER BY startdate LIMIT 10";

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
					echo "<span class=\"event-date\">" . trim($startDate) . "</span>";
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
			$this->queryRunner->disconnect();
		}

		function printEventAdmin() {
			$query = "SELECT e_id, title, description, startdate, enddate, time FROM event ORDER BY startdate LIMIT 10";

			$this->queryRunner->queryRunner($query);

			while($row = $this->queryRunner->getRow()) {

				$id = $row[0];
				$title = $this->queryRunner->removeEscapeChars($row[1]);
				$desc = $this->queryRunner->removeEscapeChars($row[2]);
				$startDate = $this->dateFormatter($row[3]);
				$endDate = $row[4];
				$time = $this->queryRunner->removeEscapeChars($row[5]);

				echo "<tr>";
				echo "<td class=\"id\">" . $id . "</td>";
				echo "<td class=\"title\">" . $title . "</td>";
				echo "<td class=\"date_begin\">" . trim($startDate) . "</td>";

				if(!is_null($endDate) && $endDate != "0000-00-00") {
					echo "<td class=\"date_end\">" . trim($this->dateFormatter($endDate)) . "</td>";
				}
				else {
					echo "<td class=\"date_end\">" . trim($startDate) . "</td>";
				}

				echo "<td class=\"time_info\">" . $time . "</td>";
				echo "<td class=\"description\">";
					echo "<span>View Description</span>";
					echo "<p class=\"description_detail\">" . $desc . "</p>";
				echo "</td>";
				echo "<td class=\"options\">";
				echo "<img src=\"media/images/editIcon.png\" alt=\"Edit\" class=\"edit_icon\">";
				echo "<img src=\"media/images/deleteIcon.png\" alt=\"Delete\" class=\"delete_icon\">"; 
				echo "</td>";
				echo "</tr>";
			}


		}

	};

?>