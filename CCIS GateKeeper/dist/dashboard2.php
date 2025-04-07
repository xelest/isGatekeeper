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
    
  <script src="js/script_date_time.js"></script>
  <!-- <script src="assets/js/dashboard-charts.js"></script> -->
  <style> 
    th, td, tr {
        padding: 3px !important;
        margin: 3px !important;
        font-size: medium;
    }

    table{
        margin-top: -10px;
    }
  </style>
</head>

<body>
    <div class="wrapper">
        <div id="body" class="active">
            <div class="content">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-4"><h3>Dashboard </h3></div>

                            <div class="col-8"><div class="card-body" style="text-align: right;" ><span id="date_time"></span></div></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-12">
                        <div class="card">
                                <div class="card-header">Live Population</div>
                                <div class="card-body">
                                            <h5 id="livepop" style="padding: 0px;" align="center"></h5>
                                </div>
                            </div></div>

                         <div class="col-lg-2 col-md-2 col-sm-12">
                        <div class="card">
                                <div class="card-header">Tap-Ins</div>
                                <div class="card-body">
                                            <h5 id="tapinz" style="padding: 0px" align="center"></h5>
                                </div>
                            </div></div>


                        <div class="col-lg-2 col-md-2 col-sm-12">
                        <div class="card">
                                <div class="card-header">Tap-Outs</div>
                                <div class="card-body">
                                            <h5 id="tapoutz" style="padding: 0px" align="center"></h5>
                                </div>
                            </div></div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <div class="card id="chartright">
                                <div class="content">
                                    <div class="head">
                                        <h4 class="mb-0">Tap Out Traffic</h4>
                                        <p class="text-muted">Tap Out Frequency</p>
                                    </div>
                                    <div class="canvas-wrapper"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                        <canvas class="chart chartjs-render-monitor" id="trafficflow" style="display: block; width: 882px; height: 441px;" width="882" height="441"></canvas>
                                    </div>
                                    <div class="ui hidden divider"></div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">Tap-Outs</div>
                                <div class="card-body">
                                    <form class="needs-validation" novalidate="" accept-charset="utf-8">
                                        <div class="form-row">
                                            <table class="table table-striped" id='Tap-Outs'>
                                              
                                            </table>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card" id="chartright">
                                <div class="content">
                                    <div class="head">
                                        <h4 class="mb-0">Tap In Traffic</h4>
                                        <p class="text-muted">Today's Tap In Frequency</p>
                                    </div>
                                    <div class="canvas-wrapper"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                        <canvas class="chart chartjs-render-monitor" id="sales" style="display: block; width: 882px; height: 441px;" width="882" height="441"></canvas>
                                    </div>
                                    <div class="ui hidden divider"></div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">Tap-Ins</div>
                                <div class="card-body">
                                    <form class="needs-validation" novalidate="" accept-charset="utf-8">
                                        <div class="form-row">
                                            <table class="table table-striped" id='Tap-Ins'>
                                              
                                            </table>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">

                             <div class="card">
                                <div class="card-header p-2">Emergency Fire</div>
                                <div class="card-body p-2">
                                            <button type="button" class="btn mcl-red btn-sm btn-block">ACTIVE</button>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header  p-2">Emergency Earthquake</div>
                                <div class="card-body p-2">
                                            <button type="button" class="btn btn-sm mcl-yellow btn-block">ON-DRILLS</button>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header  p-2">Emergency Typhoon</div>
                                <div class="card-body p-2">
                                            <button type="button" class="btn btn-sm mcl-green btn-block">ACTIVATE</button>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header  p-2">Emergency Hi-jack</div>
                                <div class="card-body p-2">
                                            <button type="button" class="btn btn-primary btn-sm btn-block">IN-PROGRESS</button>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header  p-2">Emergency Hi-jack</div>
                                <div class="card-body p-2">
                                            <button type="button" class="btn btn-primary btn-sm btn-block">IN-PROGRESS</button>
                                </div>
                            </div>
                        </div>
                    </div>
                

                
            </div>

        </div>

    </div>


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
AND HOUR(`outDate`) >= HOUR('07:00:00')
AND HOUR(`outDate`) <= HOUR('07:59:00')";


    if ($result = mysqli_query($con, $myqryS)) {
     while ($row = mysqli_fetch_row($result)) {
        $cnt[0] = $row[0];
      }
    }
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`outDate`) as `gg`
FROM tapout_logs WHERE DATE(`outDate`) = DATE(CURDATE()) 
AND HOUR(`outDate`) >= HOUR('08:00:00')
AND HOUR(`outDate`) <= HOUR('08:59:00')";


    if ($result = mysqli_query($con, $myqryS)) {
     while ($row = mysqli_fetch_row($result)) {
        $cnt[1] = $row[0];
      }
    }
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`outDate`) as `gg`
FROM tapout_logs WHERE DATE(`outDate`) = DATE(CURDATE()) 
AND HOUR(`outDate`) >= HOUR('09:00:00')
AND HOUR(`outDate`) <= HOUR('09:59:00')";


    if ($result = mysqli_query($con, $myqryS)) {
     while ($row = mysqli_fetch_row($result)) {
        $cnt[2] = $row[0];
      }
    }
//echo $cnt; echo "<br>";echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`outDate`) as `gg`
FROM tapout_logs WHERE DATE(`outDate`) = DATE(CURDATE()) 
AND HOUR(`outDate`) >= HOUR('10:00:00')
AND HOUR(`outDate`) <= HOUR('10:59:00')";


    if ($result = mysqli_query($con, $myqryS)) {
     while ($row = mysqli_fetch_row($result)) {
        $cnt[3] = $row[0];
      }
    }
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`outDate`) as `gg`
FROM tapout_logs WHERE DATE(`outDate`) = DATE(CURDATE()) 
AND HOUR(`outDate`) >= HOUR('11:00:00')
AND HOUR(`outDate`) <= HOUR('11:59:00')";


    if ($result = mysqli_query($con, $myqryS)) {
     while ($row = mysqli_fetch_row($result)) {
        $cnt[4] = $row[0];
      }
    }
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`outDate`) as `gg`
FROM tapout_logs WHERE DATE(`outDate`) = DATE(CURDATE()) 
AND HOUR(`outDate`) >= HOUR('12:00:00')
AND HOUR(`outDate`) <= HOUR('12:59:00')";


    if ($result = mysqli_query($con, $myqryS)) {
     while ($row = mysqli_fetch_row($result)) {
        $cnt[5] = $row[0];
      }
    }
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`outDate`) as `gg`
FROM tapout_logs WHERE DATE(`outDate`) = DATE(CURDATE()) 
AND HOUR(`outDate`) >= HOUR('13:00:00')
AND HOUR(`outDate`) <= HOUR('13:59:00')";


    if ($result = mysqli_query($con, $myqryS)) {
     while ($row = mysqli_fetch_row($result)) {
        $cnt[6] = $row[0];
      }
    }
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`outDate`) as `gg`
FROM tapout_logs WHERE DATE(`outDate`) = DATE(CURDATE()) 
AND HOUR(`outDate`) >= HOUR('14:00:00')
AND HOUR(`outDate`) <= HOUR('14:59:00')";


    if ($result = mysqli_query($con, $myqryS)) {
     while ($row = mysqli_fetch_row($result)) {
        $cnt[7] = $row[0];
      }
    }
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`outDate`) as `gg`
FROM tapout_logs WHERE DATE(`outDate`) = DATE(CURDATE()) 
AND HOUR(`outDate`) >= HOUR('15:00:00')
AND HOUR(`outDate`) <= HOUR('15:59:00')";


    if ($result = mysqli_query($con, $myqryS)) {
     while ($row = mysqli_fetch_row($result)) {
        $cnt[8] = $row[0];
      }
    }
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`outDate`) as `gg`
FROM tapout_logs WHERE DATE(`outDate`) = DATE(CURDATE()) 
AND HOUR(`outDate`) >= HOUR('16:00:00')
AND HOUR(`outDate`) <= HOUR('16:59:00')";


    if ($result = mysqli_query($con, $myqryS)) {
     while ($row = mysqli_fetch_row($result)) {
        $cnt[9] = $row[0];
      }
    }
//echo $cnt; echo "<br>";


$myqryS = "SELECT COUNT(`outDate`) as `gg`
FROM tapout_logs WHERE DATE(`outDate`) = DATE(CURDATE()) 
AND HOUR(`outDate`) >= HOUR('17:00:00')
AND HOUR(`outDate`) <= HOUR('17:59:00')";


    if ($result = mysqli_query($con, $myqryS)) {
     while ($row = mysqli_fetch_row($result)) {
        $cnt[10] = $row[0];
      }
    }
//echo $cnt; echo "<br>";
    $myqryS = "SELECT COUNT(`outDate`) as `gg`
FROM tapout_logs WHERE DATE(`outDate`) = DATE(CURDATE()) 
AND HOUR(`outDate`) >= HOUR('18:00:00')
AND HOUR(`outDate`) <= HOUR('18:59:00')";


    if ($result = mysqli_query($con, $myqryS)) {
     while ($row = mysqli_fetch_row($result)) {
        $cnt[25] = $row[0];
      }
    }
//echo $cnt; echo "<br>";

    $myqryS = "SELECT COUNT(`outDate`) as `gg`
FROM tapout_logs WHERE DATE(`outDate`) = DATE(CURDATE()) 
AND HOUR(`outDate`) >= HOUR('19:00:00')
AND HOUR(`outDate`) <= HOUR('19:59:00')";


    if ($result = mysqli_query($con, $myqryS)) {
     while ($row = mysqli_fetch_row($result)) {
        $cnt[26] = $row[0];
      }
    }
//echo $cnt; echo "<br>";


//-------------------------------

$myqryS = "SELECT COUNT(`inDate`) as `gg`
FROM `tapin_logs` WHERE DATE(`inDate`) = DATE(CURDATE()) 
AND HOUR(`inDate`) >= HOUR('07:00:00')
AND HOUR(`inDate`) <= HOUR('07:59:00')";


    if ($result = mysqli_query($con, $myqryS)) {
     while ($row = mysqli_fetch_row($result)) {
        $cnt[11] = $row[0];
      }
    }
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`inDate`) as `gg`
FROM `tapin_logs` WHERE DATE(`inDate`) = DATE(CURDATE()) 
AND HOUR(`inDate`) >= HOUR('08:00:00')
AND HOUR(`inDate`) <= HOUR('08:59:00')";


    if ($result = mysqli_query($con, $myqryS)) {
     while ($row = mysqli_fetch_row($result)) {
        $cnt[12] = $row[0];
      }
    }
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`inDate`) as `gg`
FROM `tapin_logs` WHERE DATE(`inDate`) = DATE(CURDATE()) 
AND HOUR(`inDate`) >= HOUR('09:00:00')
AND HOUR(`inDate`) <= HOUR('09:59:00')";


    if ($result = mysqli_query($con, $myqryS)) {
     while ($row = mysqli_fetch_row($result)) {
        $cnt[13] = $row[0];
      }
    }
//echo $cnt; echo "<br>";echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`inDate`) as `gg`
FROM `tapin_logs` WHERE DATE(`inDate`) = DATE(CURDATE()) 
AND HOUR(`inDate`) >= HOUR('10:00:00')
AND HOUR(`inDate`) <= HOUR('10:59:00')";


    if ($result = mysqli_query($con, $myqryS)) {
     while ($row = mysqli_fetch_row($result)) {
        $cnt[14] = $row[0];
      }
    }
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`inDate`) as `gg`
FROM `tapin_logs` WHERE DATE(`inDate`) = DATE(CURDATE()) 
AND HOUR(`inDate`) >= HOUR('11:00:00')
AND HOUR(`inDate`) <= HOUR('11:59:00')";


    if ($result = mysqli_query($con, $myqryS)) {
     while ($row = mysqli_fetch_row($result)) {
        $cnt[15] = $row[0];
      }
    }
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`inDate`) as `gg`
FROM `tapin_logs` WHERE DATE(`inDate`) = DATE(CURDATE()) 
AND HOUR(`inDate`) >= HOUR('12:00:00')
AND HOUR(`inDate`) <= HOUR('12:59:00')";


    if ($result = mysqli_query($con, $myqryS)) {
     while ($row = mysqli_fetch_row($result)) {
        $cnt[16] = $row[0];
      }
    }
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`inDate`) as `gg`
FROM `tapin_logs` WHERE DATE(`inDate`) = DATE(CURDATE()) 
AND HOUR(`inDate`) >= HOUR('13:00:00')
AND HOUR(`inDate`) <= HOUR('13:59:00')";


    if ($result = mysqli_query($con, $myqryS)) {
     while ($row = mysqli_fetch_row($result)) {
        $cnt[17] = $row[0];
      }
    }
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`inDate`) as `gg`
FROM `tapin_logs` WHERE DATE(`inDate`) = DATE(CURDATE()) 
AND HOUR(`inDate`) >= HOUR('14:00:00')
AND HOUR(`inDate`) <= HOUR('14:59:00')";


    if ($result = mysqli_query($con, $myqryS)) {
     while ($row = mysqli_fetch_row($result)) {
        $cnt[18] = $row[0];
      }
    }
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`inDate`) as `gg`
FROM `tapin_logs` WHERE DATE(`inDate`) = DATE(CURDATE()) 
AND HOUR(`inDate`) >= HOUR('15:00:00')
AND HOUR(`inDate`) <= HOUR('15:59:00')";


    if ($result = mysqli_query($con, $myqryS)) {
     while ($row = mysqli_fetch_row($result)) {
        $cnt[19] = $row[0];
      }
    }
//echo $cnt; echo "<br>";

$myqryS = "SELECT COUNT(`inDate`) as `gg`
FROM `tapin_logs` WHERE DATE(`inDate`) = DATE(CURDATE()) 
AND HOUR(`inDate`) >= HOUR('16:00:00')
AND HOUR(`inDate`) <= HOUR('16:59:00')";


    if ($result = mysqli_query($con, $myqryS)) {
     while ($row = mysqli_fetch_row($result)) {
        $cnt[20] = $row[0];
      }
    }
//echo $cnt; echo "<br>";


$myqryS = "SELECT COUNT(`inDate`) as `gg`
FROM `tapin_logs` WHERE DATE(`inDate`) = DATE(CURDATE()) 
AND HOUR(`inDate`) >= HOUR('17:00:00')
AND HOUR(`inDate`) <= HOUR('17:59:00')";


    if ($result = mysqli_query($con, $myqryS)) {
     while ($row = mysqli_fetch_row($result)) {
        $cnt[21] = $row[0];
      }
    }
//echo $cnt; echo "<br>";

    $myqryS = "SELECT COUNT(`inDate`) as `gg`
FROM `tapin_logs` WHERE DATE(`inDate`) = DATE(CURDATE()) 
AND HOUR(`inDate`) >= HOUR('18:00:00')
AND HOUR(`inDate`) <= HOUR('18:59:00')";


    if ($result = mysqli_query($con, $myqryS)) {
     while ($row = mysqli_fetch_row($result)) {
        $cnt[22] = $row[0];
      }
    }
//echo $cnt; echo "<br>";


    $myqryS = "SELECT COUNT(`inDate`) as `gg`
FROM `tapin_logs` WHERE DATE(`inDate`) = DATE(CURDATE()) 
AND HOUR(`inDate`) >= HOUR('19:00:00')
AND HOUR(`inDate`) <= HOUR('19:59:00')";


    if ($result = mysqli_query($con, $myqryS)) {
     while ($row = mysqli_fetch_row($result)) {
        $cnt[23] = $row[0];
      }
    }
//echo $cnt; echo "<br>";


?>

    <div id="chartX" hidden> </div>

    <script src="assets/vendor/chartsjs/Chart.min.js"></script>
    <script src="assets/vendor/jquery3/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap4/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/fontawesome5/js/solid.min.js"></script>
    <script src="assets/vendor/fontawesome5/js/fontawesome.min.js"></script>

    <script type="text/javascript">window.onload = date_time('date_time');</script>


        <script language="javascript" type="text/javascript">
            function loadlink(){
                $('#Tap-Outs').load('table_tapout.php',function () {
                     //$(this).unwrap();
                });
                 $('#Tap-Ins').load('table_tapin.php',function () {
                     //$(this).unwrap();
                });
                 $('#chartX').load('hr_counter.php',function () {
                     //$(this).unwrap();
                });

                 $('#livepop').load('livepop.php',function () {
                     //$(this).unwrap();
                });

                   $('#tapinz').load('tapinz.php',function () {
                     //$(this).unwrap();
                });

                    $('#tapoutz').load('tapoutz.php',function () {
                     //$(this).unwrap();
                });
            }

            loadlink(); // This will run on page load
            setInterval(function(){
                loadlink() // this will run after every 5 seconds
            }, 1000);
</script>

<script>
var trafficchart = document.getElementById("trafficflow");
var saleschart = document.getElementById("sales");

var myChart1 = new Chart(trafficchart, {
    type: 'line',
    data: {
            labels: ['7AM','8AM','9AM','10AM','11AM','12NN','1PM','2PM','3PM','4PM','5PM','6PM','7PM'],
            datasets: [{
                backgroundColor: "rgba(48, 164, 255, 0.5)",
                borderColor: "rgba(48, 164, 255, 0.8)",
                data: [<?php echo $cnt[0];?>,<?php echo $cnt[1];?>,<?php echo $cnt[2];?>,<?php echo $cnt[3];?>,<?php echo $cnt[4];?>,
                    <?php echo $cnt[5];?>,<?php echo $cnt[6];?>,<?php echo $cnt[7];?>,<?php echo $cnt[8];?>,<?php echo $cnt[9];?>,<?php echo $cnt[10];?>,
                    <?php echo $cnt[25]?>,<?php echo $cnt[26];?>],
                label: '',
                fill: true
            }]
    },
    options: {
        responsive: true,
        title: {display: false,text: 'Chart'},
        legend: {position: 'top',display: false,},
        tooltips: {mode: 'index',intersect: false,},
        hover: {mode: 'nearest',intersect: true},
        scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Timeline'
                }
            }],
            yAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Traffic'
                }
            }]
        }
    }
});

var myChart2 = new Chart(saleschart, {
    type: 'bar',
    data: {
        labels: ['7AM','8AM','9AM','10AM','11AM','12NN','1PM','2PM','3PM','4PM','5PM','6PM','7PM'],
        datasets: [{
            label: 'Tap Ins',
            backgroundColor: "rgba(76, 175, 80, 0.5)",
            borderColor: "#6da252",
            borderWidth: 1,
            data: [<?php echo $cnt[11];?>,<?php echo $cnt[12];?>,<?php echo $cnt[13];?>,<?php echo $cnt[14];?>,<?php echo $cnt[15];?>,
                    <?php echo $cnt[16];?>,<?php echo $cnt[17];?>,<?php echo $cnt[18];?>,<?php echo $cnt[19];?>,<?php echo $cnt[20];?>,<?php echo $cnt[21];?>,
                    <?php echo $cnt[22];?>],
        }]
    },
    options: {
        responsive: true,
        title: {display: false,text: 'Chart'},
        legend: {position: 'top',display: false,},
        tooltips: {mode: 'index',intersect: false,},
        hover: {mode: 'nearest',intersect: true},
        scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Timeline'
                }
            }],
            yAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Traffic'
                }
            }]
        }
    }
});
</script>




</body>
</html>

