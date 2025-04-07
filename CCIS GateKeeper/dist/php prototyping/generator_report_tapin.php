<?php

require '../connection.php';



	
$sql1 = "SELECT id_no FROM `user_account` WHERE `acc_type` = 'Admin'";
 $result1 = $con->query($sql1);

	if ($result1->num_rows > 0) {
		 // output data of each row
		 while($row1 = $result1->fetch_assoc()) {
		   $idno = $row1["id_no"];



				$str1 = "00:00:00";
				$str2 = "23:59:00";
				$duration = "0";
				$timeout = "0";


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


				        			//get earliest time
				        			$sql = "SELECT * FROM `tapin_logs` WHERE id_no='".$idno."' AND inDate BETWEEN '".$newfrdate. "' AND '".$newtodate."' ORDER BY inDate ASC LIMIT 1";
								    $result = $con->query($sql);

								    if ($result->num_rows > 0) 
								    {
								      // output data of each row
								      while($row = $result->fetch_assoc()) {
								        $xdate = $row["inDate"];

								       // echo " <hr> <br> ";
								        
								        //time and date separateion timestamp
								        $timestamp = $xdate;
										$splitTimeStamp = explode(" ",$timestamp);
										$NEWXdate = $splitTimeStamp[0];
										$NEWXtime = $splitTimeStamp[1];

										//echo $NEWXdate;
										//echo " | ";

										if ($NEWXtime > '07:00:00')
										{
											$remarks = 'LATE';
										}
										else
										{
											$remarks = 'ONTIME';
										}

										//echo $NEWXtime;

										//echo " | ";

										//echo $remarks;

								        //echo " <hr> <br> ";

								        //getname

								        $sqlz = 'SELECT * FROM user_account WHERE id_no = '.$idno.'';
									    $resultz = $con->query($sqlz);

									    if ($resultz->num_rows > 0) {
									      // output data of each row
									      while($rowz = $resultz->fetch_assoc()) {
									        $fname = $rowz["firstname"];
									        $lname = $rowz["lastname"];

									        //echo $fname;
									        //echo " | ";
									        //echo $lname;
									        //echo "<br>";
									      }
									    } else {
									      //echo "0 results";
									    }


								        $myqryY = "INSERT INTO `reports_admin`(`id_no`,`Firstname`, `Lastname`, `Date`, `TimeIn`, `TimeOut`, `Duration`, `Remarks`)
								        		  VALUES ('".$idno."','".$fname."','".$lname."','".$NEWXdate."','".$NEWXtime."','".$timeout."','".$duration."','".$remarks."')";

								       if(mysqli_query($con, $myqryY) === TRUE)
								       {
								       		//echo " | inserted | <br>";
								       }
								       else
								       {
								       		//echo " | failed | <br>";
								       		//echo 'Error: '. $con->error;
								       }




								      }
								    } 
								    else 
								    {

								    	$NEWXtime = 'ND';
								    	$timeout = 'ND';
								    	$duration = 'ND';
								    	$remarks = 'ABSENT';
								      
								    	$sqlz = 'SELECT * FROM user_account WHERE id_no = '.$idno.'';
									    $resultz = $con->query($sqlz);

									    if ($resultz->num_rows > 0) {
									      // output data of each row
									      while($rowz = $resultz->fetch_assoc()) {
									        $fname = $rowz["firstname"];
									        $lname = $rowz["lastname"];

									       // echo $fname;
									       // echo " | ";
									       // echo $lname;
									        //echo "<br>";
									      }
									    } else {
									      //echo "0 results";
									    }


								      $myqryY = "INSERT INTO `reports_admin`(`id_no`,`Firstname`, `Lastname`, `Date`, `TimeIn`, `TimeOut`, `Duration`, `Remarks`)
								        		  VALUES ('".$idno."','".$fname."','".$lname."','".$date."','".$NEWXtime."','".$timeout."','".$duration."','".$remarks."')";

								       if(mysqli_query($con, $myqryY) === TRUE)
								       {
								       		//echo " | inserted | <br>";
								       }
								       else
								       {
								       		//echo " | failed | <br>";
								       		//echo 'Error: '. $con->error;
								       }
								    }





								    //get earliest time
				        			$sql = "SELECT * FROM `tapin_logs` WHERE id_no='".$idno."' AND inDate BETWEEN '".$newfrdate. "' AND '".$newtodate."' ORDER BY inDate ASC LIMIT 1";
								    $result = $con->query($sql);

								    if ($result->num_rows > 0) 
								    {
								    	while($row = $result->fetch_assoc()) {
								        	$earliest = $row["inDate"];

								        //time and date separateion timestamp
								        $timestamp = $earliest;
										$splitTimeStamp = explode(" ",$timestamp);
										$NEWXdate = $splitTimeStamp[0];
										$NEWXtime = $splitTimeStamp[1];
								     	}

								      	$tapin_exist = 1;
								      	//echo "tapin | 1 ";
								    } 
								    else 
								    {
								    	$tapin_exist = 0;
								    	//echo "tapin | 0 ";
								    }


									
								    //get earliest time
				        			$sqlz = "SELECT * FROM `tapout_logs` WHERE id_no='".$idno."' AND outDate BETWEEN '".$newfrdate. "' AND '".$newtodate."' ORDER BY outDate DESC LIMIT 1";
								    $resultz = $con->query($sqlz);

								    if ($resultz->num_rows > 0) 
								    {
								    	while($row = $resultz->fetch_assoc()) {
								        	$latest = $row["outDate"];

								        //time and date separateion timestamp
								        $timestamp2 = $latest;
										$splitTimeStamp2 = explode(" ",$timestamp2);
										$NEWXdate2 = $splitTimeStamp2[0];
										$NEWXtime2 = $splitTimeStamp2[1];

								     	}

								      	$tapout_exist = 1;
								      	//echo "tapout | 1 |";
								    } 
								    else 
								    {
								    	$tapout_exist = 0;
								    	//echo "tapout | 0";
								    }

								    //

								   
								    //

								    if($tapin_exist == 1 && $tapout_exist == 0)
								    {
								    	$remarks = "Did not TAP OUT";
								    	$hrcnt = "cannot compute";
								    	$NEWXtime2 = "ND";
								    }
								    else if($tapin_exist == 0 && $tapout_exist == 1)
								    {	
								    	$NEWXtime = "ND";
								    	$remarks = "Did not TAP IN";
								    	$hrcnt = "cannot compute";
								    }
								     else if($tapin_exist == 0 && $tapout_exist == 0)
								    {
								    	$remarks = "Absent";

								    	$NEWXtime2 = "ND";
									    $NEWXtime = "ND";

									    $hrcnt = "0 hours and 0 minutes";

								    }
								    else
								    {

								    	if($NEWXtime < '07:00:00')
								    	{
								    		$remarks = "ontime";
								    	}
								    	else
								    	{
								    		$remarks = "late";
								    	}

								    	$datetime1 = new DateTime($NEWXtime);
										$datetime2 = new DateTime($NEWXtime2);
										$interval = $datetime1->diff($datetime2);
										$hrcnt =  $interval->format('%H hours and %M minutes |');


								    }
								     // echo " <hr> <br>";


	
								    	$datetime1 = new DateTime($NEWXtime);
										$datetime2 = new DateTime($NEWXtime2);
										$interval = $datetime1->diff($datetime2);
										$hrcnt =  $interval->format('%H hours and %M minutes |');



								    if($NEWXtime2 == 'ND' && $NEWtime != 'ND')
								    {
								    	$hrcnt = 'cannot compute';
								    }

								      
								        $myqryY = "UPDATE `reports_admin` SET `TimeOut`='".$NEWXtime2."',`Duration`='".$hrcnt."' WHERE `id_no`='".$idno."' AND `Date` = '".$NEWXdate."'";


								       if(mysqli_query($con, $myqryY) === TRUE)
								       {
								       		//echo " | inserted | <br>";
								       }
								       else
								       {
								       		//echo " | failed | <br>";
								       		//echo 'Error: '. $con->error;
								       }




						


				      }
				    } else {
				      //echo "0 results";
				    }
				 //echo "end of file.";

			} //while

	}

?>

