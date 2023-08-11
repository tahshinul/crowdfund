<?php

require_once '../dbcon.php';

if(  isset($_GET['cmpdelete'])  ) {
  
  $banner = $_GET['cmpdelete'];


  mysqli_query($con, "DELETE FROM `campaign` WHERE `banner` = '$banner' ");

  header('Location: campaign-list.php');
}




?>