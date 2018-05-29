<?php
	$host  = 'localhost';
	$db = 'lms_db_main';
	$username = 'root';
	$password = '';
	
	$dsn = "mysql:host=$host;dbname=$db";
	
	try{
		$conn = new PDO($dsn, $username, $password);
		
		if($conn){
			echo "";
		}
	}catch (PDOException $e){
		echo $e->getMessage(); 
	}
?>