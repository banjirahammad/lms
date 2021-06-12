<?php
  if (isset($_GET['bookid'])) { ?>

    <?php require_once('header.php') ?>

                    <!-- content HEADER -->
                    <!-- ========================================================= -->
                    <div class="content-header">
                        <!-- leftside content header -->
                        <div class="leftside-content-header">
                            <ul class="breadcrumbs">
                                <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                                <li><a href="javascript:avoid(0)">View Book</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                    <?php
                      if (isset($_GET['bookid'])) {
                        $bookid = base64_decode($_GET['bookid']);
                        $bookinfo = mysqli_query($dbcon,"SELECT * FROM `books` WHERE `id`='$bookid'");
                        $bookinfo = mysqli_fetch_assoc($bookinfo);
                        // print_r($bookinfo);
                      }else {
                        // header('location:books.php');
                      }

                     ?>

                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                            <!--PROFILE-->
                            <div class="bookPhotoView">
                                <div class="">
                                  <h3 class="text-primary">Book Images</h3><hr>
                                    <div class="imges">
                                      <?php if ($user['photo']==""){ ?>
                                        <img alt="User photo" class="img-thumbnail" src="../images/students/avatar.jpg">

                                      <?php } else {  ?>
                                        <img alt="books photo" class="img-thumbnail" src="../images/books/<?= $bookinfo['book_image']; ?>">
                                    <?php } ?>
                                    </div>

                                </div>

                            </div>


                        </div>
                        <div class="col-md-6 col-lg-8">

                            <div class="book-info">
                              <h3 class="h325 text-primary">Book Information</h3>
                              <hr>
                              <div class="">

                                <div class="titlewithname">
                                  <label class="label25">Book Name</label>
                                  <p class="p20"><?= ucwords($bookinfo['book_name']);  ?></p>
                                </div>

                                <div class="titlewithname">
                                  <label class="label25">Book Edition</label>
                                  <p class="p20"><?php
                                    switch ($bookinfo['book_edition']) {
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
                                    }
                                  ?></p>
                                </div>

                                <div class="titlewithname">
                                  <label class="label25">Book Author Name</label>
                                  <p class="p20"><?= ucwords($bookinfo['book_author_name']);  ?></p>
                                </div>

                                <div class="titlewithname">
                                  <label class="label25">Book Publication Name</label>
                                  <p class="p20"><?= ucwords($bookinfo['book_publication_name']);  ?></p>
                                </div>

                                <div class="titlewithname">
                                  <label class="label25">Book Publication Date</label>
                                  <p class="p20"><?= $bookinfo['book_purchase_date'];  ?></p>
                                </div>

                                <div class="titlewithname">
                                  <label class="label25">Book Price</label>
                                  <p class="p20"><?= $bookinfo['book_price']." tk"; ?> (per pice)</p>
                                </div>

                                <div class="titlewithname">
                                  <label class="label25">Abailable Book</label>
                                  <p class="p20"><?= $bookinfo['available_qty'];  ?> pices</p>
                                </div>
                                <div class="titlewithname">
                                  <label class="label25">Add by Librarian</label>
                                  <p class="p20"><?= $bookinfo['librarian_username'];  ?></p>
                                </div>

                                <div class="titlewithname">
                                  <label class="label25">Added Date</label>
                                  <p class="p20"><?= $bookinfo['datetime'];  ?></p>
                                </div>

                              </div>
                            </div>
                        </div>
                    </div>
                    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                    <div class="row">
                      <div class="">
                        <div class="pull-left">
                          <a href="books.php"><< <i class="fa fa-right"></i>back</a>
                        </div>
                      </div>
                    </div>



    <?php require_once('footer.php') ?>
  <?php }else {
    header('location:books.php');
  }
 ?>
