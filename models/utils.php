<?php
class UtilsModel {
	private $db;
	private $mem;
	private static $instance = NULL;

	private function __construct(){
		//Connect to database
		$this->db = new PDO('mysql:host=localhost;dbname=PythonQuest;charset=utf8', 'PythonQuest', 'J2CovjA4HyzHGaHd');
		//Connect to memcached
		$this->mem = new Memcached();
		$this->mem->addServer("127.0.0.1", 11211) or die("Unable to connect");
	}

	public static function Instance(){
		if (!isset(self::$instance)){
			self::$instance = new UtilsModel();
		}
		return self::$instance;
	}

	public function getDB(){
		return $this->db;
	}

	public function getMemcached(){
		return $this->mem;
	}
		
}
