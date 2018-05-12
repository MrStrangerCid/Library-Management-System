<!DOCTYPE html>
<html lang="en">

<head>
<?php include "connection.php";
  if(isset($_POST['Save'])){
    $username=$_POST['txtUsername'];
    $password=$_POST['txtPassword'];
    $fname=$_POST['txtFname'];
    $lname=$_POST['txtLname'];
    $rs=$dbConn->prepare("SELECT * FROM users WHERE username='$username'");
    $rs->execute();
    $rc=$rs->rowCount();
    if($rc>0 && $isbn!=""){
      echo "<script> alert('Duplicate Username! Please retype')</script>";
    }else{
      $dbConn->exec("INSERT INTO users Values ('$username', '$password', '$fname', '$lname')");
        echo "<script>alert('Sucessfully Registered!')</script>";
        echo "<script>window.location= 'login.php'</script>";
    }
  }
?>
  <title>LMS</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form method="POST">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">First name</label>
                <input type="text" class="form-control" name="txtFname" autofocus required><br/>
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Last name</label>
                <input type="text" class="form-control" name="txtLname" required><br/>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputUsername">Username</label>
            <input type="text" class="form-control" name="txtUsername" required><br/>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="txtPassword" required><br/>
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Confirm password</label>
                <input type="password" class="form-control" name="txtPassword" required><br/>
              </div>
            </div>
          </div>
          <td><input type="submit" class="btn btn-primary btn-block" name="Save" value="Save"></td>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Login Page</a>
        </div>
      </div>
    </div>
  </div>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
