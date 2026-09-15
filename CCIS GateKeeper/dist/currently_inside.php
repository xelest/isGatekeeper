<?php
require_once('connection.php');

// Same per-person "currently inside" logic as livepop.php, joined against
// user_account for display. See livepop.php for why this isn't just
// today's tap-in/tap-out counts.

$sql = "SELECT i.id_no, u.firstname, u.lastname, u.acc_type, i.last_in
        FROM (SELECT id_no, MAX(inDate) AS last_in FROM tapin_logs GROUP BY id_no) i
        LEFT JOIN (SELECT id_no, MAX(outDate) AS last_out FROM tapout_logs GROUP BY id_no) o
          ON i.id_no = o.id_no
        LEFT JOIN user_account u ON u.id_no = i.id_no
        WHERE o.last_out IS NULL OR i.last_in > o.last_out
        ORDER BY i.last_in DESC";

$result = mysqli_query($con, $sql);
?>
<table class="table table-striped table-sm">
  <thead><tr><th>ID No</th><th>Name</th><th>Position</th><th>Tapped In</th></tr></thead>
  <tbody>
<?php if ($result && mysqli_num_rows($result) > 0): ?>
  <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td><?php echo htmlspecialchars($row['id_no']); ?></td>
      <td><?php echo htmlspecialchars(trim(($row['firstname'] ?? '') . ' ' . ($row['lastname'] ?? ''))) ?: 'NO DATA'; ?></td>
      <td><?php echo htmlspecialchars($row['acc_type'] ?? 'NO DATA'); ?></td>
      <td><?php echo htmlspecialchars($row['last_in']); ?></td>
    </tr>
  <?php endwhile; ?>
<?php else: ?>
    <tr><td colspan="4" class="text-center text-muted">No one is currently inside</td></tr>
<?php endif; ?>
  </tbody>
</table>
