<?php require_once('header.php') ?>

<?php
  if (isset($_POST['isseu_book'])) {
    $student_id = $_POST['student_id'];
    $book_id = $_POST['book_id'];
    if ($book_id==0) { ?>
      <script type="text/javascript">
        alert('Sorry Book not Issue!');
      </script>
    <?php  }
    else {
      $book_issue_date = $_POST['issue_date'];

      $book_qty = mysqli_query($dbcon,"SELECT * FROM `books` WHERE `id`= '$book_id'");
      $book_qty = mysqli_fetch_assoc($book_qty);
      $up_qty = $book_qty['available_qty']-1;
      $update_qty = mysqli_query($dbcon,"UPDATE `books` SET `available_qty`='$up_qty' WHERE `id`= '$book_id' ");


      $query = "INSERT INTO `issue_books` (`student_id`, `book_id`, `book_issue_date`, `book_return_date`) VALUES ('$student_id', '$book_id', '$book_issue_date', '')";

      $result = mysqli_query($dbcon,$query);
      if ($result &&  $update_qty) { ?>
        <script type="text/javascript">
          alert('Book Issued Successfully!');
        </script>
      <?php  }
      else { ?>
        <script type="text/javascript">
          alert('Sorry Book not Issue!');
        </script>
      <?php }
    }
  }

 ?>


                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                          <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                          <li><a href="jacascript:avoid(0)">Issue Book</a></li>
                        </ul>
                    </div>
                </div>

                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated">
                    <div class="col-sm-12 col-lg-8 col-lg-offset-2 ">
                      <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-inline" action="" method="post" >
                                        <div class="form-group">
                                            <select class="form-control" name="student_id">
                                              <option >--Select Any Student--</option>
                                              <?php
                                                $result = mysqli_query($dbcon,"SELECT * FROM `students` WHERE `status` = '1'");
                                                while ($row = mysqli_fetch_assoc($result)) {
                                              ?>
                                              <option value="<?= $row['id'] ?>"><?= ucwords($row['fname'].' '.$row['lname']).' - ('.$row['roll'].')' ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="search" class="btn btn-primary">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="">
                              <?php
                                if (isset($_POST['search'])) {
                                  $search_id = $_POST['student_id'];
                                  $result = mysqli_query($dbcon,"SELECT * FROM `students` WHERE `id` = '$search_id' AND  `status`='1' ");
                                  $row = mysqli_fetch_assoc($result);
                                  ?>

                                <div class="panel">
                                    <div class="panel-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form action="" method="post" enctype="">
                                                    <div class="form-group">
                                                        <label for="name">Student Name</label>
                                                        <input name="" <?= 'readonly' ?> type="text" class="form-control" id="name" value="<?= ucwords($row['fname'].' '.$row['lname'])?>">
                                                        <input name="student_id" type="hidden"  class="form-control" value="<?= $search_id ?>">
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="book_name">Book Name</label>
                                                      <select class="form-control" name="book_id" id="book_name">
                                                        <option value="0" >Select Subject</option>
                                                        <?php
                                                          $result = mysqli_query($dbcon,"SELECT * FROM `books` WHERE `available_qty`>0");
                                                          while ($row = mysqli_fetch_assoc($result)) {
                                                        ?>
                                                        <option value="<?= $row['id'] ?>"><?= $row['book_name'] ?></option>
                                                        <?php } ?>
                                                      </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="issue_date">Book Issue Date</label>
                                                        <input name="issue_date" readonly type="text" class="form-control" id="issue_date" value="<?= date('d-m-Y') ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <button name="isseu_book" type="submit" class="btn btn-primary">Issue Book</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                              <?php } ?>
                            </div>





                          </div>
                      </div>

                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

<?php require_once('footer.php') ?>
