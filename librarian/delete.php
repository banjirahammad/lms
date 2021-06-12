<?php
require_once('../dbcon.php');
  if (isset($_GET['bookdelete'])) {
    $bookdelete = $_GET['bookdelete'];
    $bookimg = $_GET['bookimg'];
    $id =  base64_decode($bookdelete);
    $delete = mysqli_query($dbcon,"DELETE FROM `books` WHERE `id` = '$id'");
    if ($delete) {
       unlink('../images/books/'.$bookimg);
     }
     header('location:managebooks.php');
  }


 ?>
