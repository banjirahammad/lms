<?php

  $dbcon = mysqli_connect("localhost","root","","lms");
  mysqli_query($dbcon,'SET CHARACTER SET utf8');
  mysqli_query($dbcon,"SET SESSION collation_connection='utf8_general_ci'");


 ?>
