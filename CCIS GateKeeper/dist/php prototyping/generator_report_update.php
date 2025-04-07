<?php

require 'connection.php';

$str1 = "00:00:00";
$str2 = "23:59:00";
$duration = "0";
$timeout = "0";



//
 $sql2 = 'SELECT * FROM calendar';
    $result2 = $con->query($sql2);

    if ($result2->num_rows > 0) {
      // output data of each row
      while($row2 = $result2->fetch_assoc()) {
        $date = $row2["calendar_dates"];


        $newfrdate = $date . ' ' . $str1;
        $newtodate = $date . ' ' . $str2;
       // echo $date;
       // echo " | ";

        			$mysqlqry = "SELECT id_no FROM user_account WHERE acc_type = 'Admin'";
        			$rs = $con->query($mysqlqry);
					 if ($rs->num_rows > 0) {
				      // output data of each row
				      while($rw = $rs->fetch_assoc()) {
				        $idno = $rw["id_no"];


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

							     	if($latest !== 'ND')
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
										$hrcnt =  $interval->format('%h')." Hours ".$interval->format('%i')." Minutes";
										//echo $hrcnt;
										//echo $remarks;
								      
								        $myqryY = "UPDATE `reports_admin` SET `TimeOut`='".$NEWXtime2."',`Duration`='".$hrcnt."',`Remarks`='".$remarks."' WHERE `id_no`='".$idno."' AND `Date` = '".$NEWXdate."'";


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
							       else if($latest == 'ND')
							       {

							       		$NEWXtime2 = 'ND';
							       		$hrcnt = 'ND';
							       		$remarks = 'ND';

							       			 $myqryY = "UPDATE `reports_admin` SET `TimeOut`='".$NEWXtime2."',`Duration`='".$hrcnt."',`Remarks`='".$remarks."' WHERE `id_no`='".$idno."' AND `Date` = '".$NEWXdate."'";


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
							    	$tapout_exist = 0;
							    	//echo "tapout | 0";
							    }

				       }
				     }
				     else 
				     {
					    
					 }

      }
    } else {
      //echo "0 results";
    }
 //echo "end of file."
//


?>



