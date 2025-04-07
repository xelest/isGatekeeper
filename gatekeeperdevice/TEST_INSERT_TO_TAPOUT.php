<?php

$user = '2015102429';
$idno = $user;

update_admin_report($user);

function update_admin_report($user)
{
                        require 'connection.php';
                        $idno = $user;
                           $res3 = mysqli_query($con, "SELECT * FROM `user_account` WHERE `id_no`='".$user."' AND acc_type='Admin' LIMIT 1");
                            if ($res3->num_rows > 0) 
                            {                
                                                  $date = date('Y-m-d');
                                                  $str1 = "00:00:00";
                                                  $str2 = "23:59:00";
                                                  $newfrdate = $date . ' ' . $str1;
                                                  $newtodate = $date . ' ' . $str2;
                                            //if admin account check if insert already existed
                                              $result3 = mysqli_query($con, "SELECT * FROM `reports_admin` WHERE `id_no`='".$user."' AND `Date`='".$date."'");
                                              if ($result3->num_rows > 0) 
                                              {//existing record - update

                                                  //----------------------------------//
                                                  //get tapout data
                                                    $sql = "SELECT * FROM `tapout_logs` WHERE id_no='".$idno."' AND outDate BETWEEN '".$newfrdate. "' AND '".$newtodate."' ORDER BY outDate DESC LIMIT 1";
                                                      $result = $con->query($sql);

                                                      if ($result->num_rows > 0) 
                                                      {
                                                        // output data of each row
                                                        while($row = $result->fetch_assoc()) 
                                                        {
                                                          $xdate2 = $row["outDate"];  //LATEST
                                                            $timestamp2 = $xdate2;
                                                            $splitTimeStamp2 = explode(" ",$timestamp2);
                                                            $NEWXdate2 = $splitTimeStamp2[0];
                                                            $NEWXtime2 = $splitTimeStamp2[1];
                                                        }
                                                         // echo " <hr> <br> ";
                                                      }

                                                      //----------------------------------//

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
                                                      //----------------------------------//

                                                  

                                                      if ($NEWXtime > '07:00:00')
                                                        {
                                                          $remarks = 'LATE';
                                                        }
                                                        else
                                                        {
                                                          $remarks = 'ONTIME';
                                                        }

                                                     

                                                            $datetime1 = new DateTime($NEWXtime);
                                                            $datetime2 = new DateTime($NEWXtime2);
                                                            $interval = $datetime1->diff($datetime2);
                                                            $duration =  $interval->format('%H hours and %M minutes |');


                                                      //----------------------------------//
                                                       $myqryY = "UPDATE `reports_admin` SET `TimeOut`='".$NEWXtime2."',`Duration`='".$duration."',`Remarks`='".$remarks."'
                                                                  WHERE `Date`='".$date."' AND id_no = '".$idno."'";

                                                       if(mysqli_query($con, $myqryY) === TRUE)
                                                       {
                                                          echo " | inserted | <br>";
                                                       }
                                                       else
                                                       {
                                                          echo " | failed insert | <br>";
                                                          echo 'Error: '. $con->error;
                                                       }

                                                    //----------------------------------//
                                              }
                                              else
                                              { //no record - insert earliest time
        
                                              }           
                                          
                                  }
}
?>