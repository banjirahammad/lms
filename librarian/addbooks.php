<?php require_once('header.php') ?>
  <?php


    if (!empty($_POST)) {
      $book_name = $_POST['book_name'];
      $book_edition = $_POST['edition'];
      $author_name = $_POST['author_name'];
      $publication_name = $_POST['publication_name'];
      $purchase_date = $_POST['purchase_date'];
      $book_price = $_POST['book_price'];
      $book_qty = $_POST['book_qty'];
      $available_qty = $_POST['available_qty'];
      $librarian_username = $_SESSION['librarian_username'];

      $image = explode('.',$_FILES['book_image']['name']);
      $image_ext = end($image);

      $book_image = date('ymdhis').'.'.$image_ext;

      $input_error =array();
      if (empty($book_name)) {
        $input_error['book_name'] = "* This field is required";
      }
      if (empty($book_edition)) {
        $input_error['book_edition'] = "* This field is required";
      }

      if (empty($_FILES['book_image']['name'])) {
        $input_error['book_image'] = "* This field is required";
      }else {
        if ($image_ext=='JPG' || $image_ext=='jpg' || $image_ext=='png' || $image_ext=='PNG') {
          $book_image = date('ymdhis.').$image_ext;
        }
        else {
          $input_error['book_image'] = "* Only support jpg and png formate";
        }
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
        $result = mysqli_query($dbcon,"SELECT * FROM `books` WHERE `book_name` = '$book_name' AND `book_author_name` = '$author_name' AND `book_edition` = '$book_edition' ");

        $result = mysqli_num_rows($result);
        if ($result>0) {
          $error = "This book already exist";
        }else {
          $submit = mysqli_query($dbcon,"INSERT INTO `books`(`book_name`, `book_edition`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `available_qty`, `librarian_username`) VALUES ('$book_name','$book_edition','$book_image','$author_name','$publication_name','$purchase_date','$book_price','$book_qty','$available_qty','$librarian_username')");
          $img_upload = move_uploaded_file($_FILES['book_image']['tmp_name'],'../images/books/'.$book_image);
          if (isset($submit) && isset($img_upload)) {
            $success = "Succesfully! Add book";
          }
          else {
            $error = " Something Wrong";
          }
        }

      }





      //mysqli_query($dbcon,"INSERT INTO `books`(`book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `availavle_qty`, `librarian_username`) VALUES ('$book_name','$book_image','$author_name','$publication_name','$purchase_date','$book_price','$book_qty','$available_qty','$librarian_username')");




    }


   ?>
                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li></i><a href="">Add Books</a></li>
                        </ul>
                    </div>
                </div>
                <?php
                  if (isset($success)) {
                    echo '<div class="alert alert-success fade in col-sm-12 col-md-8 col-md-offset-2">
                        <a href="#" class="close" data-dismiss="alert">×</a>
                        <strong> </strong>'.$success.
                    '</div>';
                  }
                  if (isset($error)) {
                    echo '<div class="alert alert-danger fade in col-sm-12 col-md-8 col-md-offset-2">
                        <a href="#" class="close" data-dismiss="alert">×</a>
                        <strong>Sorry!</strong>'.$error.
                    '</div>';
                  }
                ?>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInDown">
                  <div class="col-sm-12 col-md-8 col-md-offset-2">
                    <!-- <h4 class="section-subtitle"><b>Add Books</b></h4> -->
                    <div class="panel">
                      <div class="panel-content">
                          <div class="row">
                              <div class="col-md-12">
                                  <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                      <h5 class="mb-lg">Add Books</h5>
                                      <div class="form-group">
                                          <label for="book_name" class="col-sm-3  control-label">Book Name</label>
                                          <div class="col-sm-9">
                                              <input type="text" class="form-control" id="book_name" name="book_name" placeholder="eg: Chemistry" value="<?= isset($book_name)?$book_name:''?>">
                                              <?php
                                                if (isset($input_error['book_name'])) {
                                                  echo '<span class="input_error">'.$input_error['book_name'].'</span>';
                                                }

                                               ?>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="edition" class="col-sm-3  control-label">Edition</label>
                                          <div class="col-sm-9">
                                            <select name="edition" id="edition" class="form-control ">
                                              <option value="0"  >---Select---</option>
                                              <option value="1" label="1st Edition" <?= $book_edition==1?'selected':''?> >1st Edition</option>
                                              <option value="2" label="2nd Edition" <?= $book_edition==2?'selected':''?> >2nd Edition</option>
                                              <option value="3" label="3rd Edition" <?= $book_edition==3?'selected':''?> >3rd Edition</option>
                                              <option value="4" label="4th Edition" <?= $book_edition==4?'selected':''?> >4th Edition</option>
                                              <option value="5" label="5th Edition" <?= $book_edition==5?'selected':''?> >5th Edition</option>
                                              <option value="6" label="6th Edition" <?= $book_edition==6?'selected':''?> >6th Edition</option>
                                              <option value="7" label="7th Edition" <?= $book_edition==7?'selected':''?> >7th Edition</option>
                                              <option value="8" label="8th Edition" <?= $book_edition==8?'selected':''?> >8th Edition</option>
                                              <option value="9" label="9th Edition" <?= $book_edition==9?'selected':''?> >9th Edition</option>
                                              <option value="10" label="10th Edition" <?= $book_edition==10?'selected':''?> >10th Edition</option>
                                              <option value="11" label="11th Edition" <?= $book_edition==11?'selected':''?> >11th Edition</option>
                                              <option value="12" label="12th Edition" <?= $book_edition==12?'selected':''?> >12th Edition</option>
                                              <option value="13" label="13th Edition" <?= $book_edition==13?'selected':''?> >13th Edition</option>
                                              <option value="14" label="14th Edition" <?= $book_edition==14?'selected':''?> >14th Edition</option>
                                              <option value="15" label="15th Edition" <?= $book_edition==15?'selected':''?> >15th Edition</option>
                                              <option value="16" label="16th Edition" <?= $book_edition==16?'selected':''?> >16th Edition</option>
                                              <option value="17" label="17th Edition" <?= $book_edition==17?'selected':''?> >17th Edition</option>
                                              <option value="18" label="18th Edition" <?= $book_edition==18?'selected':''?> >18th Edition</option>
                                              <option value="19" label="19th Edition" <?= $book_edition==19?'selected':''?> >19th Edition</option>
                                              <option value="20" label="20th Edition" <?= $book_edition==20?'selected':''?> >20th Edition</option>
                                            </select>
                                            <?php
                                              if (isset($input_error['book_edition'])) {
                                                echo '<span class="input_error">'.$input_error['book_edition'].'</span>';
                                              }

                                             ?>

                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="book_image" class="col-sm-3  control-label">Book Image</label>
                                          <div class="col-sm-9">
                                              <input type="file"  id="book_image" name="book_image" >
                                              <?php
                                                if (isset($input_error['book_image'])) {
                                                  echo '<span class="input_error">'.$input_error['book_image'].'</span>';
                                                }

                                               ?>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="author_name" class="col-sm-3  control-label">Author Name</label>
                                          <div class="col-sm-9">
                                              <input type="text"  id="author_name" name="author_name" class="form-control" placeholder="eg: B.L Mitha" value="<?= isset($author_name)?$author_name:''?>" >
                                              <?php
                                                if (isset($input_error['author_name'])) {
                                                  echo '<span class="input_error">'.$input_error['author_name'].'</span>';
                                                }

                                               ?>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="publication_name" class="col-sm-3  control-label">Publication Name</label>
                                          <div class="col-sm-9">
                                              <input type="text"  id="publication_name" name="publication_name" class="form-control" placeholder="eg: B.L Mitha" value="<?= isset($publication_name)?$publication_name:''?>" >
                                              <?php
                                                if (isset($input_error['publication_name'])) {
                                                  echo '<span class="input_error">'.$input_error['publication_name'].'</span>';
                                                }

                                               ?>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="purchase_date" class="col-sm-3  control-label">Purchase Date</label>
                                          <div class="col-sm-9">
                                              <input type="date"  id="purchase_date" name="purchase_date" class="form-control" value="<?= isset($purchase_date)?$purchase_date:''?>">
                                              <?php
                                                if (isset($input_error['purchase_date'])) {
                                                  echo '<span class="input_error">'.$input_error['purchase_date'].'</span>';
                                                }

                                               ?>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="book_price" class="col-sm-3  control-label">Book Price</label>
                                          <div class="col-sm-9">
                                              <input type="number" name="book_price"  id="book_price" class="form-control" placeholder="book price" value="<?= isset($book_price)?$book_price:''?>">
                                              <?php
                                                if (isset($input_error['book_price'])) {
                                                  echo '<span class="input_error">'.$input_error['book_price'].'</span>';
                                                }

                                               ?>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="book_qty" class="col-sm-3  control-label">Book Quantity</label>
                                          <div class="col-sm-9">
                                              <input type="number"  id="book_qty" name="book_qty" class="form-control" placeholder="Book Quantity" value="<?= isset($book_qty)?$book_qty:''?>">
                                              <?php
                                                if (isset($input_error['book_qty'])) {
                                                  echo '<span class="input_error">'.$input_error['book_qty'].'</span>';
                                                }

                                               ?>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="available_qty" class="col-sm-3  control-label">Available Quantity</label>
                                          <div class="col-sm-9">
                                              <input type="number"  id="available_qty" name="available_qty" class="form-control" placeholder="Book Quantity" value="<?= isset($available_qty)?$available_qty:''?>">
                                              <?php
                                                if (isset($input_error['available_qty'])) {
                                                  echo '<span class="input_error">'.$input_error['available_qty'].'</span>';
                                                }

                                               ?>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-sm-offset-2 col-sm-8">
                                              <button type="submit" name="save_book" class="btn btn-primary"> <i class="fa fa-save"></i> Save book</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

<?php require_once('footer.php') ?>
