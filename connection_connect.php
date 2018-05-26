<?php
	class conDb {
		private static $instance = NULL;
		private static $dsn =  NULL;
		private static $user =  NULL;
		private static $pass =  NULL;
			private function __construct() {}
			private function __clone() {}
			public static function getInstance() {
			$string = file_get_contents("config.json");
			$json_a = json_decode($string, true);
			$servername = $json_a['servername'];
			$username = $json_a['username'];
			$password = $json_a['password'];
			$database = $json_a['database'];
			$dsn = "mysql:dbname=".$database.";host=".$servername;
			self::$dsn = $dsn;
			self::$user = $username;
			self::$pass = $password;
			if (!isset(self::$instance)) {
				self::$instance = new PDO(self::$dsn,self::$user,self::$pass);
				self::$instance->exec("set names utf8");
			}
			return self::$instance;
			}
		}
?>