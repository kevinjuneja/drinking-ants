<?php
    
    include_once 'query.php';
    
    class tap_printer {
    	
		var $queryRunner;
		//var $results;
		
		function tap_printer() {
			$this->queryRunner = new Query();
		}
		
		function getTaps() {
			$query = "SELECT a.alc_id, a.name, a.maker, a.alcohol_content FROM alcohol a WHERE type_code = 1";
			
			$this->queryRunner->queryRunner($query);
		}
		
		
		// depenedent on css html...
		function printTapsForFront() {
			
			$count = 0;
			$columnCount = 1;

			//echo "Are you getting here.";

			while ($row = $this->queryRunner->getRow()) {
					
					$beername = $this->queryRunner->removeEscapeChars($row[1]);
					$brewery = $this->queryRunner->removeEscapeChars($row[2]);
					$alcoholcont = $row[3];

				//do something...
				//print something in html format

				if ($count == 0) {
					echo "<div class=\"four columns\">";
					echo "<ul id=\"beer-column" . $columnCount . "\">";
					$columnCount++;
				}
				
				if (!is_null($alcoholcont) && $brewery != "") {
					$alcoholcont = $this->queryRunner->removeEscapeChars(", " . $alcoholcont . "%");
					echo "<li>";
					echo "<p><span style=\"font-weight:bold\">" . $brewery . "</span><br />"; 
					echo $beername . $alcoholcont . "</p>";
					echo "</li>";
				}
				else {
					echo "<li>";
					//echo "<p><span style=\"font-weight:bold\">" . $brewery . "</span>"; 
					echo "<p>" . $beername . "</p>";
					echo "</li>";
				}
				
				$count++;

				if ($count == 10) {
					echo "</ul>";
					echo "</div>";

					$count = 0;
				}
			}
			$this->queryRunner->disconnect();
		}

		function printForAdmin() {

			while ($row = $this->queryRunner->getRow()) {
				
				$id = $row[0];
				$beername = $this->queryRunner->removeEscapeChars($row[1]);
				$brewery = $this->queryRunner->removeEscapeChars($row[2]);
				$alcoholcont = $row[3];

				$alcoholcont = $alcoholcont . "%";

				echo "<tr id=\"" . $id . "\">";
				echo "<td class=\"id\">" . $id . "</td>";
				echo "<td class=\"brewer\">" . $brewery . "</td>";
				echo "<td class=\"name\">" . $beername . "</td>";
				echo "<td class=\"type\">Tap</td>";
				echo "<td class=\"percentage\">" . $alcoholcont . "</td>";
				echo "<td class=\"options\">";
				echo "<img src=\"media/images/editIcon.png\" alt=\"Edit\" class=\"edit_icon\">";
				//echo "<img src=\"media/images/deleteIcon.png\" alt=\"Delete\" class=\"delete_icon\">";
				echo "</td>";
				echo "</tr>";

			}
			$this->queryRunner->disconnect();
		}
		
    };
?>