<?php 

	class Database{

		public function __construct(){

			$host="";
			$user="";
			$password="";
			$database="";
			$dsn="";
			$pdo="";

		}

		
		public function connect(){

			$this->host = "localhost";
			$this->user = "root";
			$this->password = "";
			$this->database = "iap-lab";

			$this->dsn = "mysql:host=".$this->host.";dbname=".$this->database;

			try {

				$connect = new PDO($this->dsn,$this->user,$this->password);

				$connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
				return $connect;
				
			} catch (Exception $e) {

				echo "No Connected";
				
			}

		} 

	}

 ?>