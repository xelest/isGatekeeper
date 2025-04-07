<?php

require '../connection.php';

$cnt = 1;
$str1 = "00:00:00";
$str2 = "23:59:00";


 $sql2 = 'SELECT * FROM calendar';
    $result2 = $con->query($sql2);

    if ($result2->num_rows > 0) {
      // output data of each row
      while($row2 = $result2->fetch_assoc()) {
        $date = $row2["calendar_dates"];

        //echo $date;
        //echo "|";
        //CONCAT date and time
        $newfrdate = $date . ' ' . $str1;
        $newtodate = $date . ' ' . $str2;

                                //get most late tap out
                                        $sql3 = "SELECT * FROM `tapout_logs` WHERE id_no='2015102434' AND outDate BETWEEN '".$newfrdate. "' AND '".$newtodate."' ORDER BY outDate DESC LIMIT 1";
                                    $result3 = $con->query($sql3);

                                    if ($result3->num_rows > 0) 
                                    {
                                      // output data of each row
                                      while($row3 = $result3->fetch_assoc()) {
                                        $xdate3 = $row3["outDate"];

                                        echo " <hr> <br> ";
                                        
                                        //time and date separateion timestamp
                                        $timestamp2 = $xdate3;
                                                $splitTimeStamp2 = explode(" ",$timestamp2);
                                                $NEWXdate2 = $splitTimeStamp2[0];
                                                $NEWXtime2 = $splitTimeStamp2[1];

                                                echo $NEWXdate2;
                                                echo " | ";

                                                if ($NEWXtime2 > '07:00:00')
                                                {
                                                        $remarks = 'LATE';
                                                }
                                                else
                                                {
                                                        $remarks = 'ONTIME';
                                                }

                                                echo $NEWXtime2;

                                                echo " | ";

                                                echo $remarks;

                                        echo " <hr> <br> ";


                                      }
                                    } 
                                    else 
                                    {
                                      $remarks = 'NO TAPOUT';
                                      echo $date;
                                      echo " | ";
                                      echo $remarks;
                                      echo " <hr> <br> ";
                                    }

      }
    } else {
      echo "0 results";
    }
 echo "end of file."



?>

