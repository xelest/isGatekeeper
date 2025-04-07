<?php

include 'connection.php';
$msql = "SELECT * from reports_admin";
$rz = $con->query($msql);

  
if ($rz->num_rows > 0) 
{						
	while($rwz = $rz->fetch_assoc()) 
	{	
		$id_no = $rwz['id_no'];
		$date = $rwz['Date'];
		$timein = $rwz['TimeIn'];
		$timeout = $rwz['TimeOut'];

		if($timein == '' || empty($timein) || is_null($timein))
		{

		}
		else if($timeout == '' || empty($timeout) || is_null($timeout))
		{
			
		}
		else if (!empty($timeout) && !empty($timein))
		{

		}
		else if (!empty($timein) && empty($timeout))
		{
			$remarks = 'DID NOT TAPPED OUT';
			$mqry = "UPDATE `reports_admin` SET `Remarks`='".$remarks."' WHERE id_no = '".$id_no."'";
			mysqli_query($con, $mqry);
		}
		else if (!empty($timein) && empty($timeout))
		{
			$remarks = 'DID NOT TAPPED IN';
			$mqry = "UPDATE `reports_admin` SET `Remarks`='".$remarks."' WHERE id_no = '".$id_no."'";
			mysqli_query($con, $mqry);
		}


	}	    					
} 
 else
{

}
?>