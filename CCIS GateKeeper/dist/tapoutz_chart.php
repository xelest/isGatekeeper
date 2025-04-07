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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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


                                <div class="content">
                                    <div class="head">
                                        <h4 class="mb-0">Tap In Traffic</h4>
                                        <p class="text-muted">Today's Frequency</p>
                                    </div>
                                    <div class="canvas-wrapper"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                        <canvas class="chart chartjs-render-monitor" id="chartright" style="display: block; width: 464px; height: 232px;" width="464" height="232"></canvas>
                                    </div>
                                    <div class="ui hidden divider"></div>
                                </div>
                            </div>

</body>

    <script src="assets/vendor/chartsjs/Chart.min.js"></script>
    <script src="assets/vendor/jquery3/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap4/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/fontawesome5/js/solid.min.js"></script>
    <script src="assets/vendor/fontawesome5/js/fontawesome.min.js"></script>

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


<script>
var trafficchart = document.getElementById("chartleft");
var saleschart = document.getElementById("chartright");

var myChart1 = new Chart(trafficchart, {
    type: 'line',
    data: {
            labels: ['7AM','8AM','9AM','10AM','11AM','12NN','1PM','2PM','3PM','4PM','5PM','6PM','7PM'],
            datasets: [{
                backgroundColor: "rgba(48, 164, 255, 0.5)",
                borderColor: "rgba(48, 164, 255, 0.8)",
                data: [<?php echo $cnt[0];?>,<?php echo $cnt[1];?>,<?php echo $cnt[2];?>,<?php echo $cnt[3];?>,<?php echo $cnt[4];?>,
                    <?php echo $cnt[5];?>,<?php echo $cnt[6];?>,<?php echo $cnt[7];?>,<?php echo $cnt[8];?>,<?php echo $cnt[9];?>,<?php echo $cnt[10];?>,
                    <?php echo $cnt[25]?>,<?php echo $cnt[16];?>],
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
</html>