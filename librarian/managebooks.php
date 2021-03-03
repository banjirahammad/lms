<?php require_once('header.php') ?>

                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="">Managebooks</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <!--SEARCHING, ORDENING & PAGING-->
                <div class="row animated fadeInUp">
                    <div class="col-sm-12">
                        <h4 class="section-subtitle"><b>Books</b></h4>
                        <div class="panel">
                            <div class="panel-content">
                                <div class="table-responsive">
                                    <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered " cellspacing="0" width="100%">
                                        <thead>
                                          <tr>
                                              <th>Book Name</th>
                                              <th>Book Edition</th>
                                              <th>Book Image</th>
                                              <th>Book Author</th>
                                              <th>Publication Name</th>
                                              <th>Purchase Date</th>
                                              <th>Book Price</th>
                                              <th>Book Quentity</th>
                                              <th>Available Quentity</th>
                                              <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                            $result = mysqli_query($dbcon,"SELECT * FROM `books`");
                                            while ($row = mysqli_fetch_assoc($result)) {
                                          ?>

                                        <tr>
                                            <td><?= $row['book_name']?></td>
                                            <td><?php
                                              switch ($row['book_edition']) {
                                                case '1':
                                                  echo "1st Edition";
                                                  break;
                                                case '2':
                                                  echo "2nd Edition";
                                                  break;
                                                case '3':
                                                  echo "3rd Edition";
                                                  break;
                                                case '4':
                                                  echo "4th Edition";
                                                  break;
                                                case '5':
                                                  echo "5th Edition";
                                                  break;
                                                case '6':
                                                  echo "6th Edition";
                                                  break;
                                                case '7':
                                                  echo "7th Edition";
                                                  break;
                                                case '8':
                                                  echo "8th Edition";
                                                  break;
                                                case '10':
                                                  echo "10th Edition";
                                                  break;
                                                case '11':
                                                  echo "11th Edition";
                                                  break;
                                                case '12':
                                                  echo "12th Edition";
                                                  break;
                                                case '13':
                                                  echo "13th Edition";
                                                  break;
                                                case '14':
                                                  echo "14th Edition";
                                                  break;
                                                case '15':
                                                  echo "15th Edition";
                                                  break;
                                                case '16':
                                                  echo "16th Edition";
                                                  break;
                                                case '17':
                                                  echo "17th Edition";
                                                  break;
                                                case '18':
                                                  echo "18th Edition";
                                                  break;
                                                case '19':
                                                  echo "19th Edition";
                                                  break;
                                                case '20':
                                                  echo "20th Edition";
                                                  break;

                                                default:
                                                  echo "No Edition";
                                                  break;
                                              }?>
                                            </td>
                                            <td>
                                              <img alt="first photo" src="../images/books/<?= $row['book_image']?>" class="img-responsive mb-sm">
                                            </td>
                                            <td><?= $row['book_author_name']?></td>
                                            <td><?= $row['book_publication_name']?></td>
                                            <td><?= date('d-M-Y',strtotime($row['book_purchase_date']))?></td>
                                            <td><?= $row['book_price']?></td>
                                            <td><?= $row['book_qty']?></td>
                                            <td><?= $row['available_qty']?></td>
                                            <td>
                                              <!--INFO modal-->
                                              <a href="javascript:avoid(0)" class="btn btn-primary" data-toggle="modal" data-target="#book-<?= $row['id']?>"> <i class="fa fa-eye"></i> </a>
                                              <a href="" data-toggle="modal" data-target="#book-update-<?= $row['id']?>" class="btn btn-warning"> <i class="fa fa-edit"></i> </a>
                                              <a href="delete.php?br=<?= base64_encode($row['id'])?>" class="btn btn-danger" onclick="return confirm('Are You Sure to delete this book')" > <i class="fa fa-trash-o"></i> </a>
                                            </td>
                                        </tr>
                                        <?php } ?>

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <!-- Modal Book info -->
                <?php
                  $result = mysqli_query($dbcon,"SELECT * FROM `books`");
                  while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="modal fade" id="book-<?= $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header state modal-info">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Books Info</h4>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered">
                                  <tr>
                                    <th>Book Name</th>
                                    <td><?= $row['book_name']?></td>
                                  </tr>
                                  <tr>
                                    <th>Book Edition</th>
                                    <td><?php
                                      switch ($row['book_edition']) {
                                        case '1':
                                          echo "1st Edition";
                                          break;
                                        case '2':
                                          echo "2nd Edition";
                                          break;
                                        case '3':
                                          echo "3rd Edition";
                                          break;
                                        case '4':
                                          echo "4th Edition";
                                          break;
                                        case '5':
                                          echo "5th Edition";
                                          break;
                                        case '6':
                                          echo "6th Edition";
                                          break;
                                        case '7':
                                          echo "7th Edition";
                                          break;
                                        case '8':
                                          echo "8th Edition";
                                          break;
                                        case '10':
                                          echo "10th Edition";
                                          break;
                                        case '11':
                                          echo "11th Edition";
                                          break;
                                        case '12':
                                          echo "12th Edition";
                                          break;
                                        case '13':
                                          echo "13th Edition";
                                          break;
                                        case '14':
                                          echo "14th Edition";
                                          break;
                                        case '15':
                                          echo "15th Edition";
                                          break;
                                        case '16':
                                          echo "16th Edition";
                                          break;
                                        case '17':
                                          echo "17th Edition";
                                          break;
                                        case '18':
                                          echo "18th Edition";
                                          break;
                                        case '19':
                                          echo "19th Edition";
                                          break;
                                        case '20':
                                          echo "20th Edition";
                                          break;

                                        default:
                                          echo "No Edition";
                                          break;
                                      }?>
                                  </tr>
                                  <tr>
                                    <th>Book Image</th>
                                    <td>
                                      <img alt="first photo" src="../images/books/<?= $row['book_image']?>" class="img-responsive mb-sm">
                                    </td>
                                  </tr>
                                  <tr>
                                    <th>Book Author</th>
                                    <td><?= $row['book_author_name']?></td>
                                  </tr>
                                  <tr>
                                    <th>Publication Name</th>
                                    <td><?= $row['book_publication_name']?></td>
                                  </tr>
                                  <tr>
                                    <th>Purchase Date</th>
                                    <td><?= date('d-M-Y',strtotime($row['book_purchase_date']))?></td>
                                  </tr>
                                  <tr>
                                    <th>Book Price</th>
                                    <td><?= $row['book_price']?></td>
                                  </tr>
                                  <tr>
                                    <th>Book Quentity</th>
                                    <td><?= $row['book_qty']?></td>
                                  </tr>
                                  <tr>
                                    <th>Available Quentity</th>
                                    <td><?= $row['available_qty']?></td>
                                  </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!-- Modal Update book info -->
                <?php
                  $result = mysqli_query($dbcon,"SELECT * FROM `books`");
                  while ($row = mysqli_fetch_assoc($result)) {
                  $bookid = $row['id'];
                  $books_up = mysqli_query($dbcon,"SELECT * FROM `books` WHERE `id` = '$bookid'");
                  $book_in_up = mysqli_fetch_assoc($books_up);

                ?>
                <div class="modal fade" id="book-update-<?= $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header state modal-info">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i> Update Books Info</h4>
                            </div>
                            <?php
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
                                      javascript:history.go(-1);
                                    </script>
                                  <?php }

                                }else {
                                  $submit = mysqli_query($dbcon,"UPDATE `books` SET `book_name`='$book_name',`book_edition`='$book_edition',`book_author_name`='$author_name',`book_publication_name`='$publication_name',`book_purchase_date`='$purchase_date',`book_price`='$book_price',`book_qty`='$book_qty',`available_qty`='$available_qty' WHERE `id` = '$book_id'");

                                  if ($submit) { ?>
                                    <script type="text/javascript">
                                      alert('Bookinfo Upadate Succesfull!');
                                      javascript:history.go(-1);
                                    </script>
                                  <?php }
                                  else { ?>
                                    <script type="text/javascript">
                                      alert('Something Wrong Bookinfo not Upadate!!');
                                    </script>
                                  <?php }


                                }

                              }
                            }
                             ?>
                            <div class="modal-body">
                              <form class="" action="" method="post" enctype="">
                                  <!-- <h5 class="mb-lg">Add Books</h5> -->

                                  <div class="form-group">
                                    <label for="book_name">Book Name</label>
                                    <input type="text" class="form-control" id="book_name" name="book_name" value="<?= $row['book_name']?>">
                                    <input type="hidden" class="form-control" id="book-id" name="book_id" value="<?= base64_encode($row['id'])?>">
                                    <?php
                                      if (isset($input_error['book_name'])) {
                                        echo '<span class="input_error">'.$input_error['book_name'].'</span>';
                                      }
                                     ?>
                                  </div>
                                  <div class="form-group">
                                    <label for="edition">Edition</label>
                                    <select name="edition" id="edition" class="form-control">
                                      <option value="0"  >---Select---</option>
                                      <option value="1" label="1st Edition" <?= $row['book_edition']==1?'selected':''?> >1st Edition</option>
                                      <option value="2" label="2nd Edition" <?= $row['book_edition']==2?'selected':''?> >2nd Edition</option>
                                      <option value="3" label="3rd Edition" <?= $row['book_edition']==3?'selected':''?> >3rd Edition</option>
                                      <option value="4" label="4th Edition" <?= $row['book_edition']==4?'selected':''?> >4th Edition</option>
                                      <option value="5" label="5th Edition" <?= $row['book_edition']==5?'selected':''?> >5th Edition</option>
                                      <option value="6" label="6th Edition" <?= $row['book_edition']==6?'selected':''?> >6th Edition</option>
                                      <option value="7" label="7th Edition" <?= $row['book_edition']==7?'selected':''?> >7th Edition</option>
                                      <option value="8" label="8th Edition" <?= $row['book_edition']==8?'selected':''?> >8th Edition</option>
                                      <option value="9" label="9th Edition" <?= $row['book_edition']==9?'selected':''?> >9th Edition</option>
                                      <option value="10" label="10th Edition" <?= $row['book_edition']==10?'selected':''?> >10th Edition</option>
                                      <option value="11" label="11th Edition" <?= $row['book_edition']==11?'selected':''?> >11th Edition</option>
                                      <option value="12" label="12th Edition" <?= $row['book_edition']==12?'selected':''?> >12th Edition</option>
                                      <option value="13" label="13th Edition" <?= $row['book_edition']==13?'selected':''?> >13th Edition</option>
                                      <option value="14" label="14th Edition" <?= $row['book_edition']==14?'selected':''?> >14th Edition</option>
                                      <option value="15" label="15th Edition" <?= $row['book_edition']==15?'selected':''?> >15th Edition</option>
                                      <option value="16" label="16th Edition" <?= $row['book_edition']==16?'selected':''?> >16th Edition</option>
                                      <option value="17" label="17th Edition" <?= $row['book_edition']==17?'selected':''?> >17th Edition</option>
                                      <option value="18" label="18th Edition" <?= $row['book_edition']==18?'selected':''?> >18th Edition</option>
                                      <option value="19" label="19th Edition" <?= $row['book_edition']==19?'selected':''?> >19th Edition</option>
                                      <option value="20" label="20th Edition" <?= $row['book_edition']==20?'selected':''?> >20th Edition</option>
                                    </select>
                                    <?php
                                      if (isset($input_error['book_edition'])) {
                                        echo '<span class="input_error">'.$input_error['book_edition'].'</span>';
                                      }

                                     ?>

                                  </div>

                                  <div class="form-group">
                                    <label for="author_name" >Author Name</label>
                                    <input type="text"  id="author_name" name="author_name" class="form-control" placeholder="eg: B.L Mitha" value="<?= $row['book_author_name']?>">
                                    <?php
                                      if (isset($input_error['author_name'])) {
                                        echo '<span class="input_error">'.$input_error['author_name'].'</span>';
                                      }

                                      ?>
                                  </div>
                                  <div class="form-group">
                                    <label for="publication_name">Publication Name</label>
                                    <input type="text"  id="publication_name" name="publication_name" class="form-control" placeholder="eg: B.L Mitha" value="<?= $row['book_publication_name']?>" >
                                    <?php
                                      if (isset($input_error['publication_name'])) {
                                        echo '<span class="input_error">'.$input_error['publication_name'].'</span>';
                                      }

                                     ?>
                                  </div>
                                  <div class="form-group">
                                    <label for="purchase_date" class="">Purchase Date</label>
                                    <input type="date"  id="purchase_date" name="purchase_date" class="form-control" value="<?= $row['book_purchase_date'] ?>">
                                    <?php
                                      if (isset($input_error['purchase_date'])) {
                                        echo '<span class="input_error">'.$input_error['purchase_date'].'</span>';
                                      }

                                     ?>
                                  </div>
                                  <div class="form-group">
                                    <label for="book_price">Book Price</label>
                                    <input type="number" name="book_price"  id="book_price" class="form-control" placeholder="book price" value="<?=$row['book_price']?>">
                                    <?php
                                      if (isset($input_error['book_price'])) {
                                        echo '<span class="input_error">'.$input_error['book_price'].'</span>';
                                      }

                                     ?>
                                  </div>
                                  <div class="form-group">
                                    <label for="book_qty" >Book Quantity</label>
                                    <input type="number"  id="book_qty" name="book_qty" class="form-control" placeholder="Book Quantity" value="<?= $row['book_qty']?>">
                                    <?php
                                      if (isset($input_error['book_qty'])) {
                                        echo '<span class="input_error">'.$input_error['book_qty'].'</span>';
                                      }

                                     ?>
                                  </div>
                                  <div class="form-group">
                                    <label for="available_qty" >Available Quantity</label>
                                    <input type="number"  id="available_qty" name="available_qty" class="form-control" placeholder="Book Quantity" value="<?= $row['available_qty']?>">
                                    <?php
                                      if (isset($input_error['available_qty'])) {
                                        echo '<span class="input_error">'.$input_error['available_qty'].'</span>';
                                      }

                                     ?>
                                  </div>
                                  <div class="form-group">
                                    <button type="submit" name="update_book" class="btn btn-primary btn-right"> <i class="fa fa-save"></i> Update Book</button>
                                  </div>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
<?php require_once('footer.php') ?>
