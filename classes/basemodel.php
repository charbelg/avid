<?php
abstract class BaseModel {
	protected $database;
	public function __construct() {
		try {
			$this->database = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
			$this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch(PDOException $e) {
				echo 'ERROR: ' . $e->getMessage();
			}
	}
	
	public function __destruct() {
		$this->database = null;
	}
} 
?>