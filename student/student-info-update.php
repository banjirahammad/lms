<?php
  require_once('../dbcon.php');
  if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $Query = "UPDATE `students` SET `fname`='$fname', `lname`='$lname',`phone_number`='$phone_number',`address`='$address' WHERE `id` = '$id' ";
    $result = mysqli_query($dbcon,$Query);

  }else {
    header('location:user-profile.php');
    exit();
  }

?>
