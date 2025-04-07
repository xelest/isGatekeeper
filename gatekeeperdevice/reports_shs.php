
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
    $name = "NO DATA";
    $id_no = "NO DATA";
    $position = "NO DATA";

    $from_date = "NO DATA";
    $to_date = "NO DATA";

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
                            <div class="col-7"><h3>SHS REPORTS (STUDENT)</h3></div>

                            <div class="col-5"><div class="card-body" style="text-align: right;" ><span id="date_time"></span></div></div>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-5 col-md-5">
                                <div class="row style="align-items: center;">
                                    <div class="col-3" style="padding: 3px;">
                                    <form method="post" action="">
                                        <input type="text" class="form-control datepicker-here" data-range="false"   id="frdaterange" name="frdaterange" data-language="en" data-position="bottom left" aria-describedby="daterange" placeholder="Date Start" required>
                                    </div>

                                    <div class="col-3" style="padding: 3px;">

                                        <input type="text" class="form-control datepicker-here" data-range="false"   id="todaterange" name="todaterange" data-language="en" data-position="bottom left" aria-describedby="daterange" placeholder="Date End" required>
                                    </div>

                                   
                                    <div class="col-3" style="padding: 3px;">
                                        <input type="submit" name="query" value="generate" class="btn btn-primary" />
                                    </div>

                                    <form>
                            </div>
                    </div>
                    <div class="col-2 col-md-2"></div>
                     <div class="col-5 col-md-5">
                        <div class="row" >
                          

                            <div class="col-3" style="padding: 3px;">
                            </div>

                        </div>
                         </div> 
                </div>
                <?php
                $connect = mysqli_connect("localhost", "root", "", "mclccisn_gatekeeper");

                         //$query = "SELECT * FROM attnmessage";  
                        // $result = mysqli_query($connect, $query);  


                        if(isset($_POST['query']))
                        {             
                                      //$frdaterange = str_replace('/', '-',  $_POST['frdaterange']);
                                      $frdaterange = date('Y-m-d',strtotime($_POST['frdaterange']));
                                      $todaterange = date('Y-m-d',strtotime($_POST['todaterange']));
                                      //$todaterange = str_replace('/', '-',  $_POST['todaterange']);
                                      //$ntodaterange = date('Y-m-d',strtotime($todaterange));
                                      //echo $frdaterange .' to '. $todaterange;
                                    if($frdaterange > $todaterange)
                                    {
                                        echo "<script>alert('invalid date range FROM is greater than TO')</script>;";
                                    }
                                    else //VALID DATE RANGE
                                    {
                                        $from_date = $frdaterange;
                                        $to_date = $todaterange;
                                        include_once('connection.php');

                                                 $msql = "SELECT user_information.user_dept, COUNT(*) as number FROM user_information, tapin_logs 
                                                  WHERE user_information.id_no = tapin_logs.id_no AND user_information.user_position = 'S' 
                                                  AND( user_information.user_dept = 'STEM'
                                                  OR user_information.user_dept ='ABM'
                                                  OR user_information.user_dept ='HUMSS'
                                                  OR user_information.user_dept='PBM'
                                                  OR user_information.user_dept='SHS')
                                                  AND date(inDate) >= '$frdaterange' AND date(inDate) <='$todaterange'
                                                  GROUP BY user_information.user_dept";
                                                  $result1 = mysqli_query($con, $msql);
                                                  //echo var_dump($result1);
                                                  $msqlo = "SELECT user_information.user_dept, COUNT(*) as number FROM user_information, tapout_logs 
                                                  WHERE user_information.id_no = tapout_logs.id_no AND user_information.user_position = 'S' 
                                                  AND( user_information.user_dept = 'STEM'
                                                  OR user_information.user_dept ='ABM'
                                                  OR user_information.user_dept ='HUMSS'
                                                  OR user_information.user_dept='PBM'
                                                  OR user_information.user_dept='SHS')
                                                  AND date(outDate)>='$frdaterange' AND date(outDate) <= '$todaterange'
                                                  GROUP BY user_information.user_dept";
                                                  $result1o = mysqli_query($con, $msqlo);


                                    }

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
                            DATE FR&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $from_date?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            DATE TO&nbsp;:&nbsp;&nbsp;<?php echo $to_date?>
                        </div>
                    </div>
                    

                    <hr class="style1">
                    <h6 style="text-align: center; letter-spacing: 1px"> &nbsp;&nbsp;&nbsp; R E P O R T </h6>
                    <table class="table table-striped">
                    <thead>
                    <div class="page">
                      <tr>
                        <th>Department</th>
                        <th>Tap In</th>
                        <th>Tap Out</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php
                          if(isset($_POST['query']))
                        { 
                        while(($row1 = mysqli_fetch_assoc($result1)) && ($row2 = mysqli_fetch_assoc($result1o)))  
                               {  

                               ?>  
                               <tr>  
                                    <td><?php echo $row1["user_dept"]; ?></td> 
                                    <td><?php echo $row1["number"]; ?></td> 
                                    <td><?php echo $row2["number"]; ?></td> 
                                    
                               </tr>  
                               <?php 
                               } 
                                }
                               ?>
                             </tbody>
                    <?PHP
                     if(!isset($_POST['query']))
                        {
                        ?>
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

function get_duration($stime,$etime)
{

    $xstime = $stime;
    $xetime = $etime;

    $xtime1 = new DateTime($xstime);
    $xtime2 = new DateTime($xetime);

    $dg = $xtime1->diff($xtime2);
    $dg = $dg->format('%d days');

    echo "<script>alert(".$dg.")</script>;";
}

function get_whofirstname($who){

require 'connection.php';

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

require 'connection.php';

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



?>