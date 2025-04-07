<?php

//THIS CODE INSERTS INTO ADMIN REPORTS
//DOES NOT INSERT IF THERE IS ALREADY EXISTING 
//IF EXIST UPDATES THE LATEST TAPOUT IF EXIST


require 'connection.php';

                      function insert_admin_report($user)
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
                                                  
                                              }
                                              else
                                              { //no record - insert earliest time
                                                 
                                                //get earliest time
                                                  $sql = "SELECT * FROM `tapin_logs` WHERE id_no='".$idno."' AND inDate BETWEEN '".$newfrdate. "' AND '".$newtodate."' ORDER BY inDate ASC LIMIT 1";
                                                $result = $con->query($sql);

                                                if ($result->num_rows > 0) 
                                                {
                                                  // output data of each row
                                                  while($row = $result->fetch_assoc()) 
                                                  {
                                                    $xdate = $row["inDate"];
                                                    $timestamp = $xdate;
                                                      $splitTimeStamp = explode(" ",$timestamp);
                                                      $NEWXdate = $splitTimeStamp[0];
                                                      $NEWXtime = $splitTimeStamp[1];
                                                  }
                                                   // echo " <hr> <br> ";
                                                }

                                                      

                                                      if ($NEWXtime > '07:00:00')
                                                      {
                                                        $remarks = 'LATE';
                                                      }
                                                      else
                                                      {
                                                        $remarks = 'ONTIME';
                                                      }

                                     

                                                  $sqlz = 'SELECT * FROM user_account WHERE id_no = '.$idno.'';
                                                  $resultz = $con->query($sqlz);

                                                  if ($resultz->num_rows > 0) 
                                                  {
                                                    // output data of each row
                                                    while($rowz = $resultz->fetch_assoc()) {
                                                      $fname = $rowz["firstname"];
                                                      $lname = $rowz["lastname"];
                                                    }
                                                  } 
                                                  else 
                                                  {
                                                    //echo "0 results";
                                                  }

                                              


                                                      $myqryY = "INSERT INTO `reports_admin`(`id_no`,`Firstname`, `Lastname`, `Date`, `TimeIn`, `Remarks`)
                                                        VALUES ('".$idno."','".$fname."','".$lname."','".$NEWXdate."','".$NEWXtime."','".$remarks."')";

                                                       if(mysqli_query($con, $myqryY) === TRUE)
                                                       {
                                                          //echo " | inserted | <br>";
                                                       }
                                                       else
                                                       {
                                                          //echo " | failed insert | <br>";
                                                          //echo 'Error: '. $con->error;
                                                       }
                                          
                                  }
                                }
                            }//end if function reportadmin insert
?>