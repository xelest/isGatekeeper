<?php
  

$dateMIN = "2020-12-16 07:00:00";
$dateMAX = "2020-12-16 20:00:00";

$tapin1	 = "";
$tapout1 = "";
$tapin2  = "";
$tapout1 = "";
$tapin3  = "";
$tapout3 = "";
$sFormat = 'Y-m-d H:i:s';






  $DB_HOST = 'localhost';
  $DB_USER = 'root';
  $DB_PASS = '';
  $DB_NAME = 'mclccisn_gatekeeper';


  $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);

  if(!$con)
  {
    die( "Unable to select database");
  }

$id_no =  array("2016180067", "2015380013", "2015102429", "2015102434", "2015102433");
$start_time = 0;
$end_time =0;

for($x = 0; $x < 5; $x++){
	//generate
	$dt = gen_dt();
	$dt2 = gen_dt();
	/////////////
	if($start_time <= $dt){
	$start_time = $dt;}
	if($end_time >= $dt2)
	$end_time = $dt2;
	/////////////
	//regenerate
	while ($dt > $dt2){
		$dt = gen_dt();
	}
	//check if correct
	if($dt < $dt2){
	echo $dt ; echo "<br>";
	echo $dt2 ; echo "<br>";
	}

	$myqry1 = "INSERT INTO `tapin_logs`(`id_no`,`inDate`) VALUES ('".$id_no[$x]."','".$dt."')";
	mysqli_query($con, $myqry1);  
	$myqry2 = "INSERT INTO `tapout_logs`(`id_no`,`outDate`) VALUES ('".$id_no[$x]."','".$dt2."')";
	mysqli_query($con, $myqry2);
}

/////////////
$start_time = $dt;
$end_time = $dt2;
/////////////

$time1 = new DateTime($start_time);
$time2 = new DateTime($end_time);
$interval = $time1->diff($time2);

echo $hour = $interval->format('%h hour ');
echo $min = $interval->format('%i min ');
echo $sec = $interval->format('%s seconds');

/////////////


  $DB_HOST = 'localhost';
  $DB_USER = 'root';
  $DB_PASS = '';
  $DB_NAME = 'mclccisn_gatekeeper';


  $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);

  if(!$con)
  {
    die( "Unable to select database");
  }

	$myqryS = "SELECT `id_no`,`inDate` from `tapin_logs` WHERE id_no = '".$id_no[1]."' ORDER BY `inDate` ASC LIMIT 1";
	mysqli_query($con, $myqryS);  

	if ($result = mysqli_query($con, $myqryS)) {
	 while ($row = mysqli_fetch_row($result)) {
	 	$stime = $row[1]; 
		echo "<br>";
	 	echo $stime;
	 	echo "<br>";
	  }
	}


	 $myqryE = "SELECT `id_no`,`outDate` from `tapout_logs` WHERE id_no = '".$id_no[1]."' ORDER BY `outDate` DESC LIMIT 1";
	mysqli_query($con, $myqryE);  

	if ($result2 = mysqli_query($con, $myqryE)) {
	 while ($row2 = mysqli_fetch_row($result2)) {
	 	$etime = $row2[1]; 

	 	echo "<br>";
	 	echo $etime;
	 	echo "<br>";
	  }
	}


$xstime = $stime;
$xetime = $etime;

$xtime1 = new DateTime($xstime);
$xtime2 = new DateTime($xetime);

$dg = $xtime1->diff($xtime2);
echo "<br>";
echo $h = $dg->format('%h hour ');
echo "<br>";
echo $m = $dg->format('%i min ');
echo "<br>";
echo $s = $dg->format('%s seconds');
echo "<br>";


/////////////
function gen_dt(){
  $DB_HOST = 'localhost';
  $DB_USER = 'root';
  $DB_PASS = '';
  $DB_NAME = 'mclccisn_gatekeeper';


  $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);

  if(!$con)
  {
    die( "Unable to select database");
  }

$msql= "
SELECT DATE_FORMAT(
    FROM_UNIXTIME(
         RAND() * 
            (UNIX_TIMESTAMP('2021-01-04 07:00:00') - UNIX_TIMESTAMP('2021-01-04 20:00:00')) + 
             UNIX_TIMESTAMP('2021-01-04 20:00:00')
                  ), '%Y-%m-%d %H:%i:%s')";

if ($result = mysqli_query($con, $msql)) {
 while ($row = mysqli_fetch_row($result)) {
 	$dt = $row[0]; 
  }
}

return $dt;
}


function get_data(){

while ($row = mysql_fetch_assoc($result)) {
    echo $row["userid"];
    echo $row["fullname"];
    echo $row["userstatus"];
}

}


?>
