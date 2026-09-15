<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CCIS | </title>

    <link href="assets/vendor/bootstrap4/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/DataTables/datatables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="assets/css/master.css" rel="stylesheet">
    <link href="css/mycss.css" rel="stylesheet">

  <script src="js/script_date_time.js"></script>

  <style>
    td{
      font-family: "Lato", "Helvetica Neue", Arial, Helvetica, sans-serif !important;
      font-size: 15px !important;
      font-weight: 400px !important;
      color: rgb(47, 51, 61) !important;
    }
  </style>

</head>

<?php
// This page used to depend on the `reports_admin` table (via ND_UPDATER.php/
// lastupdate.php), which is built by a per-date/per-user seeding loop and
// then has its own "Absent"/"ND" placeholder rows deleted again on every
// subsequent page load's cleanup pass. For any (user, date) combination with
// no real tap that day — the overwhelming majority, once every account type
// is included instead of just the 3 Admins — the row gets inserted then
// deleted on the very next request, so the table never stabilizes and this
// page looked like it only ever showed a handful of accounts. Querying
// tapin_logs/tapout_logs directly (joined to user_account for name/position)
// sidesteps that entirely: it's a real, stable log of actual taps for every
// account type, which is what "Tap Logs" should show in the first place.
?>

<body>
    <div class="wrapper">
        <div id="body" class="active">
            <div class="content">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-7"><h3>Member Log Records </h3></div>

                            <div class="col-5"><div class="card-body" style="text-align: right;" ><span id="date_time"></span></div></div>
                        </div>
                    </div>

                    <div class="row"><div class="col-12">
                    <!--=============TABLE PROFILE========== -->
                            <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Log Records
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="tapout_table" cellspacing="0">
                                        <thead>
                                                <tr>
                                                <th>Id No</th>
                                                <th>Firstname</th>
                                                <th>Lastname</th>
                                                <th>Position</th>
                                                <th>Date</th>
                                                <th>Time In</th>
                                                <th>Time Out</th>
                                                <th>Duration</th>
                                                <th>Remarks</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                          <?php

                                            //config
                                            include_once('connection.php');

                                            // Tap-ins and tap-outs are fetched separately and paired sequentially
                                            // per (id_no, date) — the n-th tap-in of the day with the n-th tap-out
                                            // of the day — the same convention lastupdate.php's update_hours() uses
                                            // elsewhere in the app. A same-day SQL JOIN on id_no alone fans out into
                                            // every tap-in matching every tap-out that day (wrong pairings, nonsense/
                                            // negative durations) whenever someone taps more than once in a day.
                                            $tapouts = array();
                                            $outRes = mysqli_query($con, "SELECT id_no, outDate FROM tapout_logs ORDER BY id_no, outDate ASC");
                                            while ($o = mysqli_fetch_assoc($outRes)) {
                                                $key = $o['id_no'] . '|' . substr($o['outDate'], 0, 10);
                                                if (!isset($tapouts[$key])) { $tapouts[$key] = array(); }
                                                $tapouts[$key][] = $o['outDate'];
                                            }

                                            // Not every id_no in tapin_logs has a matching user_account row in the
                                            // shipped demo data (name/position show "ND" for those) — a pre-existing
                                            // data gap in the seed, not something this page can resolve.
                                            $msql = "SELECT i.id_no,
                                                             ua.firstname AS Firstname,
                                                             ua.lastname AS Lastname,
                                                             ua.acc_type AS Position,
                                                             i.inDate
                                                      FROM tapin_logs i
                                                      LEFT JOIN user_account ua ON i.id_no = ua.id_no
                                                      ORDER BY i.id_no, i.inDate ASC";
                                            $result1 = mysqli_query($con, $msql);

                                            $rows = array();
                                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                                $inDate = $row1['inDate'];
                                                $date = substr($inDate, 0, 10);
                                                $key = $row1['id_no'] . '|' . $date;
                                                $outDate = null;
                                                if (!empty($tapouts[$key])) {
                                                    $outDate = array_shift($tapouts[$key]);
                                                }

                                                $rows[] = array(
                                                    'Id No'     => $row1['id_no'],
                                                    'Firstname' => $row1['Firstname'] !== null ? $row1['Firstname'] : 'ND',
                                                    'Lastname'  => $row1['Lastname'] !== null ? $row1['Lastname'] : 'ND',
                                                    'Position'  => $row1['Position'] !== null ? $row1['Position'] : 'ND',
                                                    'Date'      => $date,
                                                    'Time In'   => substr($inDate, 11),
                                                    'Time Out'  => $outDate ? substr($outDate, 11) : 'ND',
                                                    'Duration'  => $outDate ? gmdate('H \h\o\u\r\s, i \m\i\n\u\t\e\s', strtotime($outDate) - strtotime($inDate)) : 'ND',
                                                    'Remarks'   => $outDate ? 'Tapped Out' : 'Still Inside',
                                                );
                                            }

                                            // Most recent tap-in first.
                                            usort($rows, function($a, $b) {
                                                return strcmp($b['Date'] . $b['Time In'], $a['Date'] . $a['Time In']);
                                            });

                                            foreach ($rows as $row1) {
                                                echo "<tr>";
                                                foreach ($row1 as $value) {
                                                    echo "<td>" . htmlspecialchars($value) . "</td>";
                                                }
                                                echo "</tr>";
                                            }
                                            ?>
                                          </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                   <!--=============MODAL========== -->
                   <div class="col-6">

                   <!--=============MODAL========== -->
               </div>

        </div>
    </div>
</div>
    </div>

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>


    <script src="assets/vendor/chartsjs/Chart.min.js"></script>
    <script src="assets/js/dashboard-charts.js"></script>
    <script src="assets/vendor/jquery3/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap4/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/fontawesome5/js/solid.min.js"></script>
    <script src="assets/vendor/fontawesome5/js/fontawesome.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/vendor/DataTables/datatables.min.js"></script>
    <script src="assets/demo/datatables-demo.js"></script>
    <script type="text/javascript">window.onload = date_time('date_time');</script>

    <script>
    $(document).ready(function() {
    $('#tapin_table').DataTable();
    } );

     $(document).ready(function() {
    $('#tapout_table').DataTable();
    } );

  </script>
</body>

</html>
