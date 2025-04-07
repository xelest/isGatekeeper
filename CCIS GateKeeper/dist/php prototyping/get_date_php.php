<?php

require '../connection.php';

$idno = "2015102429";

												$date = date('Y-m-d');
                                                  $str1 = "00:00:00";
                                                  $str2 = "23:59:00";
                                                  $newfrdate = $date . ' ' . $str1;
                                                  $newtodate = $date . ' ' . $str2;

													$sql2 = "SELECT * FROM `tapin_logs` WHERE id_no='".$idno."' AND inDate BETWEEN '".$newfrdate. "' AND '".$newtodate."' ORDER BY inDate ASC LIMIT 1";
                                                      $result2 = $con->query($sql2);

                                                      if ($result2->num_rows > 0) 
                                                      {
                                                        // output data of each row
                                                        while($row2 = $result2->fetch_assoc()) 
                                                        {
                                                            $xdate = $row2["inDate"];  //EARLIEST
                                                            $timestamp = $xdate;
                                                            $splitTimeStamp = explode(" ",$timestamp);
                                                            $NEWXdate = $splitTimeStamp[0];
                                                            $NEWXtime = $splitTimeStamp[1];
                                                        }
                                                         // echo " <hr> <br> ";
                                                       }


?>