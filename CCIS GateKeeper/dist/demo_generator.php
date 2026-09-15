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
    $windowDays = isset($_POST['window_days']) ? (int)$_POST['window_days'] : 76;
    if ($windowDays < 1) { $windowDays = 1; }
    if ($windowDays > 366) { $windowDays = 366; }

    mysqli_query($con, "SET @window_end = CURDATE()");
    mysqli_query($con, "SET @window_start = DATE_SUB(@window_end, INTERVAL $windowDays DAY)");
    mysqli_query($con, "SET @window_span = DATEDIFF(@window_end, @window_start)");

    $ok = true;
    $ok = $ok && mysqli_query($con, "UPDATE tapin_logs SET inDate = ADDTIME(DATE_ADD(@window_start, INTERVAL FLOOR(RAND() * (@window_span + 1)) DAY), TIME(inDate))");
    $ok = $ok && mysqli_query($con, "UPDATE tapout_logs SET outDate = ADDTIME(DATE_ADD(@window_start, INTERVAL FLOOR(RAND() * (@window_span + 1)) DAY), TIME(outDate))");
    $ok = $ok && mysqli_query($con, "UPDATE attendance_record SET date_record = DATE_ADD(@window_start, INTERVAL FLOOR(RAND() * (@window_span + 1)) DAY) WHERE date_record IS NOT NULL");
    $ok = $ok && mysqli_query($con, "UPDATE attnmessage SET imsg_Date = ADDTIME(DATE_ADD(@window_start, INTERVAL FLOOR(RAND() * (@window_span + 1)) DAY), TIME(imsg_Date))");

    if ($ok) {
      $message = "<div class='alert alert-success'>Demo dates regenerated — spread across the last $windowDays days.</div>";
    } else {
      $message = "<div class='alert alert-danger'>Regeneration failed: " . htmlspecialchars(mysqli_error($con)) . "</div>";
    }
  }

  function summarize($con, $table, $dateCol) {
    $res = mysqli_query($con, "SELECT MIN($dateCol) mn, MAX($dateCol) mx, COUNT(*) c FROM $table");
    if (!$res) { return null; }
    return mysqli_fetch_assoc($res);
  }

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
                                        Randomly redistributes every tap-in, tap-out, attendance, and
                                        message date across a recent window ending today, preserving
                                        each row's original time-of-day and all ID relationships.
                                        Demo/testing use only.
                                    </p>
                                    <form method="post">
                                        <div class="form-group">
                                            <label class="small mb-1" for="window_days">Window size (days back from today)</label>
                                            <input class="form-control" type="number" id="window_days" name="window_days" min="1" max="366" value="76" />
                                            <small class="form-text text-muted">76 days ≈ a July–September spread.</small>
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
