<?php
  require_once('../dbcon.php');
  $page = explode('/',$_SERVER['PHP_SELF']);
  $page = end($page);
  session_start();
  if (!isset($_SESSION['student_login'])) {
    session_destroy();
    header('location:sign-in.php');
  }
  $email = $_SESSION['student_login'];
  $statusc =  mysqli_query($dbcon,"SELECT * FROM `students` WHERE `email`= '$email'");
  $statusc = mysqli_fetch_assoc($statusc);
  $user = $statusc;

  $status_no = $statusc['status'];

  if ($status_no!=1) {
    session_destroy();
    header('location:sign-in.php');
  }

 ?>
<!doctype html>
<html lang="en" class="fixed left-sidebar-top">
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
    <title>LMS || Student View Area</title>

    <!-- =========================================================
                          faveicon
    ========================================================== -->
    <link rel="shortcut icon" href="../images/favicon.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="../assets/favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../images/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.png">



    <!--load progress bar-->
    <script src="../assets/vendor/pace/pace.min.js"></script>
    <link href="../assets/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">

    <!-- ========================================================= -->
    <!--Notification msj-->
    <link rel="stylesheet" href="../assets/vendor/toastr/toastr.min.css">

    <!--Magnific popup-->
    <link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css">

    <!--dataTable-->
    <link rel="stylesheet" href="../assets/vendor/data-table/media/css/dataTables.bootstrap.min.css">

    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
    <link rel="stylesheet" href="../assets/stylesheets/css/style1.css">


  </head>

  <body>
    <div class="wrap">
        <!-- page HEADER -->
        <!-- ========================================================= -->
        <div class="page-header">
            <!-- LEFTSIDE header -->
            <div class="leftside-header">
                <div class="logo">
                    <a href="index.php" class="on-click">
                        <h3>Students Part</h3>
                    </a>
                </div>
                <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>
            <!-- RIGHTSIDE header -->
            <div class="rightside-header">
                <div class="header-middle"></div>
                <!--USER HEADERBOX -->
                <div class="header-section" id="user-headerbox">
                    <div class="user-header-wrap">
                        <div class="user-photo">
                          <?php if ($user['photo']==""){ ?>
                            <img alt="profile photo" src="../images/students/avatar.jpg" />
                          <?php } else {  ?>
                            <img alt="profile photo" src="../images/students/<?= $user['photo']; ?>">
                          <?php } ?>
                        </div>
                        <div class="user-info">
                            <span class="user-name"><?= ucwords($statusc['fname']).' '.ucwords($statusc['lname']); ?></span>
                            <span class="user-profile">Students</span>
                        </div>
                        <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                        <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                    </div>
                    <div class="user-options dropdown-box">
                        <div class="drop-content basic">
                            <ul>
                                <li> <a href="user-profile.php"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                                <li> <a href="logout.php"><i class="fa fa-sign-out " ></i>logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header-separator"></div>
                <!--Log out -->
                <div class="header-section">
                    <a href="logout.php" data-toggle="tooltip" data-placement="left" title="Logout"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <!-- page BODY -->
        <!-- ========================================================= -->
        <div class="page-body">
            <!-- LEFT SIDEBAR -->
            <!-- ========================================================= -->
            <div class="left-sidebar">
                <!-- left sidebar HEADER -->
                <div class="left-sidebar-header">
                    <div class="left-sidebar-title">Menu</div>
                    <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
                        <span></span>
                    </div>
                </div>

                <!-- NAVIGATION -->
                <!-- ========================================================= -->
                <div id="left-nav" class="nano">
                    <div class="nano-content">
                        <nav>
                            <ul class="nav nav-left-lines" id="main-nav">
                                <!--HOME-->
                                <li class="<?= $page == 'index.php'?'active-item':''  ?>"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
                                <li class="<?= $page == 'books.php'?'active-item':''  ?>"><a href="books.php"><i class="fa fa-book" aria-hidden="true"></i><span>books</span></a></li>
                                <li class="<?= $page == 'user-profile.php'?'active-item':''  ?>"><a href="user-profile.php"><i class="fa fa-user" aria-hidden="true"></i><span>profle</span></a></li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- CONTENT -->
            <!-- ========================================================= -->
            <div class="content">
