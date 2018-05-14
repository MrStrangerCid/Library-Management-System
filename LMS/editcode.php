<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$bookID = $_GET['bookID'];
			$isbn=$_POST['txtIsbn'];
    		$title=$_POST['txtTitle'];
    		$author=$_POST['txtAuthor'];
    		$publisher=$_POST['txtPublisher'];
    		$copyright_year=$_POST['txtCYear'];
    		$status=$_POST['txtStatus'];

			$sql = ("UPDATE books SET isbn='$isbn', title='$title', author='$author', publisher='$publisher', copyright_year='$copyright_year', status='$status' WHERE bookID='$bookID'");
			
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Member updated successfully' : 'Something went wrong. Cannot update member';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		$database->close();
	}
	else{
		$_SESSION['message'] = 'Fill up edit form first';
	}

	header('location: editbook.php');
?>