<?php 
include_once 'connection.php';
require 'ConnDatabase.php';

$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
file_put_contents('../../gatekeeperdevice/UIDContainer.php',$Write);


$bordercolor = "#555555";
$imgname = "img/placeholder.jpg";
$notif_msg_header = "INVALID";
$notif_msg_details = "Please report to the Security Office";
$notif_msg_sender = "Welcome Guest";
$card1hide = "";

  
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
    
  <script src="js/script_date_time.js"></script>

  <style> 
    th, td, tr {
        padding: 10px !important;
        margin: 5px !important;
        font-size: medium;
    }

    table{
        margin-top: 10px;
    }

          img {
  border-radius: 50%;
  width: 400px;
  height: 400px;
  -webkit-box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.75);
box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.75);
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
                            <div class="col-4"><h3>Activity Dashboard </h3></div>

                            <div class="col-8"><div class="card-body" style="text-align: right;" ><span id="date_time"></span></div></div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-4">
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
                        <div class="col-md-4">
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
                        <p id="getUID" hidden></p>
                        <div class="col-md-4 col-lg-4" id="show_user_data"">
                          <iframe src="../../gatekeeperdevice/tap-in-new - Copy.php" style="width: 100%; height: 100%; border: 0px;"></iframe>
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

<script>
      var myVar = setInterval(myTimer, 1000);
      var myVar1 = setInterval(myTimer1, 1000);
      var oldID="";
      clearInterval(myVar1);

      function myTimer() {
        var getID=document.getElementById("getUID").innerHTML;
        oldID=getID;
        if(getID!="") {
          myVar1 = setInterval(myTimer1, 500);
          showUser(getID);
          clearInterval(myVar);
        }
      }
      
      function myTimer1() {
        var getID=document.getElementById("getUID").innerHTML;
        if(oldID!=getID) {
          myVar = setInterval(myTimer, 500);
          clearInterval(myVar1);
        }
      }
      
      function showUser(str) {
        if (str == "") {
          document.getElementById("show_user_data").innerHTML = "";
          return;
        } else {
          if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
          } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("show_user_data").innerHTML = this.responseText;
            }
          };
          xmlhttp.open("GET","dashboard ID.php?id="+str,true);
          xmlhttp.send();
        }
      }
      
      var blink = document.getElementById('blink');
      setInterval(function() {
        blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
      }, 750); 
    </script>


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

