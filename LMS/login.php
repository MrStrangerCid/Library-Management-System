<!DOCTYPE html>
<html lang="en">

<head>
  <?php
    session_start();
    if(isset($_POST['username']) and isset($_POST['password'])) { 
    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['username']=$username;

    $sql = $conn->prepare("SELECT username FROM users WHERE username='$username' and password='$password'");

    if ($conn->query($sql) != 0){
      echo "<script language='javascript' type='text/javascript'> location.href='index.php'</script>";   
      }
      else
      {
    echo "<script type='text/javascript'>alert('User Name Or Password Invalid!')</script>";
    }
  }
    ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>LMS</title>
  <link rel="Icon" href="vendor/LMS.ico" type="image/x-icon">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method = "POST">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input class="form-control" type="text" placeholder="Enter username" autofocus>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" type="password" placeholder="Password">
          </div>
          <a class="btn btn-success btn-sm" href="index.php">Sign In</a>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
        </div>
      </div>
    </div>
  </div>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>
</html>