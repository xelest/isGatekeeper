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

  // The shipped demo data's tapin_logs/tapout_logs reference some id_nos
  // that were never carried into user_account (a gap in the sanitized
  // dump), so any page joining tap logs against user_account for name/
  // position shows "ND" for those ids. Self-healing: on every load, find
  // any tap-log id_no missing from user_account and create a synthetic
  // account for it, cycling through a small name pool. Runs unconditionally
  // (not just on Regenerate) so the fix applies immediately and stays
  // applied even if this page is only ever loaded, not submitted.
  $namePool = array(
    array('Santos', 'Miguel'), array('Reyes', 'Ella'), array('Bautista', 'Josh'),
    array('Villanueva', 'Grace'), array('Ramos', 'Diego'), array('Torres', 'Mika'),
    array('Castillo', 'Liam'), array('Flores', 'Nico'), array('Marquez', 'Anna'),
    array('Aquino', 'Ruth'), array('Dela Cruz', 'Ivan'), array('Navarro', 'Faith'),
    array('Pascual', 'Leon'), array('Domingo', 'Iris'), array('Rivera', 'Sam'),
    array('Valdez', 'Mateo'), array('Ocampo', 'Zara'), array('Lim', 'Trisha'),
    array('Guerrero', 'Enzo'), array('Salazar', 'Camille'),
  );
  $typePool = array('College', 'SHS', 'Teacher');

  $missing = array();
  $res = mysqli_query($con, "SELECT DISTINCT t.id_no FROM tapin_logs t
                              LEFT JOIN user_account ua ON t.id_no = ua.id_no
                              WHERE ua.id_no IS NULL");
  if ($res) {
    while ($row = mysqli_fetch_assoc($res)) { $missing[] = $row['id_no']; }
  }
  $linkedCount = 0;
  foreach ($missing as $i => $idNo) {
    $name = $namePool[$i % count($namePool)];
    $type = $typePool[$i % count($typePool)];
    $lastname = mysqli_real_escape_string($con, $name[0]);
    $firstname = mysqli_real_escape_string($con, $name[1]);
    $idNoEsc = mysqli_real_escape_string($con, $idNo);
    $ok = mysqli_query($con, "INSERT INTO user_account (id_no, pass_word, lastname, firstname, acc_type, acc_status)
                               VALUES ('$idNoEsc', '1', '$lastname', '$firstname', '$type', 'Active')");
    if ($ok) { $linkedCount++; }
  }

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

  if ($linkedCount > 0) {
    $linkedMsg = "<div class='alert alert-info'>Linked $linkedCount tap-log id(s) with no matching account to newly created synthetic accounts.</div>";
    $message = $linkedMsg . $message;
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
  $accountRes = mysqli_query($con, "SELECT COUNT(*) c FROM user_account");
  $accountCount = $accountRes ? mysqli_fetch_assoc($accountRes)['c'] : 'ND';
  $orphanRes = mysqli_query($con, "SELECT COUNT(DISTINCT t.id_no) c FROM tapin_logs t
                                    LEFT JOIN user_account ua ON t.id_no = ua.id_no
                                    WHERE ua.id_no IS NULL");
  $orphanCount = $orphanRes ? mysqli_fetch_assoc($orphanRes)['c'] : 'ND';
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
                                            <tr><td>User Accounts</td><td colspan="2"><?php echo $orphanCount; ?> tap-log id(s) with no account</td><td><?php echo $accountCount; ?></td></tr>
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
