<!DOCTYPE html>
<html lang="en">
<head>
<?php
include_once("connection.php");
  if(isset($_POST['Save'])){
    $xid=$_GET['txtIsbn'];
    $isbn=$_POST['txtIsbn'];
    $title=$_POST['txtTitle'];
    $author=$_POST['txtAuthor'];
    $publisher=$_POST['txtPublisher'];
    $copyright_year=$_POST['txtCYear'];
    $status=$_POST['txtStatus'];
    
    $rsql=$dbConn->prepare("SELECT * FROM books WHERE isbn='$isbn'");
    $rsql->execute();
    $rc=$rsql->rowCount();
    if($rc>0 && ($isbn!=$xid)){
    
      echo "<script> alert('Duplicate Book, please check ISBN and try again')</script>";
      
    
    }else{
      $rs=$dbConn->prepare("UPDATE books SET isbn='$isbn',title='$title',author='$author',publisher='$publisher',copyright_year='$copyright_year',status='$status'WHERE isbn='$xid'");
    $rs -> execute();
    echo "<script> alert('successfully updated')</script>";
    echo "<script> window.location='index.php'</script>";
    }
    
    }
        $xid = $_GET['isbn'];
        $sql = " SELECT * from books WHERE isbn = '$xid'";
        $stmt = $dbConn ->query($sql);
        $row =  $stmt ->fetch();
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
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Transaction">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-book"></i>
            <span class="nav-link-text">Transactions</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="#">Borrow Books</a>
            </li>
            <li>
              <a href="#">Return Book</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Manage-User">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-book"></i>
            <span class="nav-link-text">Manage User</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="#">Membership</a>
            </li>
            <li>
              <a href="#">View Members</a>
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
          <a href="#">Manage</a>
        </li>
        <li class="breadcrumb-item active">Books</li>
      </ol>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> List of Books</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ISBN</th>
                  <th>Title</th>
                  <th>Author</th>
                  <th>Publisher</th>
                  <th>Copyright Year</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ISBN</th>
                  <th>Title</th>
                  <th>Author</th>
                  <th>Publisher</th>
                  <th>Copyright Year</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                   $sql = "select * from books";
                     foreach ($dbConn->query($sql) as $rec){
                ?>
                <tr>
                  <td><?php echo $rec['isbn']?></td>
                  <td><?php echo $rec['title']?></td>
                  <td><?php echo $rec['author']?></td>
                  <td><?php echo $rec['publisher']?></td>
                  <td><?php echo $rec['copyright_year']?></td>
                  <td><?php echo $rec['status']?></td>
                  <td><button type="button" data-toggle="modal" data-target="#EditBookModal">Edit</a></td>
                </tr>
                <?php
                    }
                ?>
              </tbody>
            </table>
            <br>
            <!--Add Books Modal-->
             <div class="container">
                <div class="modal fade" id="EditBookModal" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Edit Book</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <form method="POST" action="editbook.php">
                        <div class="modal-body">
                          ISBN: <input type="text" class="form-control" name="txtIsbn" aria-describedby="ISBN" value="<?php echo $row['isbn'];?>">
                          Title: <input type="text" class="form-control" name="txtTitle" aria-describedby="Title" value="<?php echo $row['title'];?>">
                          Author: <input type="text" class="form-control" name="txtAuthor" aria-describedby="Author" value="<?php echo $row['author'];?>">
                          Publisher: <input type="text" class="form-control" name="txtPublisher" aria-describedby="Publisher" value="<?php echo $row['publisher'];?>"><br/>
                          Copyright Year: <input type="text" class="form-control" name="txtCYear" aria-describedby="Copyright Year" value="<?php echo $row['copyright_year'];?>">
                          Status: <select class="form-control" name="txtStatus" value="<?php echo $row['status'];?>">
                                    <option name="New">New</option>
                                    <option name="Old">Old</option>
                                    <option name="Damage">Damage</option>
                                    <option name="Archive">Archive</option>
                                    <option name="Lost">Lost</option>
                                  </select>
                          <div class="modal-footer">
                            <td><input type="submit" class="btn btn-default" name="Save" value="Save"></td>
                          </div>
                        </div>
                      </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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