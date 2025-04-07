<?php
include 'connection.php';

$sqlz = "SELECT * FROM `reports_admin` WHERE Timein != 'ND' AND TimeOut = 'ND'";
$resultz = $con->query($sqlz);

				    if ($resultz->num_rows > 0) 
				    {

				    	while($rowz = $resultz->fetch_assoc()) 
				    	{
				        	$id_no = $rowz['id_no'];
				        	$date = $rowz['Date'];

				        	$ins = "UPDATE `reports_admin` SET `Duration`='ND', `Remarks`='TAPPED IN' WHERE id_no = '".$id_no."' AND Date = '".$date."'";

				        	if(mysqli_query($con, $ins) === TRUE)
							{
								
							}
							 else
							{

							}

				        }
				    }

$sqlz = "SELECT * FROM `reports_admin` WHERE Timein = 'ND' AND TimeOut = 'ND'";
$resultz = $con->query($sqlz);

				    if ($resultz->num_rows > 0) 
				    {

				    	while($rowz = $resultz->fetch_assoc()) 
				    	{
				        	$id_no = $rowz['id_no'];
				        	$date = $rowz['Date'];

				        	$ins = "UPDATE `reports_admin` SET `Duration`='ND', `Remarks`='ND' WHERE id_no = '".$id_no."' AND Date = '".$date."'";

				        	if(mysqli_query($con, $ins) === TRUE)
							{
								
							}
							 else
							{

							}

				        }
				    }	

clear_absents();
$sqlz = "SELECT * FROM `reports_admin` WHERE `TimeIn` = 'ND' AND TimeOut != 'ND'";
$resultz = $con->query($sqlz);

				    if ($resultz->num_rows > 0) 
				    {

				    	while($rowz = $resultz->fetch_assoc()) 
				    	{
				        	$id_no = $rowz['id_no'];
				        	$date = $rowz['Date'];

				        	$ins = "UPDATE `reports_admin` SET `Duration`='ND', `Remarks`='NO TAP IN' WHERE id_no = '".$id_no."' AND Date = '".$date."'";

				        	if(mysqli_query($con, $ins) === TRUE)
							{
								
							}
							 else
							{

							}

				        }
				    }	

$sqlz = "SELECT * FROM `reports_admin` WHERE `TimeIn` = 'ND' AND TimeOut = 'ND' AND `Duration`= 'ND' AND `Remarks`='ND'";
$resultz = $con->query($sqlz);

				    if ($resultz->num_rows > 0) 
				    {

				    	while($rowz = $resultz->fetch_assoc()) 
				    	{
				        	$id_no = $rowz['id_no'];
				        	$date = $rowz['Date'];

				        	$ins = "DELETE FROM `reports_admin` WHERE `TimeIn` = 'ND' AND TimeOut = 'ND' AND `Remarks` = 'ND'";

				        	if(mysqli_query($con, $ins) === TRUE)
							{
								
							}
							 else
							{

							}

				        }
				    }	



function clear_absents()
{
	include 'connection.php';
$sqlz = "SELECT * FROM `reports_admin` WHERE `Remarks`='Absent'";
$resultz = $con->query($sqlz);

				    if ($resultz->num_rows > 0) 
				    {

				    	while($rowz = $resultz->fetch_assoc()) 
				    	{
				        	$id_no = $rowz['id_no'];
				        	$date = $rowz['Date'];

				        	$ins = "DELETE FROM `reports_admin` WHERE `Remarks`='Absent'";

				        	if(mysqli_query($con, $ins) === TRUE)
							{
								
							}
							 else
							{

							}

				        }
				    }	
}



function get_absents()
{

	include 'connection.php';

	$str1 = "00:00:00";
	$str2 = "23:59:00";

	$sql2 = 'SELECT * FROM calendar';
    $result2 = $con->query($sql2);

    if ($result2->num_rows > 0) 
    {

      while($row2 = $result2->fetch_assoc()) 
      {
        $date = $row2["calendar_dates"];
        $newfrdate = $date . ' ' . $str1;
        $newtodate = $date . ' ' . $str2;

        			//traversing admins
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
									    else  // NOT FOUND IN THIS DATE
									   	{
									   			 $myqryY = "INSERT INTO `reports_admin` (`id_no`,`Firstname`,`Lastname`,`Date`,`Remarks`) VALUES ('".$id_no."','".$fname."','".$lname."','".$date."','Absent')";


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
						//no admins
					}

      }
    }


}



function update_duration()
{

	include 'connection.php';

	$str1 = "00:00:00";
	$str2 = "23:59:00";

	$sql2 = 'SELECT * FROM calendar';
    $result2 = $con->query($sql2);

    if ($result2->num_rows > 0) 
    {

      while($row2 = $result2->fetch_assoc()) 
      {
        $date = $row2["calendar_dates"];
        $newfrdate = $date . ' ' . $str1;
        $newtodate = $date . ' ' . $str2;

        			//traversing admins
        			$sqlz = "SELECT * FROM `user_account` WHERE acc_type='Admin'";
				    $resultz = $con->query($sqlz);

				    if ($resultz->num_rows > 0) // selected user id
				    {
				    		while($rowz = $resultz->fetch_assoc()) 
				    		{
				        		$id_no = $rowz['id_no'];

			        					$sqly = "SELECT * FROM `reports_admin` WHERE id_no='".$id_no."' AND `Date`='".$date."' ";
									    $resulty = $con->query($sqly);

									    if ($resulty->num_rows > 0) // select date and user id
									    {						
									    		   $myqryY = "UPDATE `reports_admin` SET `Duration`='".$duration."'
									   			 	          WHERE id_no = '".$id_no."' AND Date = '".$date."'";


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
									    else  // NOT FOUND IN THIS DATE
									   	{
									   			 
									   	}
							}
					}
					else
					{
						//no admins
					}

      }
    }


}

update_hrs();
function update_hrs()
{

	include 'connection.php';

	$str1 = "00:00:00";
	$str2 = "23:59:00";

	$sql2 = 'SELECT * FROM calendar';
    $result2 = $con->query($sql2);

    if ($result2->num_rows > 0) 
    {

      while($row2 = $result2->fetch_assoc()) 
      {
        $date = $row2["calendar_dates"];
        $newfrdate = $date . ' ' . $str1;
        $newtodate = $date . ' ' . $str2;
        $frdate = $newfrdate;
        $todate = $newtodate;

        			//traversing admins
        			$sqlz = "SELECT * FROM `user_account` WHERE acc_type='Admin'";
				    $resultz = $con->query($sqlz);

				    if ($resultz->num_rows > 0) // selected user id
				    {
				    		while($rowz = $resultz->fetch_assoc()) 
				    		{
				        		$id_no = $rowz['id_no'];

			        					$sqly = "SELECT * FROM `reports_admin` WHERE id_no='".$id_no."' AND `Date`='".$date."' ";
									    $resulty = $con->query($sqly);

									    if ($resulty->num_rows > 0) // select date and user id
									    {						
									    	//create the compuation here
									    	update_hours($id_no,$frdate,$todate,$date);
									    		   
									    } 
									    else  // NOT FOUND IN THIS DATE
									   	{
									   			 
									   	}
							}
					}
					else
					{
						//no admins
					}

      }
    }


}


function update_hours($id_no, $frdate, $todate,$date)
{
	include 'connection.php';
$sqlz = "SELECT COUNT(inDate) as cntIN FROM `tapin_logs` WHERE id_no='$id_no' AND inDate BETWEEN '".$frdate."' AND '".$todate."'";
				    $resultz = $con->query($sqlz);

while($rowz = $resultz->fetch_assoc()) 
{
	$cntIN = $rowz['cntIN'];
}


$sqlz = "SELECT COUNT(outDate) as cntOUT FROM `tapout_logs` WHERE id_no='$id_no' AND outDate BETWEEN '".$frdate."' AND '".$todate."'";
	$resultz = $con->query($sqlz);

while($rowz = $resultz->fetch_assoc()) 
{
	$cntOUT = $rowz['cntOUT'];
}

//echo $cntIN;
//echo " | ";
//echo $cntOUT;

	if($cntIN == $cntOUT)
	{
				$rowzIN = array();
				$rowzOUT = array();
				$cntINX = array();
				$cntOUTX = array();

				$ctr = 0;
				$sqlz = "SELECT inDate FROM `tapin_logs` WHERE id_no='$id_no' AND `inDate` BETWEEN '".$frdate."' AND '".$todate."' ";
								    $resultz = $con->query($sqlz);

				while($rowzIN[] = $resultz->fetch_assoc()) 
				{
					$cntINX[$ctr] = $rowzIN[$ctr]['inDate'];
					$ctr++;
				}


				$ctr = 0;
				$sqlz2 = "SELECT outDate FROM `tapout_logs` WHERE id_no='$id_no' AND `outDate` BETWEEN '".$frdate."' AND '".$todate."' ";
								    $resultz2 = $con->query($sqlz2);

				while($rowzOUT[] = $resultz2->fetch_assoc()) 
				{
					$cntOUTX[$ctr] = $rowzOUT[$ctr]['outDate'];
					$ctr++;
				}


				$totalHoursDiff2 = 0 ;	
				$ctr = 0;
				while($ctr != $cntIN)
				{

					$earliest = $cntINX[$ctr];
					$timestamp = $earliest;
					$splitTimeStamp = explode(" ",$timestamp);
					$NEWXdate = $splitTimeStamp[0];
					$NEWXtime = $splitTimeStamp[1];

					$timestamp2 = $cntOUTX[$ctr];
					$splitTimeStamp2 = explode(" ",$timestamp2);
					$NEWXdate2 = $splitTimeStamp2[0];
					$NEWXtime2 = $splitTimeStamp2[1];


					$datetime1 = new DateTime($NEWXtime);
					$datetime2 = new DateTime($NEWXtime2);
					$interval = $datetime1->diff($datetime2);

					$d1 = strtotime($NEWXtime);
					$d2 = strtotime($NEWXtime2);
					//echo "<br>";
					$totalSecondsDiff = abs($d1-$d2);
					//echo $totalSecondsDiff;
					//echo " | ";
					$totalHoursDiff1 = $totalSecondsDiff/60;
					//echo $totalHoursDiff1;
					$totalHoursDiff2  = $totalHoursDiff2 + $totalHoursDiff1;
					//echo " | ";
					//echo $totalHoursDiff2;
				$ctr++;
				}

				$final = hoursandmins($totalHoursDiff2);
				//echo "<br>"; echo $final;
				$myqryY = "UPDATE `reports_admin` SET `Duration`='".$final."'
							WHERE id_no = '".$id_no."' AND Date = '".$date."'";


				if(mysqli_query($con, $myqryY) === TRUE)
				{

				}
				else
				{

				}
											       	

	}
}

function hoursandmins($time, $format = '%02d hours, %02d minutes')
{
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}



?>

