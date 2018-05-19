<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		try{
			$database = new Connection();
			$db = $database->open();
			$bookID = $_GET['bookID'];
			$isbn=$_POST['txtIsbn'];
    			$title=$_POST['txtTitle'];
    			$author=$_POST['txtAuthor'];
    			$publisher=$_POST['txtPublisher'];
    			$copyright_year=$_POST['txtCYear'];
    			$status=$_POST['txtStatus'];

			$sql = "UPDATE books SET isbn='$isbn', title='$title', author='$author', publisher='$publisher', copyright_year='$copyright_year', status='$status' WHERE bookID='$bookID'";
				
			$affectedrows  = $db->exec($sql);
 
  			if(isset($affectedrows)){
       				echo "Record has been successfully updated";
				}        
				

			}
		catch (PDOException $e){
 			echo "There is some problem in connection: " . $e->getMessage();
 
			}
 
	header('location: editbook.php');
?>
