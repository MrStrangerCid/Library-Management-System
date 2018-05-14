<?php

Class Connection{
 
	private $server = "mysql:host=localhost;dbname=lms_db_main";
	private $username = "root";
	private $password = "";
	private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
	protected $dbConn;
 	
	public function open(){
 		try{
 			$this->dbConn = new PDO($this->server, $this->username, $this->password, $this->options);
 			return $this->dbConn;
 		}
 		catch (PDOException $e){
 			echo "There is some problem in connection: " . $e->getMessage();
 		}
 
    }
 
	public function close(){
   		$this->dbConn = null;
 	}
 
}
 
?>