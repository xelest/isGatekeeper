-- Docker demo only: the shipped DEMO SQL dump's calendar, tap logs, and
-- messages are all dated January 2021 (attendance_record is January-June
-- 2020), so "today" queries (dashboard live counters, current-month
-- reports) always show zero and look dead.
--
-- Shift (not randomly redistribute) calendar, tapin_logs, tapout_logs, and
-- attnmessage by the SAME number of days. This matters for correctness, not
-- just cosmetics: reports_admin.php's report generation (lastupdate.php)
-- only produces rows for dates that exist in `calendar` — calendar is the
-- driver table. An earlier version of this script shifted tap logs but not
-- calendar, so Reports always showed "no data" despite tap logs existing.
-- It also redistributed each table independently at random, which broke
-- same-day tap-in/tap-out pairing (duration calculations need a tap-in and
-- tap-out to land on the same shifted day). A uniform shift preserves both:
-- relative spacing/weekday pattern, and cross-table same-day relationships.
--
-- The shift is anchored on tapin_logs' own max date, not calendar's. In the
-- shipped DEMO SQL dump, calendar's native date range already extends
-- further than tapin_logs'/tapout_logs' (by ~2 weeks) — calendar has extra
-- trailing entries with no matching tap activity. Anchoring on calendar (as
-- an earlier version of this script did) always lands calendar's max on
-- "yesterday", but tap logs then trail behind by that same ~2-week gap —
-- Dashboard's live counters and "who's currently inside" read tapin_logs/
-- tapout_logs directly by CURDATE(), so recent tap data (not calendar) is
-- what actually needs to reach "today" for the demo to look alive.
-- Anchoring on tap logs instead pushes calendar's window slightly into the
-- future, which is harmless — Reports for a future calendar date with no
-- tap data just shows "Absent", same as any other day nobody tapped in.
SET @calendar_shift_days = DATEDIFF(
  CURDATE(),
  (SELECT MAX(inDate) FROM tapin_logs)
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
  CURDATE(),
  (SELECT MAX(date_record) FROM attendance_record)
);

UPDATE attendance_record
SET date_record = DATE_ADD(date_record, INTERVAL @attendance_shift_days DAY)
WHERE date_record IS NOT NULL;
