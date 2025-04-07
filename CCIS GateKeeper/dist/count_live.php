<?php
require 'connection.php';


$res3 = mysqli_query($con, "SELECT COUNT(DISTINCT `id_no`) as inside from tapin_logs");

  if ($res3->num_rows > 0) {
    while($row3 = $res3->fetch_assoc()) {
      $livenum1 = $row3['inside'];
     }  
  }


$res = mysqli_query($con, "SELECT COUNT(DISTINCT `id_no`) as outside from tapout_logs");

  if ($res->num_rows > 0) {
    while($row = $res->fetch_assoc()) {
      $livenum2 = $row['outside'];
     }  
  }



$livedif = $livenum1 - $livenum2;


$res2 = mysqli_query($con, "SELECT COUNT(`id_no`) as outside from tapout_logs");

  if ($res2->num_rows > 0) {
    while($row = $res2->fetch_assoc()) {
      $tapout = $row['outside'];
     }  
  }


$res1 = mysqli_query($con, "SELECT COUNT(`id_no`) as inside from tapin_logs");

  if ($res1->num_rows > 0) {
    while($rowx = $res1->fetch_assoc()) {
      $tapin = $rowx['inside'];
     }  
  }



?>