
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CCIS | </title>

    <link href="assets/vendor/bootstrap4/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/DataTables/datatables.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
    <link href="css/mycss.css" rel="stylesheet">

    <link href="assets/vendor/airdatepicker/dist/css/datepicker.min.css" rel="stylesheet">



    <?php
    //onload variables
    $newname = "NO DATA";
    $xidno = "NO DATA";
    $position = "NO DATA";
    $frdaterange = "NO DATA";
    $todaterange = "NO DATA";
    session_start();
    ?>


    
  <script src="js/script_date_time.js"></script>

</head>

<body>
    <div class="wrapper">
        <div id="body" class="active">
            <div class="content">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-7"><h3>REPORTS </h3></div>

                            <div class="col-5"><div class="card-body" style="text-align: right;" ><span id="date_time"></span></div></div>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-6 col-md-6">
                                <div class="row" style="align-items: center">

                                    <div class="col-4" style="padding: 3px;">
                                    <form method="post" id="form1"  action="">
                                        <input type="text" class="form-control datepicker-here" data-range="false"   id="frdaterange" name="frdaterange" data-language="en" data-position="bottom left"  data-date-format="yyyy/mm/dd" aria-describedby="daterange" placeholder="Date Start" required>
                                    </div>

                                  
                                    <div class="col-4" style="padding: 3px;">
                                       <input type="text" name="xidno" id="xidno"  class="form-control" placeholder="ID Number" />
                                    </div>


                                    <div class="col-4" style="padding: 3px;">
                                        <input type="submit" name="clear" id="clear" value="&nbsp;&nbsp;&nbsp;&nbsp;Clear&nbsp;&nbsp;&nbsp;" class="btn btn-warning" />
                                    </div>

                                    <div class="col-4" style="padding: 3px;">
                                    <input type="text" class="form-control datepicker-here" data-range="false"   id="todaterange" name="todaterange" data-language="en" data-position="bottom left" data-date-format="yyyy/mm/dd" aria-describedby="daterange" placeholder="Date End" required>
                                    </div>

                                    
 
                                    <div class="col-4" style="padding: 3px;">
                                                        <select name="xfilter" class="form-control" required="" id="xfilter">
                                                            <option value="All" selected="">Default All</option>
                                                            <option value="late">Late</option>
                                                            <option value="Absent">Absent</option>
                                                            <option value="ontime">Present</option>
                                                        </select>
                                                      </div>

                                    <div class="col-4" style="padding: 3px;">
                                        <input type="submit" name="query" value="Generate" class="btn btn-primary" />
                                    </div>

                                    <form>
                            </div>
                    </div>
                     <div class="col-6 col-md-6">
                        <div class="row" >
                            <div class="col-9" align="left" style="align-items: right;padding: 0px; margin-right: 0px;">
                                Below is a preview of the generated report.<br>
                                Press print to save to pdf or print page.
                            </div>

                                
                            <div class="col-3" style="padding: 3px;">
                              <form id="form2" action="print_repor_admins_TESTING.php" method="POST" target="_blank">
                                 <input type="submit" class="btn btn-primary btn-block" id="PRINT" name="PRINT" value="PRINT / SAVE">
                              </form>
                               </div>
                            </div>

                        </div>
                         </div> 
                </div>
                <?php
                $connect = mysqli_connect("localhost", "root", "", "mclccisn_gatekeeper");

                         //$query = "SELECT * FROM attnmessage";  
                        // $result = mysqli_query($connect, $query);  


                        if(isset($_POST['clear']))
                        {
                          echo "<script> document.getElementById('form1').reset(); </script>";


                        }


                        if(isset($_POST['query']))
                        {
                                      $frdaterange = $_POST['frdaterange'];
                                      $todaterange = $_POST['todaterange'];
                                      $xfilter = $_POST['xfilter'];
                                      $xidno = $_POST['xidno'];

                                        $_SESSION['frd'] = $frdaterange;
                                        $_SESSION['tod'] =  $todaterange;
                                        $_SESSION['id'] =  $xidno;
                                        $_SESSION['xfilter'] = $xfilter;

                                        echo'
                                            <script>    document.getElementById("frdaterange").disabled = true;
                                                document.getElementById("todaterange").disabled = true;
                                                document.getElementById("xidno").disabled = true; </script> ';

                                        session_commit();

                                      $str1 = "00:00:00";
                                      $str2 = "23:59:00";

                                      $newfrdate = $frdaterange . ' ' . $str1;
                                      $newtodate = $todaterange . ' ' . $str2;

                                    if($frdaterange > $todaterange)
                                    {
                                        echo "<script>alert('invalid date range FROM is greater than TO')</script>;";
                                        echo'
                                                        <script>   
                                                            document.getElementById("frdaterange").disabled = false;
                                                            document.getElementById("todaterange").disabled = false;
                                                            document.getElementById("xidno").disabled = false; </script> ';
                                    }
                                    else if ($frdaterange <= $todaterange && $xidno != '' && $xfilter == 'all')
                                    {

                                               $query = "SELECT * FROM reports_admin WHERE `id_no`='".$xidno."' AND `Date` BETWEEN '".$frdaterange. "' AND '".$todaterange."' Group BY `Date` ORDER BY `Date` DESC ";  
                                                $result = mysqli_query($connect, $query); 

                                                //VALID USER EXIST 
                                                 if(mysqli_num_rows($result) > 0)
                                                 {
                                                    $_POST['xprocess'] = "submit";
                                                    $position = 'Admin';

                                                    $query1 = "SELECT * FROM user_account WHERE `id_no`='".$xidno."' AND acc_type = 'Admin' LIMIT 1"; 
                                                    $_SESSION['query']  = $query1;
                                                    $result1 = mysqli_query($connect, $query1);
                                                     if(mysqli_num_rows($result1) > 0)
                                                    { 
                                                       while($row1 = $result1->fetch_assoc()) {
                                                             $fma = $row1['firstname'];
                                                             $lma = $row1['lastname'];
                                                             $newname = $lma .' '. $fma;
                                                       }

                                                    }



                                                 }
                                                 else
                                                {
                                                    echo "<script>alert('".$xidno." is not a valid member of MCL Admins')</script>;";
                                                     echo'
                                                        <script>   
                                                            document.getElementById("frdaterange").disabled = false;
                                                            document.getElementById("todaterange").disabled = false;
                                                            document.getElementById("xidno").disabled = false; </script> ';
                                                }


                                    } //
                                    else if ($xidno == '' && $frdaterange <= $todaterange &&  $xfilter == 'All') 
                                    { 
                                               clear_absents();
                                               $newname = "ALL";
                                                $xidno = "ALL";
                                                $position = "Admins";

                                               $query = "SELECT * FROM reports_admin WHERE `Date` BETWEEN '".$frdaterange. "' AND '".$todaterange."' ORDER BY `Date` DESC ";  
                                               $_SESSION['query']  = $query;
                                               $_SESSION['xfilter'] = $xfilter;
                                                $result = mysqli_query($connect, $query);
                                                   $_POST['xprocess'] = "submit";
                                     // echo "<script> alert('".$xidno." asd') </script>";
                                    }
                                    else if ($xidno == '' && $frdaterange <= $todaterange &&  $xfilter == 'late') 
                                    { 

                                               $newname = "ALL";
                                               $xidno = "ALL";
                                                $position = "Admins";
                                               $query = "SELECT * FROM reports_admin WHERE `Remarks`='".$xfilter."' AND `Date` BETWEEN '".$frdaterange. "' AND '".$todaterange."' ORDER BY `Date` DESC ";  
                                               $_SESSION['query']  = $query;
                                               $_SESSION['xfilter'] = $xfilter;
                                                $result = mysqli_query($connect, $query);
                                                   $_POST['xprocess'] = "submit";
                                     // echo "<script> alert('".$xidno." asd') </script>";
                                    }
                                    else if ($xidno == '' && $frdaterange <= $todaterange &&  $xfilter == 'ontime') 
                                    { 

                                               $newname = "ALL";
                                               $xidno = "ALL";
                                                $position = "Admins";
                                               $query = "SELECT * FROM reports_admin WHERE `Remarks`='".$xfilter."' AND `Date` BETWEEN '".$frdaterange. "' AND '".$todaterange."' ORDER BY `Date` DESC ";  
                                               $_SESSION['query']  = $query;
                                               $_SESSION['xfilter'] = $xfilter;
                                                $result = mysqli_query($connect, $query);
                                                   $_POST['xprocess'] = "submit";
                                     // echo "<script> alert('".$xidno." asd') </script>";
                                    }
                                     else if ($xidno != '' && $frdaterange <= $todaterange &&  $xfilter == 'All') 
                                    { 

                                              clear_absents();
                                               $query = "SELECT * FROM reports_admin WHERE `id_no`='".$xidno."' AND `Date` BETWEEN '".$frdaterange. "' AND '".$todaterange."' ORDER BY `Date` DESC ";  
                                               $_SESSION['query']  = $query;
                                               $_SESSION['xfilter'] = $xfilter;
                                                $result = mysqli_query($connect, $query);
                                                   $_POST['xprocess'] = "submit";
                                     // echo "<script> alert('".$xidno." asd') </script>";

                                                $position = 'Admin';

                                                    $query1 = "SELECT * FROM user_account WHERE `id_no`='".$xidno."' AND acc_type = 'Admin' LIMIT 1"; 
                                                    $_SESSION['query']  = $query1;
                                                    $result1 = mysqli_query($connect, $query1);
                                                     if(mysqli_num_rows($result1) > 0)
                                                    { 
                                                       while($row1 = $result1->fetch_assoc()) {
                                                             $fma = $row1['firstname'];
                                                             $lma = $row1['lastname'];
                                                             $newname = $lma .' '. $fma;
                                                       }

                                                    }
                                    }
                                    else if ($xidno != '' && $frdaterange <= $todaterange &&  $xfilter == 'late') 
                                    { 


                                               $query = "SELECT * FROM reports_admin WHERE `id_no`='".$xidno."' AND `Remarks`='".$xfilter."' AND `Date` BETWEEN '".$frdaterange. "' AND '".$todaterange."' ORDER BY `Date` DESC ";  
                                                $result = mysqli_query($connect, $query);
                                                $_SESSION['query']  = $query;
                                                $_SESSION['xfilter'] = $xfilter;
                                                   $_POST['xprocess'] = "submit";
                                     // echo "<script> alert('".$xidno." asd') </script>";
                                                                                                  $position = 'Admin';

                                                    $query1 = "SELECT * FROM user_account WHERE `id_no`='".$xidno."' AND acc_type = 'Admin' LIMIT 1"; 
                                                    $_SESSION['query']  = $query1;
                                                    $result1 = mysqli_query($connect, $query1);
                                                     if(mysqli_num_rows($result1) > 0)
                                                    { 
                                                       while($row1 = $result1->fetch_assoc()) {
                                                             $fma = $row1['firstname'];
                                                             $lma = $row1['lastname'];
                                                             $newname = $lma .' '. $fma;
                                                       }

                                                    }
                                    }
                                    else if ($xidno != '' && $frdaterange <= $todaterange &&  $xfilter == 'ontime') 
                                    { 



                                               $query = "SELECT * FROM reports_admin WHERE `id_no`='".$xidno."' AND `Remarks`='".$xfilter."' AND `Date` BETWEEN '".$frdaterange. "' AND '".$todaterange."' ORDER BY `Date` DESC ";  
                                               $_SESSION['query']  = $query;
                                               $_SESSION['xfilter'] = $xfilter;
                                                $result = mysqli_query($connect, $query);
                                                   $_POST['xprocess'] = "submit";

                                                    $position = 'Admin';

                                                    $query1 = "SELECT * FROM user_account WHERE `id_no`='".$xidno."' AND acc_type = 'Admin' LIMIT 1"; 
                                                    $_SESSION['query']  = $query1;
                                                    $result1 = mysqli_query($connect, $query1);
                                                     if(mysqli_num_rows($result1) > 0)
                                                    { 
                                                       while($row1 = $result1->fetch_assoc()) {
                                                             $fma = $row1['firstname'];
                                                             $lma = $row1['lastname'];
                                                             $newname = $lma .' '. $fma;
                                                       }

                                                    }

                                     // echo "<script> alert('".$xidno." asd') </script>";
                                    }
                                    else if ($xidno != '' && $frdaterange <= $todaterange &&  $xfilter == 'Absent') 
                                    { 

                                              get_absents();
                                               $query = "SELECT * FROM reports_admin WHERE `id_no`='".$xidno."' AND `Remarks`='".$xfilter."' AND `Date` BETWEEN '".$frdaterange. "' AND '".$todaterange."' ORDER BY `Date` DESC ";  
                                               $_SESSION['query']  = $query;
                                               $_SESSION['xfilter'] = $xfilter;
                                                $result = mysqli_query($connect, $query);
                                                   $_POST['xprocess'] = "submit";

                                                                                           $position = 'Admin';

                                                    $query1 = "SELECT * FROM user_account WHERE `id_no`='".$xidno."' AND acc_type = 'Admin' LIMIT 1"; 
                                                    $_SESSION['query']  = $query1;
                                                    $result1 = mysqli_query($connect, $query1);
                                                     if(mysqli_num_rows($result1) > 0)
                                                    { 
                                                       while($row1 = $result1->fetch_assoc()) {
                                                             $fma = $row1['firstname'];
                                                             $lma = $row1['lastname'];
                                                             $newname = $lma .' '. $fma;
                                                       }

                                                    }
                                     // echo "<script> alert('".$xidno." asd') </script>";
                                    }
                                     else if ($xidno == '' && $frdaterange <= $todaterange &&  $xfilter == 'Absent') 
                                    { 

                                              get_absents();
                                               $newname = "ALL";
                                               $xidno = "ALL";
                                                $position = "Admins";
                                               $query = "SELECT * FROM reports_admin WHERE `Remarks`='".$xfilter."' AND `Date` BETWEEN '".$frdaterange. "' AND '".$todaterange."' ORDER BY `Date` DESC ";  
                                               $_SESSION['query']  = $query;
                                               $_SESSION['xfilter'] = $xfilter;
                                                $result = mysqli_query($connect, $query);
                                                   $_POST['xprocess'] = "submit";

                                     // echo "<script> alert('".$xidno." asd') </script>";
                                    }



                         //             
                        }


                    ?>




                <div class="row">
                    <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-7"><h3> Report Generation </h3></div><div class="col-5"><div class="card-body" style="text-align: right;" ><span id="date_time"></span></div></div></div>
                    </div>


                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-bounding-box" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/>
                      <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                   CCIS | Internal Systems | GateKeeper
                    <br>
                    <hr class="style1">
                    <div class="row">
                        <div class="col-6">
                            NAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $newname?>
                        </div>
                        <div class="col-6">
                            DATE FR&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $frdaterange?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            ID NO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $xidno?>
                        </div>
                        <div class="col-6">
                            DATE TO&nbsp;:&nbsp;&nbsp;<?php echo $todaterange?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            POSITION&nbsp;:&nbsp;&nbsp;<?php echo $position?>
                        </div>
                        <div class="col-6">
                            
                        </div>
                    </div>

                    <hr class="style1">
                    <h6 style="text-align: center; letter-spacing: 1px"> P R O F I L E &nbsp;&nbsp;&nbsp; R E P O R T </h6>
                    <table class="table table-striped">
                    <thead>
                    <div class="page">
                      <tr>
                        <th>Id No</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Date</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                        <th>Duration</th>
                        <th>Remarks</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php
                        if(isset($_POST['xprocess']))
                        {
                        while($row = mysqli_fetch_array($result))  
                               {  
                               ?>  
                               <tr> 
                                    <td><?php echo $row["id_no"]; ?></td>  
                                    <td><?php echo $row["Firstname"]; ?></td> 
                                    <td><?php echo $row["Lastname"]; ?></td> 
                                    <td><?php echo $row["Date"]; ?></td> 
                                    <td><?php echo $row["TimeIn"]; ?></td> 
                                    <td><?php echo $row["TimeOut"]; ?></td> 
                                    <td><?php echo $row["Duration"]; ?></td> 
                                    <td><?php echo $row["Remarks"]; ?></td>  
                               </tr>  
                               <?php 
                               } 
                               }  
                               ?>
                             </tbody>
                    <?PHP
                     if(!isset($_POST['xprocess']))
                        {
                        ?>
                       <td>ND</td>
                       <td>ND</td>
                       <td>ND</td>
                       <td>ND</td>
                       <td>ND</td>
                       <td>ND</td>
                       <td>ND</td>
                       <td>ND</td>
                      </tr>
                    <?php
                     }
                       
                      ?>

                     </tbody>
                  </table>
                     <!-- CONTAINER X-->
                    <!-- ROW X-->
                    <div class="xfooter" style="margin-bottom: 0px;">
                    <hr class="style1">
                    <div class="row">
                        <div class="col-6">
                            <h6 style="font-size: 12px !important"> Copyright © CCIS College of Computing and Information Science 2020</h6>
                        </div>
                        <div class="col-6">
                           <h6 align="right" style="font-size: 12px !important"> Report generation requested by: <?php  echo $_SESSION["uname"]; ?></h6>
                        </div>
                    </div>
                     </div>
                    <!-- ROW X-->

                </div>

            </div>

        </div>

    </div>

                </div>
            </div>

        </div>

    </div>

    <script src="assets/vendor/chartsjs/Chart.min.js"></script>
    <script src="assets/js/dashboard-charts.js"></script>
    <script src="assets/vendor/jquery3/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap4/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/fontawesome5/js/solid.min.js"></script>
    <script src="assets/vendor/fontawesome5/js/fontawesome.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/initiate-datatables.js"></script>
    <script src="assets/vendor/DataTables/datatables.min.js"></script>
    <script type="text/javascript">window.onload = date_time('date_time');</script>


    <script src="assets/js/fullcalendar-script.js"></script>
        <script src="assets/vendor/airdatepicker/dist/js/datepicker.min.js"></script>
    <script src="assets/vendor/airdatepicker/dist/js/i18n/datepicker.en.js"></script>


    
    <script>
        function getInputValue(){
            // Selecting the input element and get its value 
            var inputVal = document.getElementById("daterange").value;
            
            // Displaying the value
            alert(inputVal);
        }

    </script>

</body>
</html>


<?php

if(isset($_POST['PRINT'])) {
echo'
<script>
  window.open("print_report_admins_TESTING.php");
</script>';
}
else
{

}


    include 'lastupdate.php';
?>