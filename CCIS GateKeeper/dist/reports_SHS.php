    <?php 
include_once('connection.php');
$qtapin = "SELECT user_information.user_dept , tapin_logs.id_no, COUNT(*) AS number
                            FROM user_information,tapin_logs 

                            WHERE user_information.user_position = 'S' 

                            AND user_information.id_no = tapin_logs.id_no 
                                
                            GROUP BY user_dept";
$rIn = mysqli_query($con, $qtapin);
$qtapout = "SELECT user_information.user_dept , tapout_logs.id_no, COUNT(*) AS number
                            FROM user_information,tapout_logs 

                            WHERE user_information.user_position = 'S' 

                            AND user_information.id_no = tapout_logs.id_no 
                                
                            GROUP BY user_dept";
$rOut = mysqli_query($con, $qtapout);


$qtapinF = "SELECT user_information.user_dept , tapin_logs.id_no, COUNT(*) AS number
                            FROM user_information,tapin_logs 

                            WHERE user_information.user_position = 'F' 

                            AND user_information.id_no = tapin_logs.id_no 
                                
                            GROUP BY user_dept";
$rInF = mysqli_query($con, $qtapinF);
$qtapoutF = "SELECT user_information.user_dept , tapout_logs.id_no, COUNT(*) AS number
                            FROM user_information,tapout_logs 

                            WHERE user_information.user_position = 'F' 

                            AND user_information.id_no = tapout_logs.id_no 
                                
                            GROUP BY user_dept";
$rOutF = mysqli_query($con, $qtapoutF);
?>
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


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        h2{
            text-align: center;
        }
    .table{
          background-color: white;
          font-family: 'Rubik', sans-serif;
          overflow-x:auto;
      }

      #table tr.header, #table tr:hover{
          background-color: gray;
         
      }

     .tab-content{
        position: relative;
        margin: 20px;
        padding: 20px;
      }
     .flex-containerin, .flex-containerout,.flex-container {
          /*display: flex;*/
    }
    .flex-containerin > div, .flex-containerout > div, .flex-container > div{
      margin: 20px;
      padding: 20px;
      font-size: 20px;
      width: 50%;
    }

    </style>

    
  <script src="js/script_date_time.js"></script>
  <script>
$(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#reptab a[href="' + activeTab + '"]').tab('show');
    }
});

</script>
</head>

<body>
    <div class="wrapper">
        <div id="body" class="active">
            <div class="content">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-7"><h3>Reports </h3></div>

                            <div class="col-5"><div class="card-body" style="text-align: right;" ><span id="date_time">asd</span></div></div>
                        </div>
                    </div>
                <!--========================================================================= -->
<div class="main-content" style="background-color: rgba(255, 255, 255, 0.6);">

 <ul class="nav nav-tabs " id="reptab">
    <li class="nav-items">
        <li class="active"><a data-toggle="tab" href="#overview">OVERVIEW</a></li>
    </li>
    <li ><a data-toggle="tab" href="#student">STUDENT</a></li>
    <li><a data-toggle="tab" href="#faculty">FACULTY</a></li>
  </ul>


<div class="tab-content" >
   
    <div id="overview" class="tab-pane fade in active">
        <?php
            echo "<h2>" ."Tapout Overview ". "as of " . date("d/m/Y") . " " ."<br>";
            date_default_timezone_set("Asia/Manila");
            echo " " . date("h:i:s a") ."</h2>";
        ?>
        <div class="table-responsive">

            <div >
                <h3 style="text-align: center;">College Students Tap Out Offense Overview</h3>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>     
                            <th>Department</th>  
                            <th>ID Number</th>
                            <th>Tap In</th>
                            <th>Tap Out</th>
                            <th>Total Offense</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include_once('connection.php');
                            
                            $in = "SELECT user_information.user_dept, tapin_logs.id_no, COUNT(*) AS numin , tapin_logs.inDate AS inDate, tapin_logs.id_no AS IDin
                            FROM user_information,tapin_logs 

                            WHERE user_information.user_position = 'S' 

                            AND user_information.id_no = tapin_logs.id_no 

                            AND( user_information.user_dept = 'CCIS'
                                OR user_information.user_dept ='CAS'
                                OR user_information.user_dept ='ETYCB'
                                OR user_information.user_dept='IEXCELL'
                                OR user_information.user_dept='CMET'
                                OR user_information.user_dept='MITL')
                                
                            GROUP BY id_no ORDER BY id_no DESC";
                            $out = "SELECT user_information.user_dept, tapout_logs.id_no, COUNT(*) AS numout , tapout_logs.outDate AS outDate, tapout_logs.id_no AS IDout
                            FROM user_information,tapout_logs 

                            WHERE user_information.user_position = 'S' 

                            AND user_information.id_no = tapout_logs.id_no 

                            AND( user_information.user_dept = 'CCIS'
                                OR user_information.user_dept ='CAS'
                                OR user_information.user_dept ='ETYCB'
                                OR user_information.user_dept='IEXCELL'
                                OR user_information.user_dept='CMET'
                                OR user_information.user_dept='MITL')
                                
                            GROUP BY id_no ORDER BY id_no DESC";
                            
                            $res =  mysqli_query($con, $in);
                            $res1 =  mysqli_query($con, $out);
                        
                            while ( ($row = mysqli_fetch_assoc($res)) && ( $row2 = mysqli_fetch_array($res1)) ) {
                              echo "<tr>";          
                                    $trimin = explode(" ", $row['inDate']);
                                    $trimout = explode(" ", $row2['outDate']);
                                  
                                    echo "<td>" .$row['user_dept']."</td>";
                                    echo "<td>" .$row['id_no']."</td>";
                                    echo "<td>" .$row['numin']."</td>";
                                    echo "<td>" .$row2['numout']."</td>";
                                    echo "<td>" .$total = $row['numin'] - $row2['numout']."</td>";      
                                    echo "</tr>"; 

                            }
                            
                        ?>      
                      </tbody>
                </table>
            </div>

            <div>
                <h3 style="text-align: center;">SHS Students Tap Out Offense Overview</h3>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>     
                            <th>Department</th>  
                            <th>ID Number</th>
                            <th>Tap In</th>
                            <th>Tap Out</th>
                            <th>Total Offense</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include_once('connection.php');
                            
                            $in = "SELECT user_information.user_dept, tapin_logs.id_no, COUNT(*) AS numin , tapin_logs.inDate AS inDate, tapin_logs.id_no AS IDin
                            FROM user_information,tapin_logs 

                            WHERE user_information.user_position = 'S' 

                            AND user_information.id_no = tapin_logs.id_no 

                            AND(user_information.user_dept = 'STEM'
                            OR user_information.user_dept ='ABM'
                            OR user_information.user_dept ='HUMSS'
                            OR user_information.user_dept='PBM')
                                
                            GROUP BY id_no ORDER BY id_no DESC";
                            $out = "SELECT user_information.user_dept, tapout_logs.id_no, COUNT(*) AS numout , tapout_logs.outDate AS outDate, tapout_logs.id_no AS IDout
                            FROM user_information,tapout_logs 

                            WHERE user_information.user_position = 'S' 

                            AND user_information.id_no = tapout_logs.id_no 

                            AND(user_information.user_dept = 'STEM'
                            OR user_information.user_dept ='ABM'
                            OR user_information.user_dept ='HUMSS'
                            OR user_information.user_dept='PBM')
                                
                            GROUP BY id_no ORDER BY id_no DESC";
                            
                            $res =  mysqli_query($con, $in);
                            $res1 =  mysqli_query($con, $out);
                        
                            while ( ($row = mysqli_fetch_assoc($res)) && ( $row2 = mysqli_fetch_array($res1)) ) {
                              echo "<tr>";          
                                    $trimin = explode(" ", $row['inDate']);
                                    $trimout = explode(" ", $row2['outDate']);
                                  
                                    echo "<td>" .$row['user_dept']."</td>";
                                    echo "<td>" .$row['id_no']."</td>";
                                    echo "<td>" .$row['numin']."</td>";
                                    echo "<td>" .$row2['numout']."</td>";
                                    echo "<td>" .$total = $row['numin'] - $row2['numout']."</td>";      
                                    echo "</tr>"; 

                            }
                            
                        ?>      
                      </tbody>
                </table>
            </div>
            
        </div>

        <div class="table-responsive">
            <div>
                <h3 style="text-align: center;">College Faculty Tap Out Offense Overview</h3>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>     
                            <th>Department</th>  
                            <th>ID Number</th>
                            <th>Tap In</th>
                            <th>Tap Out</th>
                            <th>Total Offense</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include_once('connection.php');
                            
                            $in = "SELECT user_information.user_dept, tapin_logs.id_no, COUNT(*) AS numin , tapin_logs.inDate AS inDate, tapin_logs.id_no AS IDin
                            FROM user_information,tapin_logs 

                            WHERE user_information.user_position = 'F' 

                            AND user_information.id_no = tapin_logs.id_no 

                            AND( user_information.user_dept = 'CCIS'
                                OR user_information.user_dept ='CAS'
                                OR user_information.user_dept ='ETYCB'
                                OR user_information.user_dept='IEXCELL'
                                OR user_information.user_dept='CMET'
                                OR user_information.user_dept='MITL')
                                
                            GROUP BY id_no ORDER BY id_no DESC";
                            $out = "SELECT user_information.user_dept, tapout_logs.id_no, COUNT(*) AS numout , tapout_logs.outDate AS outDate, tapout_logs.id_no AS IDout
                            FROM user_information,tapout_logs 

                            WHERE user_information.user_position = 'F' 

                            AND user_information.id_no = tapout_logs.id_no 

                            AND( user_information.user_dept = 'CCIS'
                                OR user_information.user_dept ='CAS'
                                OR user_information.user_dept ='ETYCB'
                                OR user_information.user_dept='IEXCELL'
                                OR user_information.user_dept='CMET'
                                OR user_information.user_dept='MITL')
                                
                            GROUP BY id_no ORDER BY id_no DESC";
                            
                            $res =  mysqli_query($con, $in);
                            $res1 =  mysqli_query($con, $out);
                        
                            while ( ($row = mysqli_fetch_assoc($res)) && ( $row2 = mysqli_fetch_array($res1)) ) {
                              echo "<tr>";          
                                    $trimin = explode(" ", $row['inDate']);
                                    $trimout = explode(" ", $row2['outDate']);
                                  
                                    echo "<td>" .$row['user_dept']."</td>";
                                    echo "<td>" .$row['id_no']."</td>";
                                    echo "<td>" .$row['numin']."</td>";
                                    echo "<td>" .$row2['numout']."</td>";
                                    echo "<td>" .$total = $row['numin'] - $row2['numout']."</td>";      
                                    echo "</tr>"; 

                            }
                            
                        ?>      
                      </tbody>
                </table>
            </div>
            <div>
                <h3 style="text-align: center;">SHS Faculty Tap Out Offense Overview</h3>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>     
                            <th>Department</th>  
                            <th>ID Number</th>
                            <th>Tap In</th>
                            <th>Tap Out</th>
                            <th>Total Offense</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include_once('connection.php');
                            
                            $in = "SELECT user_information.user_dept, tapin_logs.id_no, COUNT(*) AS numin , tapin_logs.inDate AS inDate, tapin_logs.id_no AS IDin
                            FROM user_information,tapin_logs 

                            WHERE user_information.user_position = 'F' 

                            AND user_information.id_no = tapin_logs.id_no 

                            AND(user_information.user_dept = 'STEM'
                            OR user_information.user_dept ='ABM'
                            OR user_information.user_dept ='HUMSS'
                            OR user_information.user_dept='PBM'
                             OR user_information.user_dept='SHS')
                                
                            GROUP BY id_no ORDER BY id_no DESC";
                            $out = "SELECT user_information.user_dept, tapout_logs.id_no, COUNT(*) AS numout , tapout_logs.outDate AS outDate, tapout_logs.id_no AS IDout
                            FROM user_information,tapout_logs 

                            WHERE user_information.user_position = 'F' 

                            AND user_information.id_no = tapout_logs.id_no 

                            AND(user_information.user_dept = 'STEM'
                            OR user_information.user_dept ='ABM'
                            OR user_information.user_dept ='HUMSS'
                            OR user_information.user_dept='PBM'
                            OR user_information.user_dept='SHS')
                                
                            GROUP BY id_no ORDER BY id_no DESC";
                            
                            $res =  mysqli_query($con, $in);
                            $res1 =  mysqli_query($con, $out);
                        
                            while ( ($row = mysqli_fetch_assoc($res)) && ( $row2 = mysqli_fetch_array($res1)) ) {
                              echo "<tr>";          
                                    $trimin = explode(" ", $row['inDate']);
                                    $trimout = explode(" ", $row2['outDate']);
                                  
                                    echo "<td>" .$row['user_dept']."</td>";
                                    echo "<td>" .$row['id_no']."</td>";
                                    echo "<td>" .$row['numin']."</td>";
                                    echo "<td>" .$row2['numout']."</td>";
                                    echo "<td>" .$total = $row['numin'] - $row2['numout']."</td>";      
                                    echo "</tr>"; 

                            }
                            
                        ?>      
                      </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="student" class="tab-pane fade" >
        <?php
            echo "<h2>" ."Student Report ". "as of " . date("d/m/Y") . " " ."<br>";
            date_default_timezone_set("Asia/Manila");
            echo " " . date("h:i:s a") ."</h2>";
        ?>
               
            <div class="table-responsive">

                <div>
                    <h3 style="text-align: center;">College</h3>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>     
                                <th>Department</th>  
                                <th>Tap In</th>
                                <th>Tap Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include_once('connection.php');
                                $msql = "SELECT user_information.user_dept, COUNT(*) as number FROM user_information, tapin_logs 
                                WHERE user_information.id_no = tapin_logs.id_no AND user_information.user_position = 'S' 
                                AND( user_information.user_dept = 'CCIS'
                                OR user_information.user_dept ='CAS'
                                OR user_information.user_dept ='ETYCB'
                                OR user_information.user_dept='IEXCELL'
                                OR user_information.user_dept='CMET'
                                OR user_information.user_dept='MITL')
                                GROUP BY user_information.user_dept";
                                $result1 = mysqli_query($con, $msql);
                                $msqlo = "SELECT user_information.user_dept, COUNT(*) as number FROM user_information, tapout_logs 
                                WHERE user_information.id_no = tapout_logs.id_no AND user_information.user_position = 'S' 
                                AND( user_information.user_dept = 'CCIS'
                                OR user_information.user_dept ='CAS'
                                OR user_information.user_dept ='ETYCB'
                                OR user_information.user_dept='IEXCELL'
                                OR user_information.user_dept='CMET'
                                OR user_information.user_dept='MITL')
                                GROUP BY user_information.user_dept";
                                $out = mysqli_query($con,$msqlo);
                               
                                while (($row1 = mysqli_fetch_assoc($result1)) && ($row2 = mysqli_fetch_assoc($out))) {
                                  echo "<tr>";
                                        echo "<td>" .$row1['user_dept']."</td>";
                                        echo "<td>" .$row1['number']."</td>";
                                        echo "<td>" .$row2['number']."</td>";
                                  echo "</tr>";

                                }

                              
                               
                            ?>      
                          </tbody>
                    </table>
                </div>
                <div>
                    <h3 style="text-align: center;">SHS </h3>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>     
                                <th>Department</th>  
                                <th>Tap In</th>
                                <th>Tap Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include_once('connection.php');
                                $msql = "SELECT user_information.user_dept, COUNT(*) as number FROM user_information, tapin_logs 
                                WHERE user_information.id_no = tapin_logs.id_no AND user_information.user_position = 'S' 
                                AND( user_information.user_dept = 'STEM'
                                OR user_information.user_dept ='ABM'
                                OR user_information.user_dept ='HUMSS'
                                OR user_information.user_dept='PBM'
                                OR user_information.user_dept='SHS')
                                GROUP BY user_information.user_dept";
                                $result1 = mysqli_query($con, $msql);
                                $msqlo = "SELECT user_information.user_dept, COUNT(*) as number FROM user_information, tapout_logs 
                                WHERE user_information.id_no = tapout_logs.id_no AND user_information.user_position = 'S' 
                                AND( user_information.user_dept = 'STEM'
                                OR user_information.user_dept ='ABM'
                                OR user_information.user_dept ='HUMSS'
                                OR user_information.user_dept='PBM'
                                OR user_information.user_dept='SHS')
                                GROUP BY user_information.user_dept";
                                $result1o = mysqli_query($con, $msqlo);
                                while (($row1 = mysqli_fetch_assoc($result1)) && ($row2 = mysqli_fetch_assoc($result1o))) {
                                  echo "<tr>";
                                        echo "<td>" .$row1['user_dept']."</td>";
                                        echo "<td>" .$row1['number']."</td>";
                                        echo "<td>" .$row2['number']."</td>";
                                  echo "</tr>";
                                }
                            ?>      
                          </tbody>
                    </table>
                </div>
            </div>

    </div>

    <!-- FACULTY-->
    <div id="faculty" class="tab-pane fade" >
        <?php
            echo "<h2>" ."Faculty Report ". "as of " . date("d/m/Y") . " " ."<br>";
            date_default_timezone_set("Asia/Manila");
            echo " " . date("h:i:s a") ."</h2>";
        ?>
        <div class="table-responsive">
                <div>
                    <h3 style="text-align: center;">College</h3>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>     
                                <th>Department</th>  
                                <th>Tap In</th>
                                <th>Tap Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include_once('connection.php');
                                $msql = "SELECT user_information.user_dept, COUNT(*) as number FROM user_information, tapin_logs 
                                WHERE user_information.id_no = tapin_logs.id_no AND user_information.user_position = 'F' 
                                AND( user_information.user_dept = 'CCIS'
                                OR user_information.user_dept ='CAS'
                                OR user_information.user_dept ='ETYCB'
                                OR user_information.user_dept='IEXCELL'
                                OR user_information.user_dept='CMET'
                                OR user_information.user_dept='MITL')
                                GROUP BY user_information.user_dept";
                                $result1 = mysqli_query($con, $msql);
                                $msqlo = "SELECT user_information.user_dept, COUNT(*) as number FROM user_information, tapout_logs 
                                WHERE user_information.id_no = tapout_logs.id_no AND user_information.user_position = 'F' 
                                AND( user_information.user_dept = 'CCIS'
                                OR user_information.user_dept ='CAS'
                                OR user_information.user_dept ='ETYCB'
                                OR user_information.user_dept='IEXCELL'
                                OR user_information.user_dept='CMET'
                                OR user_information.user_dept='MITL')
                                GROUP BY user_information.user_dept";
                                $out = mysqli_query($con,$msqlo);
                               
                                while (($row1 = mysqli_fetch_assoc($result1)) && ($row2 = mysqli_fetch_assoc($out))) {
                                  echo "<tr>";
                                        echo "<td>" .$row1['user_dept']."</td>";
                                        echo "<td>" .$row1['number']."</td>";
                                        echo "<td>" .$row2['number']."</td>";
                                  echo "</tr>";

                                }

                              
                               
                            ?>      
                          </tbody>
                    </table>
                </div>
                <div>
                    <h3 style="text-align: center;">SHS</h3>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>     
                                <th>Department</th>  
                                <th>Tap In</th>
                                <th>Tap Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include_once('connection.php');
                                $msql = "SELECT user_information.user_dept, COUNT(*) as number FROM user_information, tapin_logs 
                                WHERE user_information.id_no = tapin_logs.id_no AND user_information.user_position = 'F' 
                                AND( user_information.user_dept = 'STEM'
                                OR user_information.user_dept ='ABM'
                                OR user_information.user_dept ='HUMSS'
                                OR user_information.user_dept='PBM'
                                OR user_information.user_dept='SHS')
                                GROUP BY user_information.user_dept";
                                $result1 = mysqli_query($con, $msql);
                                $msqlo = "SELECT user_information.user_dept, COUNT(*) as number FROM user_information, tapout_logs 
                                WHERE user_information.id_no = tapout_logs.id_no AND user_information.user_position = 'F' 
                                AND( user_information.user_dept = 'STEM'
                                OR user_information.user_dept ='ABM'
                                OR user_information.user_dept ='HUMSS'
                                OR user_information.user_dept='PBM'
                                OR user_information.user_dept='SHS')
                                GROUP BY user_information.user_dept";
                                $result1o = mysqli_query($con, $msqlo);
                                while (($row1 = mysqli_fetch_assoc($result1)) && ($row2 = mysqli_fetch_assoc($result1o))) {
                                  echo "<tr>";
                                        echo "<td>" .$row1['user_dept']."</td>";
                                        echo "<td>" .$row1['number']."</td>";
                                        echo "<td>" .$row2['number']."</td>";
                                  echo "</tr>";
                                }
                            ?>      
                          </tbody>
                    </table>
                </div>
            </div>
        
        </div>
</div>
                <!--========================================================================= -->   
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
        
        $('#myTextbox').on('input', function() {
            var x = document.getElementById("myTextbox").value; 
            alert(x);
        });

        $('#myTextbox2').on('input', function() {
            var y = document.getElementById("myTextbox2").value;
        });

         
        function test()
        {
             var y = document.getElementById("myTextbox2").value; 
             alert(y);
        }

    </script>

</body>

</html>