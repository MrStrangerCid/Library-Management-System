<?php include "connection.php";
  if(isset($_POST['Save'])){
    $isbn=$_POST['txtIsbn'];
    $title=$_POST['txtTitle'];
    $author=$_POST['txtAuthor'];
    $publisher=$_POST['txtPublisher'];
    $copyright_year=$_POST['txtCYear'];
    $status=$_POST['txtStatus'];
    
    $rs=$conn->prepare("SELECT * FROM books WHERE isbn='$isbn'");
    $rs->execute();
    $rc=$rs->rowCount();
    if($rc>0 && $isbn!=""){
      echo "<script> alert('Duplicate Book)</script>";
    }else{
      $conn->exec("INSERT INTO books (isbn, title, author, publisher, copyright_year, status) Values ('$isbn', '$title', '$author', '$publisher', '$copyright_year', '$status')");
        echo "<script>alert('Sucessfully saved!')</script>";
        echo "<script>window.location= 'tables.php'</script>";
    }
  }
?>