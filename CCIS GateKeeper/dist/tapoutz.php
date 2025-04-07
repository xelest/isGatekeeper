<?php
require_once('connection.php');

$myqryS = "SELECT COUNT(`id_no`) as `gg`
FROM `tapout_logs` WHERE DATE(`outDate`) = DATE(CURDATE())";


    if ($result = mysqli_query($con, $myqryS)) {
     while ($row = mysqli_fetch_row($result)) {
        $top = $row[0];
      }
    }

echo $top;

?>