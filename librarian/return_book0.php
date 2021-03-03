<?php require_once('header.php') ?>

                <?php
                  if (isset($_GET['rq'])&&isset($_GET['qr'])) {
                    $id = base64_decode($_GET['rq']);
                    $book_name = $_GET['qr'];
                    $date = date('d-m-Y');
                    $book_qty = mysqli_query($dbcon,"SELECT * FROM `books` WHERE `book_name`= 'book_name'");
                    $book_qty = mysqli_fetch_assoc($book_qty);
                    print_r($book_qty)  ;
                    exit();
                    $result = mysqli_query($dbcon,"UPDATE `issue_books` SET `book_return_date`='$date' WHERE `id` = '$id' ");


                    //$update_qty = mysqli_query($dbcon,"UPDATE `books` SET `available_qty`='$book_qty' WHERE `book_name`= 'book_name' ");
                    if ($result) { ?>
                      <script type="text/javascript">
                        alert('Return Book Sucessfull!');
                        javascript:history.go(-1);
                      </script>
                    <?php }else { ?>
                      <script type="text/javascript">
                        alert('Something Wrong Book not return!');
                      </script>
                    <?php }
                  }

                 ?>

                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="">Return Books</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <!--SEARCHING, ORDENING & PAGING-->
                <div class="row animated fadeInUp">
                    <div class="col-sm-12">
                        <h4 class="section-subtitle"><b>Return Books</b></h4>
                        <div class="panel">
                            <div class="panel-content">
                                <div class="table-responsive">
                                    <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                          <tr>
                                              <th>Name</th>
                                              <th>Roll No</th>
                                              <th>Phone No</th>
                                              <th>Book Name</th>
                                              <!-- <th>Book Image</th> -->
                                              <th>Book Issue Date</th>
                                              <th>Return Book</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                            $result = mysqli_query($dbcon,"SELECT `issue_books`.`id`,`issue_books`.`book_issue_date`,`students`.`fname`,`students`.`lname`,`students`.`roll`,`students`.`phoneno`,`books`.`book_name`,`books`.`book_image` FROM `issue_books` INNER JOIN `students` ON `students`.`id` = `issue_books`.`student_id` INNER JOIN `books` ON `books`.`id` = `issue_books`.`book_id` WHERE `issue_books`.`book_return_date` = '' ");
                                            while ($row = mysqli_fetch_assoc($result)) {
                                          ?>

                                        <tr>
                                            <td><?= $row['fname'].' '.$row['lname']?></td>
                                            <td><?= $row['roll']?></td>
                                            <td><?= $row['phoneno']?></td>
                                            <td><?= $row['book_name']?></td>
                                            <!-- <td>
                                              <img alt="first photo" src="../images/books/<?= $row['book_image']?>" class="img-responsived mb-sm">
                                            </td> -->
                                            <td><?= date('d-M-Y',strtotime($row['book_issue_date'])) ?></td>
                                            <td> <a href="return_book.php?rq=<?= base64_encode($row['id']) ?> & qr=<?= $row['book_name']?>  "> Return Books</a>  </td>

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

<?php require_once('footer.php') ?>
