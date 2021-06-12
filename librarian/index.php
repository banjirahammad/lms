<?php require_once('header.php') ?>

                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

                <!-- ============================refesh icon start =====================================-->
                <div class="row">
                  <div class="col-12">
                    <div class="pull-right">
                      <a href="index.php"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh</a>
                    </div>
                  </div>
                </div>
                <!-- ============================refesh icon end =====================================-->

                <div class="row animated">
                    <div class="col-sm-12 col-lg-12">
                      <div class="row">
                        <!--BOX Style 1-->
                        <?php
                          $total_student = mysqli_query($dbcon,"SELECT * FROM `students`");
                          $total_student = mysqli_num_rows($total_student);
                         ?>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="panel widgetbox wbox-1 bg-darker-1">
                                <a href="students.php">
                                    <div class="panel-content">
                                        <h1 class="title color-w"><i class="fa fa-users"></i> <?= $total_student  ?> </h1>
                                        <h4 class="subtitle color-lighter-1">Total Studenats</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php
                          $total_books = mysqli_query($dbcon,"SELECT * FROM `books`");
                          $total_books = mysqli_num_rows($total_books);
                          $books_qty = mysqli_query($dbcon,"SELECT SUM(`book_qty`) as 'total' FROM `books`");
                          $books_qty = mysqli_fetch_assoc($books_qty);
                          $books_avl_qty = mysqli_query($dbcon,"SELECT SUM(`available_qty`) as 'avail_qty' FROM `books`");
                          $books_avl_qty = mysqli_fetch_assoc($books_avl_qty);
                         ?>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="panel widgetbox wbox-1 bg-darker-1">
                                <a href="managebooks.php">
                                    <div class="panel-content">
                                        <h1 class="title color-w"><i class="fa fa-book"></i> <?= $total_books.' ('.$books_qty['total'].' - '.$books_avl_qty['avail_qty'].' )'  ?> </h1>
                                        <h4 class="subtitle color-lighter-1">Total Books</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php
                          $total_lib = mysqli_query($dbcon,"SELECT * FROM `librarian`");
                          $total_lib = mysqli_num_rows($total_lib);
                         ?>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="panel widgetbox wbox-1 bg-darker-1">
                                <a href="librarians.php">
                                    <div class="panel-content">
                                        <h1 class="title color-w"><i class="fa fa-user"></i> <?= $total_lib  ?> </h1>
                                        <h4 class="subtitle color-lighter-1">Total LIbrarian</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

<?php require_once('footer.php') ?>
