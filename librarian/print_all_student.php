<?php
  require_once('../dbcon.php');
  $result = mysqli_query($dbcon,"SELECT * FROM `students`");
 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Print All Student</title>
    <style media="screen">
      body{
        margin  0;
        font-family: kalpurush;
      }
      .print_area{
        width: 755px;
        height: 1050px;
        margin: auto;
        box-sizing: border-box;
        page-break-after: always;

      }
      .header{
        text-align: center;
      }
      .page_info{
        text-align: right;
      }
      .header h3{
        margin: 0;
      }
      .data_info{
        text-align: center;
      }
      .data_info table{
        width: 100%;
        border-collapse: collapse;
      }
      .data_info table tr{}
      .data_info table tr th,
      .data_info table tr td{
        border: 1px solid #555;
        padding: 4px;
        line-height: 1em;
      }

    </style>
  </head>
  <body onload="window.print()" >
    <?php

      $sl = 1;
      $page = 1;
      $total =  mysqli_num_rows($result);
      $par_page = 25;
      while ($row = mysqli_fetch_assoc($result)) {
        if ($sl%$par_page == 1) {
          echo page_header();
        }


        ?>
        <tr>
          <td><?= $sl?></td>
          <td><?= ucwords($row['fname']).' '.ucwords($row['lname']) ?></td>
          <td><?= $row['roll']?></td>
          <td><?= $row['reg']?></td>
          <td><?= $row['email']?></td>
          <td><?= $row['phoneno']?></td>
        </tr>
      <?php
        if ($sl%$par_page == 0 || $total == $par_page ) {
          echo page_footer($page++);
        }
        $sl++;
     } ?>

  </body>
</html>
 <!-- onload="window.print()" -->


 <?php

  function page_header(){
    $data = '
    <div class="print_area">
      <div class="header">
        <h3>Central University of Science and Technology</h3>
        <h3>CSE batch</h3>
      </div>
      <div class="data_info">
        <table>
          <tr>
            <th>Si</th>
            <th>Student Name</th>
            <th>Student Id</th>
            <th>Registration No</th>
            <th>Email</th>
            <th>Phone No</th>
          </tr>
    ';
    return $data;
  }


  function page_footer($page){
    $data = '
        </table>
        <div class="page_info">Page - '.$page.'</div>
      </div>


    </div>
    ';
    return $data;
  }



  ?>
