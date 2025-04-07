<?php

require '../connection.php';

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
        echo $date;
        echo " | ";


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
						   				$myqryY = "INSERT INTO `reports_admin`(`id_no`, `Firstname`, `Lastname`, `Date`, `TimeIn`, `TimeOut`, `Duration`, `Remarks`) VALUES ('".$id_no."','".$fname."','".$lname."','".$date."','ND','ND','ND','ND')";


								       if(mysqli_query($con, $myqryY) === TRUE)
								       {
								       		echo " | inserted | <br>";
								       }
								       else
								       {
								       		echo " | failed | <br>";
								       		echo 'Error: '. $con->error;
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



?>

