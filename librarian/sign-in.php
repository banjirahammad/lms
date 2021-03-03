<?php
  require_once("../dbcon.php");
  session_start();
  if (isset($_SESSION['librarian_login'])) {
    header('location:index.php');
  }

  if (!empty($_POST)) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $input_error = array();

    if(empty($email)){
      $input_error['email'] = "* Email field is required";
    }
    else {
      if (empty($password)) {
        $input_error['password']="* Password field is required";
      }else {
        $email_check = mysqli_query($dbcon,"SELECT * FROM `librarian` WHERE `email`= '$email'");
        if (mysqli_num_rows($email_check)==1) {
          $result = mysqli_fetch_assoc($email_check);
          if ($result['email']==$email) {
            if ($password==$result['password']) {
              $_SESSION['librarian_login'] = $email;
              $_SESSION['librarian_username'] = $result['username'];
              header('location:index.php');
            }else {
              $error = " Invalid Password";
            }
          }else {
            $error = " Invalid Email";
          }
        }else {
          $error = " This canditate are not registered";
        }
      }
    }
  }

 ?>


<!doctype html>
<html lang="en" class="fixed accounts sign-in">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Librarian || Sign in</title>
    <link rel="apple-touch-icon" sizes="120x120" href="../assets/favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
          <!-- <img alt="logo" src="../assets/images/logo-dark.png" /> -->
          <h1 class="text-center">LMS</h1>
          <?php
            if (isset($success)) {
              echo '<div class="alert alert-success fade in">
                  <a href="#" class="close" data-dismiss="alert">×</a>
                  <strong>Success!</strong>'.$success.
              '</div>';
            }
            if (isset($error)) {
              echo '<div class="alert alert-danger fade in">
                  <a href="#" class="close" data-dismiss="alert">×</a>
                  <strong>Sorry!</strong>'.$error.
              '</div>';
            }
          ?>
        </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?= isset($email)?$email:''?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php if (isset($input_error['email'])) {
                              echo '<span class="input_error">'.$input_error['email'].'</span>';
                            } ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php if (isset($input_error['password'])) {
                              echo '<span class="input_error">'.$input_error['password'].'</span>';
                            } ?>
                        </div>
                        <div class="form-group">
                            <div class="checkbox-custom checkbox-primary">
                                <input type="checkbox" id="remember-me" name="check" value="check" checked>
                                <label class="check" for="remember-me">Remember me</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary btn-block" type="submit" name="signin" value="Sign in">
                        </div>
                        <div class="form-group text-center">
                            <a href="pages_forgot-password.html">Forgot password?</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../assets/javascripts/template-script.min.js"></script>
<script src="../assets/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>


</html>
