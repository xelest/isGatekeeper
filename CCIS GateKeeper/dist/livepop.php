<?php
require_once('connection.php');

// Correct per-person logic: someone is "currently inside" if their most
// recent tap-in is more recent than their most recent tap-out (or they
// have never tapped out at all). The previous version counted
// COUNT(tap-ins today) - COUNT(tap-outs today) as a raw row-count
// difference, which goes negative (clamped to 0) whenever more people
// happen to tap out today than tap in today - including people who
// tapped in on an earlier day. That's not "how many people are inside",
// it's just today's traffic delta.

$sql = "SELECT COUNT(*) AS cnt FROM (
          SELECT i.id_no
          FROM (SELECT id_no, MAX(inDate) AS last_in FROM tapin_logs GROUP BY id_no) i
          LEFT JOIN (SELECT id_no, MAX(outDate) AS last_out FROM tapout_logs GROUP BY id_no) o
            ON i.id_no = o.id_no
          WHERE o.last_out IS NULL OR i.last_in > o.last_out
        ) currently_inside";

$count = 0;
if ($result = mysqli_query($con, $sql)) {
  if ($row = mysqli_fetch_row($result)) {
    $count = (int)$row[0];
  }
}

echo $count;
?>
