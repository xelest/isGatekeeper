-- Docker demo only: the shipped DEMO SQL dump's tapin_logs/tapout_logs
-- reference 15 id_nos that were never carried into user_account (2000000003,
-- 04, 05, 06, 21, 24, 32-40) — a pre-existing gap in the sanitized dump, not
-- something introduced by this repo's fixes. Any page that joins tap logs
-- against user_account for name/position (Member Log Records, Reports,
-- Dashboard's "Currently Inside") shows "ND"/"NO DATA" for these ids since
-- there's no account to look up. Adds synthetic accounts for all 15 so every
-- id_no that actually appears in the tap logs resolves to a real name and
-- position. Docker demo seed only — doesn't touch the canonical DEMO SQL
-- dump embedded in 01-schema.sql.
INSERT INTO `user_account` (`id_no`, `pass_word`, `lastname`, `firstname`, `acc_type`, `acc_status`) VALUES
('2000000003', '1', 'Santos', 'Miguel', 'College', 'Active'),
('2000000004', '1', 'Reyes', 'Ella', 'College', 'Active'),
('2000000005', '1', 'Bautista', 'Josh', 'SHS', 'Active'),
('2000000006', '1', 'Villanueva', 'Grace', 'Teacher', 'Active'),
('2000000021', '1', 'Ramos', 'Diego', 'College', 'Active'),
('2000000024', '1', 'Torres', 'Mika', 'SHS', 'Active'),
('2000000032', '1', 'Castillo', 'Liam', 'College', 'Active'),
('2000000033', '1', 'Flores', 'Nico', 'SHS', 'Active'),
('2000000034', '1', 'Marquez', 'Anna', 'Teacher', 'Active'),
('2000000035', '1', 'Aquino', 'Ruth', 'College', 'Active'),
('2000000036', '1', 'Dela Cruz', 'Ivan', 'SHS', 'Active'),
('2000000037', '1', 'Navarro', 'Faith', 'College', 'Active'),
('2000000038', '1', 'Pascual', 'Leon', 'SHS', 'Active'),
('2000000039', '1', 'Domingo', 'Iris', 'College', 'Active'),
('2000000040', '1', 'Rivera', 'Sam', 'Teacher', 'Active');
