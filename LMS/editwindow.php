<!DOCTYPE html>
<html lang="en">
<head>
  <title>Library Management System</title>
  <link rel="Icon" href="vendor/LMS.ico" type="image/x-icon">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="css/sb-admin.css" rel="stylesheet">
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Library Management System</a>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-bank"></i>
            <span class="nav-link-text">Main Menu</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="tables.php">
            <i class="fa fa-fw fa-eye"></i>
            <span class="nav-link-text">View All Books</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-cogs"></i>
            <span class="nav-link-text">Manage Books</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="addbook.php"><i class="fa fa-fw fa-plus"></i> Add Book</a>
            </li>
            <li>
              <a href="editbook.php"><i class="fa fa-fw fa-edit"></i> Edit Books</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Transaction">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#transactionComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-suitcase"></i>
            <span class="nav-link-text">Transactions</span>
          </a>
          <ul class="sidenav-second-level collapse" id="transactionComponents">
            <li>
              <a href="#"><i class="fa fa-fw fa-shopping-basket"></i> Borrow Books</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-fw fa-tags"></i> Return Book</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Manage-User">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#userComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-group"></i>
            <span class="nav-link-text">Manage User</span>
          </a>
          <ul class="sidenav-second-level collapse" id="userComponents">
            <li>
              <a href="#"><i class="fa fa-fw fa-vcard-o"></i> Membership</a>
            </li>
            <li>
              <a href="members.php"><i class="fa fa-fw fa-sitemap"></i> View Members</a>
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
        <li class="breadcrumb-item active">Edit Book</li>
      </ol>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Edit Book</div>
        <form method = "POST">
          <?php
          include_once('connection.php');
          if(isset($_POST['Save'])){
            $xid =$_GET['xid'];
            $bookID = $_POST['bookID'];
            $isbn=$_POST['txtIsbn'];
            $title=$_POST['txtTitle'];
            $author=$_POST['txtAuthor'];
            $publisher=$_POST['txtPublisher'];
            $copyright_year=$_POST['txtCYear'];
            $status=$_POST['txtStatus'];

            $rsql=$conn->prepare("SELECT * FROM books WHERE bookID='$bookID'");
            $rsql->execute();
            $rc=$rsql->rowCount();
            if($rc>0 && ($id!=$xid)){
              echo "<script> alert('Please retype')</script>";
            }else{
              $rs=$conn->prepare("UPDATE books SET isbn='$isbn', title='$title', author='$author', publisher='$publisher', copyright_year='$copyright_year', status='$status' WHERE bookID='$bookID'");
              $rs -> execute();
              echo "<script> alert('Successfully updated')</script>";
              echo "<script> window.location='editbook.php'</script>";
            }
          }
          $xid = $_GET['xid'];
          $sql = " SELECT * from books WHERE bookID = '$xid'";
          $stmt = $conn ->query($sql);
          $row =  $stmt ->fetch();
          ?>
        <div class="card-body">
          <div class="form-group row">
            <label class="col-2 col-form-label">ISBN</label>
              <div class="col-3">
                <input class="form-control" type="number" name="txtIsbn" value="<?php echo $row['isbn']?>" required>
              </div>
          </div>
          <div class="form-group row">
            <label class="col-2 col-form-label">Title</label>
              <div class="col-8">
                <input class="form-control" type="text" name="txtTitle" value="<?php echo $row['title']?>" required>
              </div>
          </div>
          <div class="form-group row">
            <label class="col-2 col-form-label">Author</label>
              <div class="col-8">
                <input class="form-control" type="text" name="txtAuthor" value="<?php echo $row['author']?>" required>
              </div>
          </div>
          <div class="form-group row">
            <label class="col-2 col-form-label">Publisher</label>
              <div class="col-8">
                <input class="form-control" type="text" name="txtPublisher" value="<?php echo $row['publisher']?>" required>
              </div>
          </div>
          <div class="form-group row">
            <label class="col-2 col-form-label">Copyright Year</label>
              <div class="col-2">
                <select class="form-control" name="txtCYear" id="year" value="<?php echo $row['copyright_year']?>"></select>
              </div>
          </div>
          <div class="form-group row">
            <label class="col-2 col-form-label">Status</label>
              <div class="col-2">
                <select class="form-control" name="txtStatus" value="<?php echo $row['status']?>">
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
      <?
    }
      ?>
    </form>
    </div>
  </div>
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © LMS 2018</small>
        </div>
      </div>
    </footer>
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
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
            <a class="btn btn-primary" href="login.php">Logout</a>
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
    <script type="text/javascript">
      var year = 1900;
      var till = 2018;
      var options = "";
        for(var y=year; y<=till; y++){
          options += "<option>"+ y +"</option>";
          }
          document.getElementById("year").innerHTML = options;
    </script>
  </div>
</body>
</html>