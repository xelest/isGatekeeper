-- Docker demo environment only: seeds a System User account so both roles
-- (System Admin / System User) are reachable without manual DB edits.
-- Default credentials per the original install notes: CCIS / CCIS.

INSERT INTO `systemusers` (`uname`, `pword`, `status`, `urole`, `department`) VALUES
('CCIS', '54f809d0f91d8d3d27b268c544784780', 'A', 'System User', 'CCIS Faculty');
