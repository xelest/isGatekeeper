<?php

include 'connection.php';

$id_no = '2015102011';
$frdate = '2021/01/18 00:00:00';
$todate = '2021/01/18 23:00:00';

update_hrs($id_no, $frdate, $todate);

function update_hrs($id_no, $frdate, $todate)
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

echo $cntIN;
echo " | ";
echo $cntOUT;

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
				echo "<br>"; echo $final;


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