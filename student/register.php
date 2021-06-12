<?php
    require_once('../dbcon.php');
    session_start();
    if (isset($_SESSION['student_login'])) {
      header('location:index.php');
    }

    if (!empty($_POST)) {
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $email = $_POST['email'];
      $roll = $_POST['roll'];
      $reg = $_POST['reg'];
      $username = $_POST['username'];
      $phoneno = $_POST['phoneno'];
      $password = $_POST['password'];
      $cpassword = $_POST['cpassword'];

      $input_error =array();
      if (empty($fname)) {
        $input_error['fname'] = "*First name field is required";
      }
      if (empty($lname)){
        $input_error['lname'] = "* Last name field is required";
      }

      if (empty($email)) {
        $input_error['email'] = "* Email field is required";
      }

      if (empty($roll)) {
        $input_error['roll'] = "* Roll field is required";
      }else {
        if(strlen($roll)!=10){
          $input_error['roll'] = "* Roll no must be 10 digit";
        }
      }

      if (empty($reg)) {
        $input_error['reg'] = "* Reg field is required";
      }else {
        if(strlen($reg)!=10){
          $input_error['reg'] = "* Reg no must be 10 digit";
        }
      }

      if (empty($username)) {
        $input_error['username'] = "* Username field is required";
      }

      if (empty($phoneno)) {
        $input_error['phoneno'] = "* Phone Number field is required";
      }else {
        if (strlen($phoneno)!=11) {
          $input_error['phoneno'] = "* Phone number only 11 number";
        }
      }


      if (empty($password)) {
        $input_error['password'] = "* Password field is required";
      }else {
        if(strlen($password)<8){
          $input_error['password'] = "* Password more than 8 charecter";
        }
      }

      if (empty($cpassword)) {
        $input_error['cpassword'] = "* Confirm Password field is required";
      }else {
        if(strlen($cpassword)<8){
          $input_error['cpassword'] = "* Password more than 8 charecter";
        }
      }

      if ($password!=$cpassword) {
        $input_error['cmatch'] = "* Confirm Password donot match";
      }

      if (empty($_POST['agree'])) {
        $input_error['agree'] = "* this field is required";
      }

      if (count($input_error)==0){
        $roll_check = mysqli_query($dbcon,"SELECT `roll` FROM `students` WHERE `roll` = '$roll'");
        if (mysqli_num_rows($roll_check)==0) {
          $reg_check = mysqli_query($dbcon,"SELECT `reg` FROM `students` WHERE `reg` = '$reg'");
          if (mysqli_num_rows($reg_check)==0) {
            $email_check = mysqli_query($dbcon,"SELECT `email` FROM `students` WHERE `email` = '$email'");
            if (mysqli_num_rows($email_check)==0) {
              $phoneno_check = mysqli_query($dbcon,"SELECT `phoneno` FROM `students` WHERE `phoneno` = '$phoneno'");
              if (mysqli_num_rows($phoneno_check)==0) {
                $username_check = mysqli_query($dbcon,"SELECT `username` FROM `students` WHERE `username` = '$username'");
                if (mysqli_num_rows($username_check)==0) {

                  if (strlen($username)>6 && strlen($username)<15) {

                    $pass_hash = password_hash($password, PASSWORD_DEFAULT);
                    $result = mysqli_query($dbcon,"INSERT INTO `students`(`fname`, `lname`, `roll`, `reg`, `email`, `username`, `password`, `phoneno`)VALUES ('$fname','$lname','$roll','$reg','$email','$username','$pass_hash','$phoneno')");

                    if ($result) {
                      $success = "Registration Succesfull!";
                    }else {
                      $reg_error = "Registration value submit error";
                    }

                  }else {
                    $roll_ex = " Username more then 6 charecter";
                  }
                }else {
                  $roll_ex = " Username already exist";
                }
              }else {
                $roll_ex = " This Phone number already exist";
              }

            }else {
              $roll_ex = " This email already exist";
            }
          }else {
            $roll_ex = " This Registration number already exist";
          }
        }else {
          $roll_ex = " This roll already exist";
        }
      }


    }

 ?>


<!DOCTYPE html>
<html lang="en" class="fixed accounts sign-in">

<head>
    <!-- =========================================================
                        meta tag
    ========================================================== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="This is Library Management Project">
    <meta name="author" content="Md. Banjir Ahammad(https://www.banjir-ahammad.com)">
    <meta name="keywords" content="Banjir, banjir, Banjir Ahammad, benajir, web designer, web developer, freelancer">

    <!-- =========================================================
                         page title
    ========================================================== -->
    <title>LMS || Student Registration</title>

    <!-- =========================================================
                          faveicon
    ========================================================== -->
    <link rel="shortcut icon" href="../images/favicon.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="../assets/favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../images/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.png">

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
              if (isset($roll_ex)) {
                echo '<div class="alert alert-danger fade in">
                    <a href="#" class="close" data-dismiss="alert">×</a>
                    <strong>Sorry!</strong>'.$roll_ex.
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
                                <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname" value="<?= isset($fname)?$fname:''?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php
                              if (isset($input_error['fname'])) {
                                echo '<span class="input_error">'.$input_error['fname'].'</span>';
                              }

                             ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname" value="<?= isset($lname)?$lname:''?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php
                              if (isset($input_error['lname'])) {
                                echo '<span class="input_error">'.$input_error['lname'].'</span>';
                              }

                             ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="number" class="form-control" id="roll" placeholder="Roll No" name="roll" pattern="[0-9]{10}" value="<?= isset($roll)?$roll:''?>" >
                                <i class="fa fa-user"></i>
                            </span>
                            <?php
                              if (isset($input_error['roll'])) {
                                echo '<span class="input_error">'.$input_error['roll'].'</span>';
                              }


                             ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="number" class="form-control" id="reg" placeholder="Reg. No" name="reg" pattern="[0-9]{10}" value="<?= isset($reg)?$reg:''?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php
                              if (isset($input_error['reg'])) {
                                echo '<span class="input_error">'.$input_error['reg'].'</span>';
                              }

                             ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?= isset($email)?$email:''?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php
                              if (isset($input_error['email'])) {
                                echo '<span class="input_error">'.$input_error['email'].'</span>';
                              }

                             ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="number" class="form-control" id="phoneno" placeholder="Phone Number" name="phoneno" pattern="01[3|4|5|6|7|8|9][0-9]{8}" value="<?= isset($phoneno)?$phoneno:''?>">
                                <i class="fa fa-phone"></i>
                            </span>
                            <?php
                              if (isset($input_error['phoneno'])) {
                                echo '<span class="input_error">'.$input_error['phoneno'].'</span>';
                              }

                             ?>
                        </div>

                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" id="name" placeholder="Username" name="username" value="<?= isset($username)?$username:''?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php
                              if (isset($input_error['username'])) {
                                echo '<span class="input_error">'.$input_error['username'].'</span>';
                              }

                             ?>
                        </div>

                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" >
                                <i class="fa fa-key"></i>
                            </span>
                            <?php
                              if (isset($input_error['password'])) {
                                echo '<span class="input_error">'.$input_error['password'].'</span>';
                              }
                              if (isset($input_error['password_error'])) {
                                echo '<span class="input_error">'.$input_error['password_error'].'</span>';
                              }

                             ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" id="confirm-password" placeholder="Confirm Password" name="cpassword" >
                                <i class="fa fa-key"></i>
                            </span>
                            <?php
                              if (isset($input_error['cpassword'])) {
                                echo '<span class="input_error">'.$input_error['cpassword'].'</span>';
                              }
                              else if (isset($input_error['cmatch'])) {
                                echo '<span class="input_error">'.$input_error['cmatch'].'</span>';
                              }
                              else {
                                // code...
                              }

                             ?>
                        </div>
                        <div class="form-group">
                            <div class="checkbox-custom checkbox-primary">
                                <input type="checkbox" id="terms" value="1" name="agree">
                                <label class="check" for="terms">I agree </label>  to the <a href="#">Terms and Conditions</a>
                            </div>
                            <?php
                              if (isset($input_error['agree'])) {
                                echo '<span class="input_error">'.$input_error['agree'].'</span>';
                              }

                             ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block" >Register</button>
                        </div>
                        <div class="form-group text-center">
                            Have an account?, <a href="sign-in.php">Sign In</a>
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
