<?php
	
	//include 'config.php';
	
	class DbConnection{
			
		var $server; 
		var $username; 
		var $db; 
		var $password;
		var $conn;
		
		function DbConnection()	{
			$this->server = "localhost";
			//$this->username = "root";
			$this->username = "tfksdevc_pubuser";
			$this->db = "tfksdevc_pub";
			$this->password = "911Trazom119";
		}
		
		function connect () {
				
			$this->conn = mysqli_connect($this->server, $this->username, $this->password, $this->db);
			
			return $this->conn;
		
		}
	
		function disconnect(){
			mysqli_close($this->conn);
		}
	
	};
	
?>