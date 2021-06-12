<?php
  require_once('../dbcon.php');
  if (isset($_POST['update_book'])) {
    $book_name = $_POST['book_name'];
    $book_id = base64_decode($_POST['book_id']);
    $book_edition = $_POST['edition'];
    $author_name = $_POST['author_name'];
    $publication_name = $_POST['publication_name'];
    $purchase_date = $_POST['purchase_date'];
    $book_price = $_POST['book_price'];
    $book_qty = $_POST['book_qty'];
    $available_qty = $_POST['available_qty'];

    $input_error =array();
    if (empty($book_name)) {
      $input_error['book_name'] = "* This field is required";
    }
    if (empty($book_edition)) {
      $input_error['book_edition'] = "* This field is required";
    }
    if (empty($author_name)) {
      $input_error['author_name'] = "* This field is required";
    }
    if (empty($publication_name)) {
      $input_error['publication_name'] = "* This field is required";
    }
    if (empty($purchase_date)) {
      $input_error['purchase_date'] = "* This field is required";
    }
    if (empty($book_price)) {
      $input_error['book_price'] = "* This field is required";
    }else {
      if (!($book_price>=50 && $book_price<1001)) {
        $input_error['book_price'] = "* Min price is 50 and maximum price 1000";
      }
    }

    if (empty($book_qty)) {
      $input_error['book_qty'] = "* This field is required";
    }else {
      if (!($book_qty>=0 && $book_qty<=250)) {
        $input_error['book_qty'] = "* Max quentity 250";
      }
    }
    if (empty($available_qty)) {
      $input_error['available_qty'] = "* This field is required";
    }else {
      if (!($available_qty>=0 && $available_qty<=$book_qty)) {
        $input_error['available_qty'] = "* Quantity not available";
      }
    }

    if (count($input_error)==0) {
      $check_result = mysqli_query($dbcon,"SELECT * FROM `books` WHERE `book_name` = '$book_name' AND `book_author_name` = '$author_name' AND `book_edition` = '$book_edition' ");

      $check_result = mysqli_num_rows($check_result);
      if ($check_result>0) {
        // $error = "This book already exist";
        $ssubmit = mysqli_query($dbcon,"UPDATE `books` SET `book_publication_name`='$publication_name',`book_purchase_date`='$purchase_date',`book_price`='$book_price',`book_qty`='$book_qty',`available_qty`='$available_qty' WHERE `id` = '$book_id'");
        if ($ssubmit) { ?>
          <script type="text/javascript">
            alert('Bookinfo Upadate Succesfull!');
          </script>
        <?php header('location:managebooks.php'); exit(); }

      }else {
        $submit = mysqli_query($dbcon,"UPDATE `books` SET `book_name`='$book_name',`book_edition`='$book_edition',`book_author_name`='$author_name',`book_publication_name`='$publication_name',`book_purchase_date`='$purchase_date',`book_price`='$book_price',`book_qty`='$book_qty',`available_qty`='$available_qty' WHERE `id` = '$book_id'");

        if ($submit) { ?>
          <script type="text/javascript">
            alert('Bookinfo Upadate Succesfull!');
          </script>
        <?php header('location:managebooks.php'); exit(); }
        else { ?>
          <script type="text/javascript">
            alert('Something Wrong Bookinfo not Upadate!!');
          </script>
        <?php header('location:managebooks.php'); exit(); }


      }

    }
  }
 ?>
