<?php
  $DB_HOST = 'localhost';
  $DB_USER = 'root';
  $DB_PASS = '';
  $DB_NAME = 'mclccisn_gatekeeper';

  $con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

  if (!$con) {
    die("Unable to select database");
  }

  $message = "";

  if (isset($_POST['generate'])) {
    // Uniform shift, not random per-row redistribution: reports_admin.php's
    // report generation (lastupdate.php) only produces rows for dates
    // present in `calendar` — it's the driver table — so calendar must
    // move together with the tap logs, by the same offset, or Reports
    // shows "no data" against the new range. A shared offset also keeps
    // same-day tap-in/tap-out pairing intact (duration calculations need
    // both halves of a visit on the same day), which independent random
    // redistribution per table breaks.
    //
    // Anchored on tapin_logs' own max, not calendar's: calendar's native
    // range extends ~2 weeks further than tapin_logs'/tapout_logs' in the
    // shipped demo data, so anchoring on calendar always left tap logs
    // trailing behind "today" by that same gap. Dashboard's live counters
    // read tap logs directly by CURDATE(), so tap logs (not calendar) are
    // what need to reach "today" for the demo to look alive. Calendar ends
    // up shifted slightly into the future, which is harmless.
    $targetDaysBack = isset($_POST['window_days']) ? (int)$_POST['window_days'] : 0;
    if ($targetDaysBack < 0) { $targetDaysBack = 0; }
    if ($targetDaysBack > 366) { $targetDaysBack = 366; }

    mysqli_query($con, "SET @target_max = DATE_SUB(CURDATE(), INTERVAL $targetDaysBack DAY)");
    mysqli_query($con, "SET @calendar_shift = DATEDIFF(@target_max, (SELECT MAX(inDate) FROM tapin_logs))");
    mysqli_query($con, "SET @attendance_shift = DATEDIFF(@target_max, (SELECT MAX(date_record) FROM attendance_record))");

    $ok = true;
    $ok = $ok && mysqli_query($con, "UPDATE calendar SET calendar_dates = DATE_ADD(calendar_dates, INTERVAL @calendar_shift DAY)");
    $ok = $ok && mysqli_query($con, "UPDATE tapin_logs SET inDate = DATE_ADD(inDate, INTERVAL @calendar_shift DAY)");
    $ok = $ok && mysqli_query($con, "UPDATE tapout_logs SET outDate = DATE_ADD(outDate, INTERVAL @calendar_shift DAY)");
    $ok = $ok && mysqli_query($con, "UPDATE attnmessage SET imsg_Date = DATE_ADD(imsg_Date, INTERVAL @calendar_shift DAY)");
    $ok = $ok && mysqli_query($con, "UPDATE attendance_record SET date_record = DATE_ADD(date_record, INTERVAL @attendance_shift DAY) WHERE date_record IS NOT NULL");

    if ($ok) {
      $message = "<div class='alert alert-success'>Demo dates regenerated — calendar, tap logs, and messages shifted together so the latest date lands $targetDaysBack day(s) back from today.</div>";
    } else {
      $message = "<div class='alert alert-danger'>Regeneration failed: " . htmlspecialchars(mysqli_error($con)) . "</div>";
    }
  }

  function summarize($con, $table, $dateCol) {
    $res = mysqli_query($con, "SELECT MIN($dateCol) mn, MAX($dateCol) mx, COUNT(*) c FROM $table");
    if (!$res) { return null; }
    return mysqli_fetch_assoc($res);
  }

  $calendarSummary = summarize($con, 'calendar', 'calendar_dates');
  $tapinSummary = summarize($con, 'tapin_logs', 'inDate');
  $tapoutSummary = summarize($con, 'tapout_logs', 'outDate');
  $attendanceSummary = summarize($con, 'attendance_record', 'date_record');
  $msgSummary = summarize($con, 'attnmessage', 'imsg_Date');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CCIS | </title>

    <link href="assets/vendor/bootstrap4/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
    <link href="css/mycss.css" rel="stylesheet">

  <script src="js/script_date_time.js"></script>
</head>

<body>
    <div class="wrapper">
        <div id="body" class="active">
            <div class="content">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-7"><h3>Demo Data Generator</h3></div>
                            <div class="col-5"><div class="card-body" style="text-align: right;"><span id="date_time"></span></div></div>
                        </div>
                    </div>

                    <?php echo $message; ?>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header"><i class="fas fa-calendar mr-1"></i> Current Date Range</div>
                                <div class="card-body">
                                    <table class="table table-sm table-striped">
                                        <thead><tr><th>Table</th><th>Earliest</th><th>Latest</th><th>Rows</th></tr></thead>
                                        <tbody>
                                            <tr><td>Calendar (drives Reports)</td><td><?php echo $calendarSummary['mn']; ?></td><td><?php echo $calendarSummary['mx']; ?></td><td><?php echo $calendarSummary['c']; ?></td></tr>
                                            <tr><td>Tap-In Logs</td><td><?php echo $tapinSummary['mn']; ?></td><td><?php echo $tapinSummary['mx']; ?></td><td><?php echo $tapinSummary['c']; ?></td></tr>
                                            <tr><td>Tap-Out Logs</td><td><?php echo $tapoutSummary['mn']; ?></td><td><?php echo $tapoutSummary['mx']; ?></td><td><?php echo $tapoutSummary['c']; ?></td></tr>
                                            <tr><td>Attendance</td><td><?php echo $attendanceSummary['mn']; ?></td><td><?php echo $attendanceSummary['mx']; ?></td><td><?php echo $attendanceSummary['c']; ?></td></tr>
                                            <tr><td>Messages</td><td><?php echo $msgSummary['mn']; ?></td><td><?php echo $msgSummary['mx']; ?></td><td><?php echo $msgSummary['c']; ?></td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header"><i class="fas fa-magic mr-1"></i> Regenerate Recent Dates</div>
                                <div class="card-body">
                                    <p class="text-muted">
                                        Shifts calendar, tap-in, tap-out, and message dates together
                                        by the same offset (so Reports keeps working — it only
                                        generates data for dates present in the calendar), plus
                                        attendance on its own offset. Preserves time-of-day, weekday
                                        pattern, and same-day tap-in/tap-out pairing. Demo/testing
                                        use only.
                                    </p>
                                    <form method="post">
                                        <div class="form-group">
                                            <label class="small mb-1" for="window_days">Land the latest date this many days back from today</label>
                                            <input class="form-control" type="number" id="window_days" name="window_days" min="0" max="366" value="0" />
                                            <small class="form-text text-muted">0 = latest date becomes today; 1 = yesterday, etc.</small>
                                        </div>
                                        <button type="submit" name="generate" class="btn mcl-blue" style="color:#fff;">Regenerate Demo Dates</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="assets/vendor/jquery3/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap4/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">window.onload = date_time('date_time');</script>
</body>
</html>
