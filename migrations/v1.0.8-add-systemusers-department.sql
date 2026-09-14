-- v1.0.8: core_registeruser.php and systemusers.php both read/write
-- systemusers.department, but the column was never defined in the shipped
-- schema. Run this against any existing mclccisn_gatekeeper database.

ALTER TABLE `systemusers` ADD COLUMN `department` text AFTER `urole`;
