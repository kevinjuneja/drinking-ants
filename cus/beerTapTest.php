<?php
   
   include_once 'connect_db.php';
   
   include 'admin_functions.php';
   
   $adminFunct = new AdminFunctions();
   
   //$dbCon = new DbConnection();
  // $conn = $dbCon->connect();
   
  // $conn = connect();
   
   $addBeer= TRUE;
   
   if ((isset($_POST["beername"])) && (isset($_POST["brewery"]))
   		&& (isset($_POST["alcohol_content"]))) {
   			
			$beername = $_POST["beername"];
			$brewery = $_POST["brewery"];
			$alcohol_cont = $_POST["alcohol_content"];
			
			if(count($beername) <= 30 && count($brewery) <= 30) {
			
				$addBeer = $adminFunct->addBeer($beername, $brewery, $alcohol_cont);
			
				unset($_POST["beername"]);
				unset($_POST["brewery"]);
				unset($_POST["alcohol_content"]);
			
				header("Location: beerTapTest.php");
			}
   	}
		
	for ($i = 1; $i <= 30; $i++) {
		if(isset($_POST["tap".$i])) {
			$beer_id = $_POST["tap".$i];
			
			$updateTap = $adminFunct->updateTap($i, $beer_id);
			
			unset($_POST["tap".$i]);
		}
	}
	
	//header("Location: beerTapTest.php");
   
?>


<html>
	<head>
	
	</head>
	<body>
		
		<?php 
			if($addBeer == FALSE) {
				echo "<h1>There was a problem adding a beer! Traced to Query.</h1>";
			}
		?>
		
		<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
			Beer Name:	<input type="text" id="beername" name="beername"\>
			Brewery:	<input type="text" id="brewery" name="brewery" />
			Alcohol Content:	<input type="number" id="alcohol_content" name="alcohol_content" />
			<input type="submit" value="Enter" />
		</form>
		
		<h2>All Beers</h2>
		<table border="1">
			<tr>
				<th>Beer ID</th>
				<th>Beer Name</th>
				<th>Brewery</th>
				<th>Alcohol Content</th>
			</tr>
				<?php 
					$query = "SELECT * FROM beer";
					
					$temp = new Query();
					
					$results = $temp->queryRunner($query);
					
					//$q_query = mysqli_query($conn, $query);
					
					while ($row = mysqli_fetch_row($results)) {
						echo "<tr><td>".$row[0]."</td>"."<td>".$row[1]."</td>"."<td>".$row[2]."</td><td>".$row[3]."</td></tr>";
					}
				
				?>
			
		</table>
		
		<h2>Beers on Tap</h2>
		<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
		<table border="1">
			<tr>
				<th>Tap ID</th>
				<th>Beer Name</th>
				<th>Beer Input</th>
			</tr>
			<?php
				$query = "SELECT t.tap_id, b.beer_name FROM beer b, taps t WHERE b.beer_id = t.beer_id ORDER BY t.tap_id";
				
				$results = $temp->queryRunner($query);
				
				while ($row = mysqli_fetch_row($results)){
					echo "<tr><td>".stripslashes($row[0])."</td><td>".stripslashes($row[1])."</td><td><input type=\"number\" id=\"tap".stripslashes($row[0]).
					"\" name=\"tap".stripslashes($row[0])."\" /></td></tr>";
				}
				
				$adminFunct->kill_connection();
			?>
		</table>
			<input type="submit" value="Update Taps" />
			<br /><br />
		</form>
		
	</body>
</html>