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
			$this->username = "root";
			$this->db = "pub2";
			$this->password = "";
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