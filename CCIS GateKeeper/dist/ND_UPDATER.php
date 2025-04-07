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
        //echo $date;
        //echo " | ";


					//get earliest time
        			$sqlz = "SELECT * FROM `user_account` WHERE acc_type='Admin'";
				    $resultz = $con->query($sqlz);

				    if ($resultz->num_rows > 0) 
				    {

				    	while($rowz = $resultz->fetch_assoc()) 
				    	{
				        	$id_no = $rowz['id_no'];
				        	$fname = $rowz['firstname'];
				        	$lname = $rowz['lastname'];


				        	$sqly = "SELECT * FROM `reports_admin` WHERE id_no='".$id_no."' AND `Date`='".$date."' ";
						    $resulty = $con->query($sqly);

						    if ($resulty->num_rows > 0) 
						    {						
						    					
						    } 
						    else
						   	{

						   				$earliest = "";
						    						$timestamp = "";
													$splitTimeStamp = "";
													$NEWXdate = "";
													$NEWXtime = "";
													$timestamp2 = "";
													$splitTimeStamp2 = "";
													$NEWXdate2 = "";
													$NEWXtime2 = "";
													$latest = "";


						    		 			//get earliest time
							        			$sql = "SELECT * FROM `tapin_logs` WHERE id_no='".$id_no."' AND inDate BETWEEN '".$newfrdate. "' AND '".$newtodate."' ORDER BY inDate ASC LIMIT 1";
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
							        			$sqlz = "SELECT * FROM `tapout_logs` WHERE id_no='".$id_no."' AND outDate BETWEEN '".$newfrdate. "' AND '".$newtodate."' ORDER BY outDate DESC LIMIT 1";
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



												    if($tapin_exist == 1 && $tapout_exist == 0)
												    {
												    	//$remarks = "Did not TAP OUT";
												    }
												    else if($tapin_exist == 0 && $tapout_exist == 1)
												    {
												    	//$remarks = "Did not TAP IN";
												    }
												     else if($tapin_exist == 0 && $tapout_exist == 0)
												    {
												    	$remarks = "Absent";
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
														$hrcnt =  $interval->format('%h')." Hours ".$interval->format('%i')." Minutes";
														//echo $hrcnt;
														//echo $remarks;

												    }
												      //echo " <hr> <br>";

												        $datetime1 = new DateTime($NEWXtime);
														$datetime2 = new DateTime($NEWXtime2);
														$interval = $datetime1->diff($datetime2);
														$hrcnt =  $interval->format('%h')." Hours ".$interval->format('%i')." Minutes";

									 if($NEWXtime == '')
									 {
									 	$NEWXtime = 'ND';
									 }

									 if($NEWXtime2 == '')
									 {
									 	$NEWXtime2 = 'ND';
									 }

									 if($NEWXtime == '' && !empt($NEWXtime2))
									 {
									 	$remarks = 'NO TAP IN';
									 	$hrcnt = 'cannot compute';
									 }

									 if($NEWXtime2 == '' && !empt($NEWXtime))
									 {
									 	$remarks = 'NO TAP OUT';
									 	$hrcnt = 'cannot compute';
									 }

									  if($NEWXtime == 'ND' && $NEWXtime2 == 'ND')
									 {
									 	$remarks = 'ND';
									 	$hrcnt = 'ND';
									 }



						   			  $myqryY = "INSERT INTO `reports_admin`(`id_no`, `Firstname`, `Lastname`, `Date`, `TimeIn`, `TimeOut`, `Duration`, `Remarks`) VALUES ('".$id_no."','".$fname."','".$lname."','".$date."','".$NEWXtime."','".$NEWXtime2."','".$hrcnt."','".$remarks."')";


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

				    } 
				    else 
				    {
				    	//$tapout_exist = 0;
				    	//echo "tapout | 0";
				    }




      }
    } else {
      //echo "0 results";
    }
 //echo "end of file."


//include_once 'php prototyping/generator_report_update.php';
?>

