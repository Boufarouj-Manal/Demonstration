<?php
	class Connect{
		public static $mysqli = null;
		
		public function connect(){
			self::$mysqli = new mysqli("localhost", "root", "", "projetlogiciell");
			self::$mysqli->set_charset("utf8");
			if(self::$mysqli->connect_errno){
			   die('Error Connecting with Data Source');
			   exit();
			}
			return self::$mysqli;
		}

		public function deconnect(){
			self::$mysqli->close();
		}
	}
?>