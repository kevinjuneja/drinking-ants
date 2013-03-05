<?php
	
	include_once 'connect_db.php';
	
	class Query {
		var $result;
		var $connect;
		var $conn;
		
		function Query() {
			$this->connect = new DbConnection();
			$this->conn = $this->connect->connect();
		}
		
		function queryRunner($query) {
			return $this->result = mysqli_query($this->conn, $query);
		}
		
		function getConn() {
			return $this->conn;
		}
		
		function results() {
			return $this->results; 
		}
		
		function disconnect() {
			$this->connect->disconnect();
		}
		
		function getRow() {
			if (isset($this->result )){
				return mysqli_fetch_row($this->result);
			}
		}
		
		function removeEscapeChars($string) {
			return stripslashes($string);
		}
	};

?>