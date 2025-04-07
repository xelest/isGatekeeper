<?php
require_once('connection.php');


$myqryS = "SELECT COUNT( `id_no`) as `gg`
FROM `tapin_logs` WHERE DATE(`inDate`) = DATE(CURDATE())";


    if ($result = mysqli_query($con, $myqryS)) {
     while ($row = mysqli_fetch_row($result)) {
        $top2 = $row[0];
      }
    }


$myqryS = "SELECT COUNT( `id_no`) as `gg`
FROM `tapout_logs` WHERE DATE(`outDate`) = DATE(CURDATE())";


    if ($result = mysqli_query($con, $myqryS)) {
     while ($row = mysqli_fetch_row($result)) {
        $top = $row[0];
      }
    }


$difx = $top2 - $top;

if($difx < 0 )
{
  $difx = 0;
}

echo $difx;

?>
<!--- PHP -->