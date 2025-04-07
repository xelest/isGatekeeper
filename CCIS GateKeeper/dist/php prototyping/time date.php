<?php

require '../connection.php';


$timefr = '07:00:00';
$timeto = '19:00:00';
$datefr = '2021-01-04';
$dateto = '2021-01-08';
$dtfr = "'".$datefr."' '".$timefr."'";
$dtto = "'".$dateto."' '".$timeto."'";

$sql = "SELECT `id_no` from tapin_logs 
where `inDate` 
BETWEEN '".$dtfr."' AND '".$dtto."' group by id_no";

$result = $con->query($sql);

  $cnt = 0; //count the ids
if ($result->num_rows > 0) 
{

    while($row = $result->fetch_assoc()) 
    {
    	$cnt = $row['id_no'];
    }
    echo $cnt;
    //echo $ids[$cnt-1];
} 
else 
{
  echo "0 results";
}










function get_whofirstname($who){

require '../connection.php';

  $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);

  if(!$con)
  {
    die( "Unable to select database");
  }

    $sql2 = 'SELECT * FROM user_account WHERE id_no = '.$who.'';
    $result2 = $con->query($sql2);

    if ($result2->num_rows > 0) {
      // output data of each row
      while($row2 = $result2->fetch_assoc()) {
        $fname = $row2["firstname"];
      }
    } else {
      echo "0 results";
    }
 return $fname;
}

function get_wholastname($who){

require '../connection.php';

  $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);

  if(!$con)
  {
    die( "Unable to select database");
  }

    $sql2 = 'SELECT * FROM user_account WHERE id_no = '.$who.'';
    $result2 = $con->query($sql2);

    if ($result2->num_rows > 0) {
      // output data of each row
      while($row2 = $result2->fetch_assoc()) {
        $lname = $row2["lastname"];
      }
    } else {
      echo "0 results";
    }
 return $lname;
}



function get_starttime($who, $when){
	require '../connection.php';
	$myqryS = "SELECT `id_no`,`inDate` from `tapin_logs` WHERE id_no = '".$id_no[0]."' ORDER BY `inDate` ASC LIMIT 1";
	mysqli_query($con, $myqryS);  

	if ($result = mysqli_query($con, $myqryS)) {
	 while ($row = mysqli_fetch_row($result)) {
	 	$stime = $row[0]; 
		echo "<br>";
	 	echo $stime;
	 	echo "<br>";
	  }
	}
}

function get_endtime($who, $when){
	require '../connection.php';
	 $myqryE = "SELECT `id_no`,`outDate` from `tapout_logs` WHERE id_no = '".$id_no[0]."' ORDER BY `outDate` DESC LIMIT 1";
	mysqli_query($con, $myqryE);  

	if ($result2 = mysqli_query($con, $myqryE)) {
	 while ($row2 = mysqli_fetch_row($result2)) {
	 	$etime = $row2[1]; 

	 	echo "<br>";
	 	echo $etime;
	 	echo "<br>";
	  }
	}
}

function get_duration($stime,$etime)
{

	$xstime = $stime;
	$xetime = $etime;

	$xtime1 = new DateTime($xstime);
	$xtime2 = new DateTime($xetime);

	$dg = $xtime1->diff($xtime2);

	return $dg;
}

?>

