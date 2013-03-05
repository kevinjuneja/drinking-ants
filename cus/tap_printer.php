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
				
				if (!is_null($alcoholcont)) {
					$alcoholcont = $this->queryRunner->removeEscapeChars($alcoholcont . "%");
					echo "<li>" . $beername . " " . $brewery . ", " . $alcoholcont . "</li>";
				}
				else {
					echo "<li>" . $beername . " " . $brewery . "</li>";
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
		
    };
?>