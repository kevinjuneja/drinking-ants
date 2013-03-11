<?php
	include_once 'query.php';

	class PressPrinter {

		var $queryRunner;
		var $arrayOfImg;

		function PressPrinter() {
			$this->queryRunner = new Query();
			$this->arrayOfImg = array();
		}


		function printPress() {
			$query = "SELECT * FROM press";

			$this->queryRunner->queryRunner($query);
			$count = 0;

			while($row = $this->queryRunner->getRow()) {
				
				$title = $this->queryRunner->removeEscapeChars($row[1]);
				$publ = $this->queryRunner->removeEscapeChars($row[2]);
				$desc = $this->queryRunner->removeEscapeChars($row[3]);
				$picloc = $this->queryRunner->removeEscapeChars($row[4]);
				$link = $this->queryRunner->removeEscapeChars($row[5]);

				array_push($this->arrayOfImg, $picloc);

				echo "<div class=\"press-slide\">";
				echo "<h3>" . $title . "</h3>";
				echo "<h4>" . $publ . "</h4>";
				echo "<div class=\"inner-slide-div\">";
				echo "<p>" . $desc . "</p>";
				echo "<ul class=\"button-group even two-up\">";
				echo "<li><a class=\"alert button\" href=\"" . $link . "\">View Article</a></li>";
				echo "<li><a class=\"alert button\" data-reveal-id=\"press-reveal-" . $count . "\">View Screenshot</a></li>";
				echo "</ul>";
				echo "</div>";
				echo "</div>";
				++$count;
			}
		}

		function pressReveals() {
			$size = count($this->arrayOfImg);

			for ($i = 0; $i < $size; $i++) {
				$file = $this->arrayOfImg[$i];

				if (is_null($file) || $file == "") {
					$file = "#";
				}
				else {
					$file = "press/" . $file;
				}

				echo "<div id=\"press-reveal-" . $i . "\" class=\"reveal-modal\">";
				echo "<img src=\"" . $file . "\" />";
				echo "<a class=\"close-reveal-modal\">&#215;</a>";
				echo "</div>";
			}

			$this->queryRunner->disconnect();
		}
	};

	
?>