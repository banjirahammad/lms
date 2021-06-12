<?php
  require_once('../dbcon.php');
  if (isset($_GET['remove'])) {
    $remover_id = $_GET['remove'];
    $user_photo = $_GET['photo'];
    $id =  base64_decode($remover_id);
    $delete = mysqli_query($dbcon,"UPDATE `students` SET `photo`='' WHERE `id` = '$id'");
    if ($delete) {
       unlink('../images/students/'.$user_photo);
     }
     header('location:user-profile.php');
  }
  if (isset($_POST['updatePhoto'])) {
      $id = $_POST['id'];
      $user = mysqli_query($dbcon,"SELECT * FROM `students` WHERE `id`='$id' ");
      $user = mysqli_fetch_assoc($user);
      // print_r($user);
      $image = explode('.',$_FILES['user_photo']['name']);
      $image_ext = end($image);

      $img_name = $user['username'].date('ymdhis').'.'.$image_ext;
      $pre_img = $user['photo'];
      // echo $pre_img;
      if ($pre_img!="") {
        unlink('../images/students/'.$pre_img);
      }
      $result = mysqli_query($dbcon,"UPDATE `students` SET `photo`='$img_name' WHERE `id`='$id' ");
      if ($result) {
        $img_upload = move_uploaded_file($_FILES['user_photo']['tmp_name'],'../images/students/'.$img_name);
        header('location:user-profile.php');
        exit();
      }

    }else {
      header('location:user-profile.php');
      exit();
    }

 ?>
