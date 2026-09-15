<?php
    // session_start() must run before any output — moved here from further
    // down the file, where HTML markup had already been sent, causing
    // "Cannot start session when headers already sent".
    session_start();

    // lastupdate.php defines clear_absents() (used below) and other helper
    // functions, and was previously only included at the very bottom of
    // this file — after those functions were already called, causing
    // "Call to undefined function clear_absents()". Moved here so the
    // functions exist before they're used. Its top-level cleanup queries
    // already ran unconditionally on every page load either way (GET or
    // POST), so this only changes when in execution they run, not whether.
    include 'lastupdate.php';

    //onload variables
    $newname = "NO DATA";
    $xidno = "NO DATA";
    $position = "NO DATA";
    $frdaterange = "NO DATA";
    $todaterange = "NO DATA";
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
                              <form id="form2" action="print_report_admins_TESTING.php" method="POST" target="_blank">
                                 <input type="submit" class="btn btn-primary btn-block" id="PRINT" name="PRINT" value="PRINT / SAVE">
                              </form>
                               </div>
                            </div>

                        </div>
                         </div> 
                </div>
                <?php
                $connect = mysqli_connect("localhost", "root", "", "mclccisn_gatekeeper");

                        // reports_admin (the old data source here) is built by a per-date/
                        // per-user seeding loop whose own cleanup pass deletes any row still
                        // marked "Absent"/"ND" on every subsequent page load. For most
                        // (user, date) pairs there's no real tap that day, so rows get
                        // inserted then deleted again before the next request — the table
                        // never holds a stable, complete picture. Reports now reads
                        // tapin_logs/tapout_logs directly (see build_report_rows() below),
                        // the same fix applied to Member Log Records (admin_logs.php).
                        function build_report_rows($connect, $xidno, $frdaterange, $todaterange, $xfilter) {
                            $newfrdate = $frdaterange . ' 00:00:00';
                            $newtodate = $todaterange . ' 23:59:59';
                            $idEsc = mysqli_real_escape_string($connect, $xidno);

                            if ($xfilter === 'Absent') {
                                // "Absent" means a real calendar date in range with zero
                                // tap-ins that day. calendar itself doesn't churn (only
                                // reports_admin does), so it's a safe source of real dates.
                                $rows = array();
                                $dateRes = mysqli_query($connect, "SELECT calendar_dates FROM calendar WHERE calendar_dates BETWEEN '".mysqli_real_escape_string($connect,$frdaterange)."' AND '".mysqli_real_escape_string($connect,$todaterange)."' ORDER BY calendar_dates DESC");
                                $dates = array();
                                while ($d = mysqli_fetch_assoc($dateRes)) { $dates[] = $d['calendar_dates']; }

                                if ($xidno !== '') {
                                    $userRes = mysqli_query($connect, "SELECT id_no, firstname, lastname FROM user_account WHERE id_no='$idEsc'");
                                } else {
                                    $userRes = mysqli_query($connect, "SELECT id_no, firstname, lastname FROM user_account");
                                }
                                $users = array();
                                while ($u = mysqli_fetch_assoc($userRes)) { $users[] = $u; }

                                foreach ($dates as $date) {
                                    foreach ($users as $u) {
                                        $chk = mysqli_query($connect, "SELECT 1 FROM tapin_logs WHERE id_no='".$u['id_no']."' AND DATE(inDate)='$date' LIMIT 1");
                                        if (mysqli_num_rows($chk) == 0) {
                                            $rows[] = array(
                                                'id_no' => $u['id_no'], 'Firstname' => $u['firstname'], 'Lastname' => $u['lastname'],
                                                'Date' => $date, 'TimeIn' => 'ND', 'TimeOut' => 'ND', 'Duration' => 'ND', 'Remarks' => 'Absent',
                                            );
                                        }
                                    }
                                }
                                return $rows;
                            }

                            // All / late / ontime: real tap-in/tap-out events, paired
                            // sequentially per (id_no, date) — the n-th tap-in of the day
                            // with the n-th tap-out of the day, matching lastupdate.php's
                            // own update_hours() convention elsewhere in the app.
                            $idFilterOut = $xidno !== '' ? " AND o.id_no='$idEsc'" : '';
                            $tapouts = array();
                            $outRes = mysqli_query($connect, "SELECT o.id_no, o.outDate FROM tapout_logs o WHERE o.outDate BETWEEN '$newfrdate' AND '$newtodate' $idFilterOut ORDER BY o.id_no, o.outDate ASC");
                            while ($o = mysqli_fetch_assoc($outRes)) {
                                $key = $o['id_no'] . '|' . substr($o['outDate'], 0, 10);
                                if (!isset($tapouts[$key])) { $tapouts[$key] = array(); }
                                $tapouts[$key][] = $o['outDate'];
                            }

                            $idFilterIn = $xidno !== '' ? " AND i.id_no='$idEsc'" : '';
                            $inRes = mysqli_query($connect, "SELECT i.id_no, ua.firstname, ua.lastname, i.inDate
                                                              FROM tapin_logs i LEFT JOIN user_account ua ON i.id_no = ua.id_no
                                                              WHERE i.inDate BETWEEN '$newfrdate' AND '$newtodate' $idFilterIn
                                                              ORDER BY i.id_no, i.inDate ASC");
                            $rows = array();
                            while ($row = mysqli_fetch_assoc($inRes)) {
                                $inDate = $row['inDate'];
                                $date = substr($inDate, 0, 10);
                                $time = substr($inDate, 11, 5);
                                $remarks = ($time < '07:00') ? 'ontime' : 'late';
                                $key = $row['id_no'] . '|' . $date;
                                $outDate = null;
                                if (!empty($tapouts[$key])) { $outDate = array_shift($tapouts[$key]); }

                                if ($xfilter !== 'All' && $xfilter !== $remarks) { continue; }

                                $rows[] = array(
                                    'id_no'     => $row['id_no'],
                                    'Firstname' => $row['firstname'] !== null ? $row['firstname'] : 'ND',
                                    'Lastname'  => $row['lastname'] !== null ? $row['lastname'] : 'ND',
                                    'Date'      => $date,
                                    'TimeIn'    => substr($inDate, 11),
                                    'TimeOut'   => $outDate ? substr($outDate, 11) : 'ND',
                                    'Duration'  => $outDate ? gmdate('H \h\o\u\r\s, i \m\i\n\u\t\e\s', strtotime($outDate) - strtotime($inDate)) : 'ND',
                                    'Remarks'   => $remarks,
                                );
                            }
                            usort($rows, function($a, $b) {
                                return strcmp($b['Date'] . $b['TimeIn'], $a['Date'] . $a['TimeIn']);
                            });
                            return $rows;
                        }

                        if(isset($_POST['clear']))
                        {
                          echo "<script> document.getElementById('form1').reset(); </script>";


                        }


                        if(isset($_POST['query']))
                        {
                                      $frdaterange = $_POST['frdaterange'];
                                      $todaterange = $_POST['todaterange'];
                                      $xfilter = $_POST['xfilter'];
                                      $xidno = trim($_POST['xidno']);

                                        $_SESSION['frd'] = $frdaterange;
                                        $_SESSION['tod'] =  $todaterange;
                                        $_SESSION['id'] =  $xidno;
                                        $_SESSION['xfilter'] = $xfilter;

                                        echo'
                                            <script>    document.getElementById("frdaterange").disabled = true;
                                                document.getElementById("todaterange").disabled = true;
                                                document.getElementById("xidno").disabled = true; </script> ';

                                        session_commit();

                                    if($frdaterange > $todaterange)
                                    {
                                        echo "<script>alert('invalid date range FROM is greater than TO')</script>;";
                                        echo'
                                                        <script>
                                                            document.getElementById("frdaterange").disabled = false;
                                                            document.getElementById("todaterange").disabled = false;
                                                            document.getElementById("xidno").disabled = false; </script> ';
                                    }
                                    else
                                    {
                                        $validId = true;
                                        if ($xidno !== '')
                                        {
                                            $query1 = "SELECT * FROM user_account WHERE `id_no`='".mysqli_real_escape_string($connect, $xidno)."' LIMIT 1";
                                            $result1 = mysqli_query($connect, $query1);
                                            if (mysqli_num_rows($result1) > 0)
                                            {
                                                $u = mysqli_fetch_assoc($result1);
                                                $newname = $u['lastname'] . ' ' . $u['firstname'];
                                                $position = $u['acc_type'];
                                            }
                                            else
                                            {
                                                $validId = false;
                                                echo "<script>alert('".$xidno." is not a valid MCL ID')</script>;";
                                                echo'
                                                    <script>
                                                        document.getElementById("frdaterange").disabled = false;
                                                        document.getElementById("todaterange").disabled = false;
                                                        document.getElementById("xidno").disabled = false; </script> ';
                                            }
                                        }
                                        else
                                        {
                                            $newname = "ALL";
                                            $position = "All";
                                        }

                                        if ($validId)
                                        {
                                            $reportRows = build_report_rows($connect, $xidno, $frdaterange, $todaterange, $xfilter);
                                            $_POST['xprocess'] = "submit";
                                        }
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
                        foreach($reportRows as $row)
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
?>