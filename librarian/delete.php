<?php
require_once('../dbcon.php');
  if ($_GET['bookdelete']) {
    $bookdelete = $_GET['bookdelete'];
    $id =  base64_decode($bookdelete);
    $delete = mysqli_query($dbcon,"DELETE FROM `books` WHERE `id` = '$id'");
    header('location:managebooks.php');
  }


 ?>
