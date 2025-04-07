<?php

require '../connection.php';

$xidno = "2015102434";
	
									  $str1 = "00:00:00";
                                      $str2 = "23:59:00";

                                      $frdaterange = "2021/01/10";
                                      $todaterange = "2021/01/16";

                                      $newfrdate = $frdaterange;
                                      $newtodate = $todaterange;
			


				     							 $query = "SELECT * FROM reports_admin WHERE `id_no`='".$xidno."' AND `Date` BETWEEN '".$frdaterange. "' AND '".$todaterange."' ";  
                                                $result = mysqli_query($con, $query); 

                                                //VALID USER EXIST 
                                                 if(mysqli_num_rows($result) > 0)
                                                 {

                                                 }
                                                 else
                                                {
                                                    echo "<script>alert('".$xidno." is not a valid member of MCL')</script>;";
                                                }



?>