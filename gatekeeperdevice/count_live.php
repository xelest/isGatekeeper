<?php
require 'connection.php';

$sql1 = "SELECT COUNT(DISTINCT `id_no`) as inside from tapin_logs"; 
$sql2 = "SELECT COUNT(DISTINCT `id_no`) as outside from tapin_logs";

 $res = mysqli_query($con, $sql1);
 $row = mysqli_fetch_array($res);
 if (mysqli_num_rows($res) > 0) // user exist
   { 
   	 while($row = $res->fetch_assoc()) {
       $livenumber1 = $row['inside'];
          }
   }


 $res2 = mysqli_query($con, $sql2);
 $row2 = mysqli_fetch_array($res2);
 if (mysqli_num_rows($res2) > 0) // user exist
   { 
   	 while($row2 = $res2->fetch_assoc()) {
       $livenumber2 = $row2['outside'];
          }
   }

$dif = $livenumber1 - $livenumber2;

echo $dif;
?>