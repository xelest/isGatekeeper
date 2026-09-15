-- Docker demo only: the shipped DEMO SQL dump's calendar, tap logs, and
-- messages are all dated January 2021 (attendance_record is January-June
-- 2020), so "today" queries (dashboard live counters, current-month
-- reports) always show zero and look dead.
--
-- Shift (not randomly redistribute) calendar, tapin_logs, tapout_logs, and
-- attnmessage by the SAME number of days, anchored on calendar's own range.
-- This matters for correctness, not just cosmetics: reports_admin.php's
-- report generation (lastupdate.php) only produces rows for dates that
-- exist in `calendar` — calendar is the driver table. An earlier version of
-- this script shifted tap logs but not calendar, so Reports always showed
-- "no data" despite tap logs existing. It also redistributed each table
-- independently at random, which broke same-day tap-in/tap-out pairing
-- (duration calculations need a tap-in and tap-out to land on the same
-- shifted day). A uniform shift preserves both: relative spacing/weekday
-- pattern, and cross-table same-day relationships.
--
-- attendance_record isn't read by the current reports_admin.php/
-- lastupdate.php flow, so it gets its own independent shift just to look
-- recent, with no cross-table alignment requirement.

SET @calendar_shift_days = DATEDIFF(
  DATE_SUB(CURDATE(), INTERVAL 1 DAY),
  (SELECT MAX(calendar_dates) FROM calendar)
);

UPDATE calendar
SET calendar_dates = DATE_ADD(calendar_dates, INTERVAL @calendar_shift_days DAY);

UPDATE tapin_logs
SET inDate = DATE_ADD(inDate, INTERVAL @calendar_shift_days DAY);

UPDATE tapout_logs
SET outDate = DATE_ADD(outDate, INTERVAL @calendar_shift_days DAY);

UPDATE attnmessage
SET imsg_Date = DATE_ADD(imsg_Date, INTERVAL @calendar_shift_days DAY);

SET @attendance_shift_days = DATEDIFF(
  DATE_SUB(CURDATE(), INTERVAL 1 DAY),
  (SELECT MAX(date_record) FROM attendance_record)
);

UPDATE attendance_record
SET date_record = DATE_ADD(date_record, INTERVAL @attendance_shift_days DAY)
WHERE date_record IS NOT NULL;
