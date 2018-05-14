<!DOCTYPE html>
<html lang="en">
<head>
  <title>Library Management System</title>
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
                  <th>Book ID</th>
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
                  <th>Book ID</th>
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
                <?php include_once('connection.php');

                  $database = new Connection();
                  $db = $database->open();
                  try{  
                    $sql = 'Select * from books';
                     foreach ($db->query($sql) as $rec){
                  ?>
                <tr>
                  <td><?php echo $rec['bookID']?></td>
                  <td><?php echo $rec['isbn']?></td>
                  <td><?php echo $rec['title']?></td>
                  <td><?php echo $rec['author']?></td>
                  <td><?php echo $rec['publisher']?></td>
                  <td><?php echo $rec['copyright_year']?></td>
                  <td><?php echo $rec['status']?></td>
                  <td><a href="#edit_<?php echo $rec['bookID']; ?>" class="btn btn-success" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>
                  <?php include('edit_modal.php'); ?>
                </tr>
                <?php
                    }
                  }
                 catch(PDOException $e){
                  echo "There is some problem in connection: " . $e->getMessage();
                  }
                  $database->close();
                  ?>
              </tbody>
            </table>
            <br>
          </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
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