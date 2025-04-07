<?php 


  $DB_HOST = 'localhost';
  $DB_USER = 'root';
  $DB_PASS = '';
  $DB_NAME = 'mclccisn_gatekeeper';

  $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);

  if(!$con)
  {
    die( "Unable to select database");
  }

$cnt = array();


$myqryS = "SELECT COUNT(`outDate`) as `gg`
FROM tapout_logs WHERE DATE(`outDate`) = DATE(CURDATE()) 
AND HOUR(`outDate`) >= HOUR('06:59:00')
AND HOUR(`outDate`) <= HOUR('08:00:00')";


	if ($result = mysqli_query($con, $myqryS)) {
	 while ($row = mysqli_fetch_row($result)) {
	 	$cnt[0] = $row[0];
	  }
	}
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`outDate`) as `gg`
FROM tapout_logs WHERE DATE(`outDate`) = DATE(CURDATE()) 
AND HOUR(`outDate`) >= HOUR('07:59:00')
AND HOUR(`outDate`) <= HOUR('09:00:00')";


	if ($result = mysqli_query($con, $myqryS)) {
	 while ($row = mysqli_fetch_row($result)) {
	 	$cnt[1] = $row[0];
	  }
	}
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`outDate`) as `gg`
FROM tapout_logs WHERE DATE(`outDate`) = DATE(CURDATE()) 
AND HOUR(`outDate`) >= HOUR('08:59:00')
AND HOUR(`outDate`) <= HOUR('10:00:00')";


	if ($result = mysqli_query($con, $myqryS)) {
	 while ($row = mysqli_fetch_row($result)) {
	 	$cnt[2] = $row[0];
	  }
	}
//echo $cnt; echo "<br>";echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`outDate`) as `gg`
FROM tapout_logs WHERE DATE(`outDate`) = DATE(CURDATE()) 
AND HOUR(`outDate`) >= HOUR('9:59:00')
AND HOUR(`outDate`) <= HOUR('11:00:00')";


	if ($result = mysqli_query($con, $myqryS)) {
	 while ($row = mysqli_fetch_row($result)) {
	 	$cnt[3] = $row[0];
	  }
	}
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`outDate`) as `gg`
FROM tapout_logs WHERE DATE(`outDate`) = DATE(CURDATE()) 
AND HOUR(`outDate`) >= HOUR('10:59:00')
AND HOUR(`outDate`) <= HOUR('12:00:00')";


	if ($result = mysqli_query($con, $myqryS)) {
	 while ($row = mysqli_fetch_row($result)) {
	 	$cnt[4] = $row[0];
	  }
	}
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`outDate`) as `gg`
FROM tapout_logs WHERE DATE(`outDate`) = DATE(CURDATE()) 
AND HOUR(`outDate`) >= HOUR('11:59:00')
AND HOUR(`outDate`) <= HOUR('13:00:00')";


	if ($result = mysqli_query($con, $myqryS)) {
	 while ($row = mysqli_fetch_row($result)) {
	 	$cnt[5] = $row[0];
	  }
	}
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`outDate`) as `gg`
FROM tapout_logs WHERE DATE(`outDate`) = DATE(CURDATE()) 
AND HOUR(`outDate`) >= HOUR('13:59:00')
AND HOUR(`outDate`) <= HOUR('15:00:00')";


	if ($result = mysqli_query($con, $myqryS)) {
	 while ($row = mysqli_fetch_row($result)) {
	 	$cnt[6] = $row[0];
	  }
	}
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`outDate`) as `gg`
FROM tapout_logs WHERE DATE(`outDate`) = DATE(CURDATE()) 
AND HOUR(`outDate`) >= HOUR('15:59:00')
AND HOUR(`outDate`) <= HOUR('17:00:00')";


	if ($result = mysqli_query($con, $myqryS)) {
	 while ($row = mysqli_fetch_row($result)) {
	 	$cnt[7] = $row[0];
	  }
	}
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`outDate`) as `gg`
FROM tapout_logs WHERE DATE(`outDate`) = DATE(CURDATE()) 
AND HOUR(`outDate`) >= HOUR('16:59:00')
AND HOUR(`outDate`) <= HOUR('18:00:00')";


	if ($result = mysqli_query($con, $myqryS)) {
	 while ($row = mysqli_fetch_row($result)) {
	 	$cnt[8] = $row[0];
	  }
	}
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`outDate`) as `gg`
FROM tapout_logs WHERE DATE(`outDate`) = DATE(CURDATE()) 
AND HOUR(`outDate`) >= HOUR('17:59:00')
AND HOUR(`outDate`) <= HOUR('19:00:00')";


	if ($result = mysqli_query($con, $myqryS)) {
	 while ($row = mysqli_fetch_row($result)) {
	 	$cnt[9] = $row[0];
	  }
	}
//echo $cnt; echo "<br>";


$myqryS = "SELECT COUNT(`outDate`) as `gg`
FROM tapout_logs WHERE DATE(`outDate`) = DATE(CURDATE()) 
AND HOUR(`outDate`) >= HOUR('17:59:00')
AND HOUR(`outDate`) <= HOUR('20:00:00')";


	if ($result = mysqli_query($con, $myqryS)) {
	 while ($row = mysqli_fetch_row($result)) {
	 	$cnt[10] = $row[0];
	  }
	}
//echo $cnt; echo "<br>";


//-------------------------------
echo "-------------------------"; echo "<br>";

$myqryS = "SELECT COUNT(`inDate`) as `gg`
FROM `tapin_logs` WHERE DATE(`inDate`) = DATE(CURDATE()) 
AND HOUR(`inDate`) >= HOUR('06:59:00')
AND HOUR(`inDate`) <= HOUR('08:00:00')";


	if ($result = mysqli_query($con, $myqryS)) {
	 while ($row = mysqli_fetch_row($result)) {
	 	$cnt[11] = $row[0];
	  }
	}
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`inDate`) as `gg`
FROM `tapin_logs` WHERE DATE(`inDate`) = DATE(CURDATE()) 
AND HOUR(`inDate`) >= HOUR('07:59:00')
AND HOUR(`inDate`) <= HOUR('09:00:00')";


	if ($result = mysqli_query($con, $myqryS)) {
	 while ($row = mysqli_fetch_row($result)) {
	 	$cnt[12] = $row[0];
	  }
	}
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`inDate`) as `gg`
FROM `tapin_logs` WHERE DATE(`inDate`) = DATE(CURDATE()) 
AND HOUR(`inDate`) >= HOUR('08:59:00')
AND HOUR(`inDate`) <= HOUR('10:00:00')";


	if ($result = mysqli_query($con, $myqryS)) {
	 while ($row = mysqli_fetch_row($result)) {
	 	$cnt[13] = $row[0];
	  }
	}
//echo $cnt; echo "<br>";echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`inDate`) as `gg`
FROM `tapin_logs` WHERE DATE(`inDate`) = DATE(CURDATE()) 
AND HOUR(`inDate`) >= HOUR('9:59:00')
AND HOUR(`inDate`) <= HOUR('11:00:00')";


	if ($result = mysqli_query($con, $myqryS)) {
	 while ($row = mysqli_fetch_row($result)) {
	 	$cnt[14] = $row[0];
	  }
	}
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`inDate`) as `gg`
FROM `tapin_logs` WHERE DATE(`inDate`) = DATE(CURDATE()) 
AND HOUR(`inDate`) >= HOUR('10:59:00')
AND HOUR(`inDate`) <= HOUR('12:00:00')";


	if ($result = mysqli_query($con, $myqryS)) {
	 while ($row = mysqli_fetch_row($result)) {
	 	$cnt[15] = $row[0];
	  }
	}
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`inDate`) as `gg`
FROM `tapin_logs` WHERE DATE(`inDate`) = DATE(CURDATE()) 
AND HOUR(`inDate`) >= HOUR('11:59:00')
AND HOUR(`inDate`) <= HOUR('13:00:00')";


	if ($result = mysqli_query($con, $myqryS)) {
	 while ($row = mysqli_fetch_row($result)) {
	 	$cnt[16] = $row[0];
	  }
	}
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`inDate`) as `gg`
FROM `tapin_logs` WHERE DATE(`inDate`) = DATE(CURDATE()) 
AND HOUR(`inDate`) >= HOUR('13:59:00')
AND HOUR(`inDate`) <= HOUR('15:00:00')";


	if ($result = mysqli_query($con, $myqryS)) {
	 while ($row = mysqli_fetch_row($result)) {
	 	$cnt[17] = $row[0];
	  }
	}
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`inDate`) as `gg`
FROM `tapin_logs` WHERE DATE(`inDate`) = DATE(CURDATE()) 
AND HOUR(`inDate`) >= HOUR('15:59:00')
AND HOUR(`inDate`) <= HOUR('17:00:00')";


	if ($result = mysqli_query($con, $myqryS)) {
	 while ($row = mysqli_fetch_row($result)) {
	 	$cnt[18] = $row[0];
	  }
	}
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`inDate`) as `gg`
FROM `tapin_logs` WHERE DATE(`inDate`) = DATE(CURDATE()) 
AND HOUR(`inDate`) >= HOUR('16:59:00')
AND HOUR(`inDate`) <= HOUR('18:00:00')";


	if ($result = mysqli_query($con, $myqryS)) {
	 while ($row = mysqli_fetch_row($result)) {
	 	$cnt[19] = $row[0];
	  }
	}
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`inDate`) as `gg`
FROM `tapin_logs` WHERE DATE(`inDate`) = DATE(CURDATE()) 
AND HOUR(`inDate`) >= HOUR('17:59:00')
AND HOUR(`inDate`) <= HOUR('19:00:00')";


	if ($result = mysqli_query($con, $myqryS)) {
	 while ($row = mysqli_fetch_row($result)) {
	 	$cnt[20] = $row[0];
	  }
	}
//echo $cnt; echo "<br>";


$myqryS = "SELECT COUNT(`inDate`) as `gg`
FROM `tapin_logs` WHERE DATE(`inDate`) = DATE(CURDATE()) 
AND HOUR(`inDate`) >= HOUR('17:59:00')
AND HOUR(`inDate`) <= HOUR('20:00:00')";


	if ($result = mysqli_query($con, $myqryS)) {
	 while ($row = mysqli_fetch_row($result)) {
	 	$cnt[21] = $row[0];
	  }
	}
//echo $cnt; echo "<br>";


?>