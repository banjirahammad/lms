<?php

  require_once('../dbcon.php');
  $id = $_GET['qr'];
  $id = base64_decode($id);
  mysqli_query($dbcon,"UPDATE `students` SET `status`=1 WHERE `id` = '$id' ");
  header('location:students.php');
