<?php
    // session_start() must run before any output — see the identical fix in
    // reports_admin.php (v1.3.9) for why this was moved to the top.
    session_start();

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
                        
                    </div>
                    
                <?php
                $connect = mysqli_connect("localhost", "root", "", "mclccisn_gatekeeper");

                        // Same fix as reports_admin.php: this used to depend on the
                        // reports_admin table, whose own cleanup pass deletes any row
                        // still marked "Absent"/"ND" on every subsequent page load — it
                        // never holds a stable, complete picture once every account type
                        // is in scope, not just the 3 dense-attendance Admins. It also
                        // called clear_absents()/get_absents() (defined in lastupdate.php)
                        // before lastupdate.php was included (only at the very bottom of
                        // this file), causing a fatal "Call to undefined function" on any
                        // Print with the default "All" filter. Reads tapin_logs/
                        // tapout_logs directly instead; see reports_admin.php's
                        // build_report_rows() for the identical logic.
                        function build_report_rows($connect, $xidno, $frdaterange, $todaterange, $xfilter) {
                            $newfrdate = $frdaterange . ' 00:00:00';
                            $newtodate = $todaterange . ' 23:59:59';
                            $idEsc = mysqli_real_escape_string($connect, $xidno);

                            if ($xfilter === 'Absent') {
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

                        if(isset($_SESSION["id"]))
                        {
                                      $frdaterange = $_SESSION['frd'];
                                      $todaterange = $_SESSION['tod'];
                                      $xidno = $_SESSION['id'];
                                      $xfilter = $_SESSION['xfilter'];

                                    if($frdaterange > $todaterange)
                                    {
                                        echo "<script>alert('invalid date range FROM is greater than TO')</script>;";
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
                            <h6 style="font-size: 14px !important"> Copyright © CCIS College of Computing and Information Science 2020</h6>
                        </div>
                        <div class="col-6">
                           <h6 align="right" style="font-size: 14px !important"> Report generation requested by: <?php echo $_SESSION['uname'];?></h6>
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