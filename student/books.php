
<?php require_once('header.php') ?>

                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="#">books</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="animated fadeInUp">
                <!--SEARCH-->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-content">
                                <form class="" action="" method="post" >
                                    <div class="row pt-md">
                                        <div class="form-group col-sm-9 col-lg-10">
                                          <span class="input-with-icon">
                                            <input type="text" name="book" class="form-control" id="lefticon" placeholder="Search" required>
                                            <i class="fa fa-search"></i>
                                          </span>
                                        </div>
                                        <div class="form-group col-sm-3  col-lg-2 ">
                                            <button type="submit" name="search" class="btn btn-primary btn-block">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <!--RESULTS-->

                <div class="row">
                        <div class="col-sm-12">
                            <div class="panel">
                              <div class="panel-content">
                                  <div class="search-results-grid">
                                      <div class="row">
                                        <?php
                                          if (isset($_POST['search'])) {
                                            $src_book = $_POST['book'];
                                            $result = mysqli_query($dbcon,"SELECT * FROM `books` WHERE  `book_name` LIKE '%$src_book%'");
                                            $temp = mysqli_num_rows($result);
                                            if($temp==0){
                                              echo '<h4 class="text-center">'.'This book is not found'.'</h4>';
                                            }else {
                                              while($book_row = mysqli_fetch_assoc($result)) { ?>
                                                <div class="col-sm-6 col-md-3">
                                                    <a href="#"><img alt="photo" src="../images/books/<?= $book_row['book_image']?>" class="img-responsive"></a>
                                                    <div class="search-item-content">
                                                        <h4> <?= $book_row['book_name'] ?> </h4>
                                                        <p>Available: <?= $book_row['available_qty']?></p>
                                                    </div>
                                                </div>

                                              <?php }
                                            }
                                          }else { ?>

                                        <?php
                                          $all_books =  mysqli_query($dbcon,"SELECT * FROM `books`");
                                          while($book = mysqli_fetch_assoc($all_books)) { ?>
                                            <div class="col-sm-6 col-md-3">
                                                <a href="#"><img alt="photo" src="../images/books/<?= $book['book_image']?>" class="img-responsive"></a>
                                                <div class="search-item-content">
                                                    <h4> <?= $book['book_name'] ?> </h4>
                                                    <p>Available: <?= $book['available_qty']?></p>
                                                </div>
                                            </div>

                                          <?php } ?>

                                        <?php } ?>

                                      </div>
                                  </div>
                                  <!-- <nav aria-label="Page navigation">
                                      <ul class="pagination">
                                          <li>
                                              <a href="#" aria-label="Previous">
                                                  <i class="fa fa-caret-left"></i>
                                              </a>
                                          </li>
                                          <li class="active"><a href="#">1</a></li>
                                          <li><a href="#">2</a></li>
                                          <li><a href="#">3</a></li>
                                          <li><a href="#">4</a></li>
                                          <li><a href="#">5</a></li>
                                          <li>
                                              <a href="#" aria-label="Next">
                                                  <i class="fa fa-caret-right"></i>
                                              </a>
                                          </li>
                                      </ul>
                                  </nav> -->
                              </div>
                            </div>
                        </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

<?php require_once('footer.php') ?>
