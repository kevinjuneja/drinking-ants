<?php
    
    include_once 'query.php';
    
    class tap_printer {
    	
		var $queryRunner;
		//var $results;
		
		function tap_printer() {
			$this->queryRunner = new Query();
		}
		
		function getTaps() {
			$query = "SELCT a.alc_id, a.name, a.maker, a.alcohol_content FROM alcohol a WHERE type_code = 1";
			
			$this->queryRunner->queryRunner($query);
		}
		
		
		// depenedent on css html...
		function printTaps() {
			
			$count = 0;
			$columnCount = 1;

			while ($row = $this->queryRunner->getRow()) {
					
					$beername = $row[0];
					$brewery = $row[1];
					$alcoholcont = $row[2];
				//do something...
				//print something in html format

				if ($count == 0) {
					echo "<div class=\"four columns\">";
					echo "<ul id=\"beer-column" . $columnCount . "\">";
					$columnCount++;
				}
				
				echo "<li>" . $beername . " " . $brewery . ", " . $alcoholcont . "%</li>";

				$count++;

				if ($count == 9) {
					echo "</ul>";
					echo "</div>";

					$count = 0;
				}
			}
		}
		
    };
?>