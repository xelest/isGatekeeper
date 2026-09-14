-- Docker demo only: the shipped DEMO SQL dump's tap logs, attendance, and
-- messages are all dated January 2020-2021, so "today" queries (dashboard
-- live counters, current-month reports) always show zero and look dead.
-- Spread every row's date randomly across a ~2.5 month recent window
-- (roughly matching a July-through-September pattern relative to whenever
-- this seed runs), through today inclusive, while preserving each row's
-- original time-of-day and all id_no/rf_id relationships untouched.

SET @window_end = CURDATE();
SET @window_start = DATE_SUB(@window_end, INTERVAL 76 DAY);
SET @window_span = DATEDIFF(@window_end, @window_start);

UPDATE tapin_logs
SET inDate = ADDTIME(
  DATE_ADD(@window_start, INTERVAL FLOOR(RAND() * (@window_span + 1)) DAY),
  TIME(inDate)
);

UPDATE tapout_logs
SET outDate = ADDTIME(
  DATE_ADD(@window_start, INTERVAL FLOOR(RAND() * (@window_span + 1)) DAY),
  TIME(outDate)
);

UPDATE attendance_record
SET date_record = DATE_ADD(@window_start, INTERVAL FLOOR(RAND() * (@window_span + 1)) DAY)
WHERE date_record IS NOT NULL;

UPDATE attnmessage
SET imsg_Date = ADDTIME(
  DATE_ADD(@window_start, INTERVAL FLOOR(RAND() * (@window_span + 1)) DAY),
  TIME(imsg_Date)
);
