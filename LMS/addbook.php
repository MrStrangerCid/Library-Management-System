<!DOCTYPE html>
<html lang="en">
<head>
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
      echo "<script> alert('Duplicate Book, Please check ISBN')</script>";
    }else{
      $conn->exec("INSERT INTO books Values ('$isbn', '$title', '$author', '$publisher', '$copyright_year', '$status')");
        echo "<script>alert('Sucessfully saved!')</script>";
        echo "<script>window.location= 'addbook.php'</script>";
    }
  }
?>
  <title>Library Management System</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="css/sb-admin.css" rel="stylesheet">
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Library Management System</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Main Menu</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="tables.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">View All Books</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-book"></i>
            <span class="nav-link-text">Manage Books</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="addbook.php">Add Book</a>
            </li>
            <li>
              <a href="editbook.php">View Books</a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
     <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-fw fa-sign-out"></i>Logout</a>
          </li>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a>Manage Book</a>
        </li>
        <li class="breadcrumb-item active">Add Book</li>
      </ol>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Add Book</div>
        <form method = "POST">
        <div class="card-body">
          <div class="form-group row">
            <label class="col-2 col-form-label">ISBN</label>
              <div class="col-3">
                <input class="form-control" type="text" placeholder="ISBN" name="txtIsbn">
              </div>
          </div>
          <div class="form-group row">
            <label class="col-2 col-form-label">Title</label>
              <div class="col-8">
                <input class="form-control" type="text" placeholder="ex. Introduction to LMS" name="txtTitle">
              </div>
          </div>
          <div class="form-group row">
            <label class="col-2 col-form-label">Author</label>
              <div class="col-8">
                <input class="form-control" type="text" placeholder="ex. John Doe" name="txtAuthor">
              </div>
          </div>
          <div class="form-group row">
            <label class="col-2 col-form-label">Publisher</label>
              <div class="col-8">
                <input class="form-control" type="text" placeholder="ex. LMS Publishing Corp" name="txtPublisher">
              </div>
          </div>
          <div class="form-group row">
            <label class="col-2 col-form-label">Copyright Year</label>
              <div class="col-2">
                <input class="form-control" type="text" placeholder="ex. 2000" name="txtCYear">
              </div>
          </div>
          <div class="form-group row">
            <label class="col-2 col-form-label">Status</label>
              <div class="col-2">
                <select class="form-control" name="txtStatus">
                    <option name="New">New</option>
                    <option name="Old">Old</option>
                    <option name="Damage">Damage</option>
                    <option name="Archive">Archive</option>
                    <option name="Lost">Lost</option>
                </select>
              </div>
          </div>
            <td><input type="submit" class="btn btn-success btn-block" name="Save" value="Save"></td>
        </div>
      </div>
    </form>
    </div>
  </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © LMS 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="js/sb-admin.min.js"></script>
    <script src="js/sb-admin-datatables.min.js"></script>
  </div>
</body>
</html>