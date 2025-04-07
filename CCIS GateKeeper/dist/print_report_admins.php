
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
                        
                    </div>
                    
                <?php
                $connect = mysqli_connect("localhost", "root", "", "mclccisn_gatekeeper");

                         //$query = "SELECT * FROM attnmessage";  
                        // $result = mysqli_query($connect, $query);  


                        if(isset($_SESSION["id"]))
                        {
                                      $frdaterange = $_SESSION['frd'];
                                      $todaterange = $_SESSION['tod'];
                                      $xidno = $_SESSION['id'];
                                      $xfilter = $_SESSION['xfilter'];

                                      $str1 = "00:00:00";
                                      $str2 = "23:59:00";

                                      $newfrdate = $frdaterange . ' ' . $str1;
                                      $newtodate = $todaterange . ' ' . $str2;

                                    if($frdaterange > $todaterange)
                                    {
                                        echo "<script>alert('invalid date range FROM is greater than TO')</script>;";
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

                                               $newname = "ALL";
                                                $xidno = "ALL";
                                                $position = "Admins";
                                               $query = "SELECT * FROM reports_admin WHERE `Date` BETWEEN '".$frdaterange. "' AND '".$todaterange."' ORDER BY `Date` DESC ";  
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
                                                $result = mysqli_query($connect, $query);
                                                   $_POST['xprocess'] = "submit";
                                     // echo "<script> alert('".$xidno." asd') </script>";
                                    }
                                     else if ($xidno != '' && $frdaterange <= $todaterange &&  $xfilter == 'All') 
                                    { 


                                               $query = "SELECT * FROM reports_admin WHERE `id_no`='".$xidno."' AND `Date` BETWEEN '".$frdaterange. "' AND '".$todaterange."' ORDER BY `Date` DESC ";  
                                                $result = mysqli_query($connect, $query);
                                                   $_POST['xprocess'] = "submit";
                                     // echo "<script> alert('".$xidno." asd') </script>";
                                    }
                                    else if ($xidno != '' && $frdaterange <= $todaterange &&  $xfilter == 'late') 
                                    { 


                                               $query = "SELECT * FROM reports_admin WHERE `id_no`='".$xidno."' AND `Remarks`='".$xfilter."' AND `Date` BETWEEN '".$frdaterange. "' AND '".$todaterange."' ORDER BY `Date` DESC ";  
                                                $result = mysqli_query($connect, $query);
                                                   $_POST['xprocess'] = "submit";
                                     // echo "<script> alert('".$xidno." asd') </script>";
                                    }
                                    else if ($xidno != '' && $frdaterange <= $todaterange &&  $xfilter == 'ontime') 
                                    { 



                                               $query = "SELECT * FROM reports_admin WHERE `id_no`='".$xidno."' AND `Remarks`='".$xfilter."' AND `Date` BETWEEN '".$frdaterange. "' AND '".$todaterange."' ORDER BY `Date` DESC ";  
                                                $result = mysqli_query($connect, $query);
                                                   $_POST['xprocess'] = "submit";
                                     // echo "<script> alert('".$xidno." asd') </script>";
                                    }


                        }
                        else
                        {
                          echo "<script>window.close();</script>";
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
                            <h6 style="font-size: 14px !important"> Copyright © CCIS College of Computing and Information Science 2020</h6>
                        </div>
                        <div class="col-6">
                           <h6 align="right" style="font-size: 14px !important"> Report generation requested by: Admin</h6>
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

        window.onload = function() { window.print(); }
    </script>

</body>
</html>


<?php



?>