<?php
	$host  = 'localhost';
	$db = 'lms_db_main';
	$username = 'root';
	$password = '';
	
	$dsn = "mysql:host=$host;dbname=$db";
	
	try{
		$dbConn = new PDO("mysql:host={$host};dbname={$db}",$username, $password);
		
		$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	}catch (PDOException $e){
		echo $e->getMessage(); 
	}
?>