<?php include '../Frontend/classes/adminlogin.php'; ?>
<?php
    $class = new Adminlogin();
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $adminEmail = $_POST['adminEmail'];
        $adminPass = md5 ($_POST['adminPass']);
        $login_check = $class-> login_admin($adminEmail, $adminPass);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="assets/css/all.min.css">

  <style>
    .custom-margin {
         margin-top: 8vh;
      }
   </style>
  <title>Login</title>
</head>
<body>
  <div class="mb-3 text-center mt-5" style="font-size: 30px;">
    <i class="fas fa-stethoscope"></i>
    <span>Online Maintenance Managment System</span>
  </div>
  <p class="text-center" style="font-size: 20px;"> <i class="fas fa-user-secret text-danger"></i> <span>Admin
      Area(Demo)</span>
  </p>
  <div class="container-fluid mb-5">
    <div class="row justify-content-center custom-margin">
      <div class="col-sm-6 col-md-4">
        <form action="" class="shadow-lg p-4" method="POST">
          <div class="form-group">
            <i class="fas fa-user"></i><label for="email" class="pl-2 font-weight-bold">Email</label><input type="email"
              class="form-control" placeholder="Email" name="adminEmail">
            <!--Add text-white below if want text color white-->
            <small class="form-text">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">Password</label><input type="password"
              class="form-control" placeholder="Password" name="adminPass">
          </div>
          <input type="submit" class="btn btn-outline-danger mt-3 btn-block shadow-sm font-weight-bold" value="Login">
          <br>
          <?php
              if (isset($login_check)){
                  echo $login_check;
              }
          ?>
        </form>
        <div class="text-center"><a class="btn btn-info mt-3 shadow-sm font-weight-bold" href="../Frontend/index.php">Back
            to Home</a></div>
      </div>
    </div>
  </div>

  <!-- Boostrap JavaScript -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/all.min.js"></script>
</body>
</html>