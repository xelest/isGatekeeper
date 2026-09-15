# Changelog

All notable changes to isGatekeeper are documented here.
Versioning follows [Semantic Versioning](https://semver.org/): `MAJOR.MINOR.PATCH`.

## [1.3.13] - 2026-09-15

Patch release.

### Fixed
- **Reports/Admin Tap Logs only ever showed data for `Admin`-type
  accounts** — `reports_admin` (the table driving both the Reports page and
  Admin Tap Logs) was only ever populated for `user_account` rows with
  `acc_type='Admin'`: `ND_UPDATER.php`, `lastupdate.php`'s `get_absents()` /
  `update_duration()` / `update_hrs()`, `generator_report_update.php`, and
  the live tap-in handler in `tap-in-new-data.php` all filtered their
  seeding/update queries on `acc_type='Admin'`. Querying an SHS/College/
  Teacher ID in Reports showed a correctly populated header (name/ID/date
  range, from a separate lookup) but an empty Profile Report table, since no
  rows for that ID existed at all. Removed the `acc_type='Admin'` filter
  from all of the above so every account type gets seeded/updated rows.
  Admin Tap Logs (`admin_logs.php`) already did an unfiltered
  `SELECT * FROM reports_admin`, so it now shows every account type too
  without needing its own change.
- **Reports always labeled the queried person's position `Admin`/`Admins`
  regardless of their actual account type** — `reports_admin.php` and
  `print_report_admins_TESTING.php` hardcoded `$position` instead of
  reading it from the user's row. Now reads the real `acc_type`.
- **Reports' Print/Save button submitted to a misspelled, nonexistent file**
  — the form's `action` was `print_repor_admins_TESTING.php` (missing a
  't'); the real file is `print_report_admins_TESTING.php`.
- **`print_report_admins_TESTING.php` threw the same `session_start()`
  headers-already-sent warning fixed in `reports_admin.php` (v1.3.9)** —
  same root cause, same fix: moved `session_start()` to the very first line.

## [1.2.8] - 2026-09-15

MINOR release. Adds a static, GitHub Pages–hosted product demo — no
application code changes, and no PHP/database dependency (pure HTML/CSS/JS,
CDN-only).

### Added
- `docs/demo/index.html` — a self-contained recreation of the app's login,
  dashboard, Users, Members, Tap Logs, Reports, Messaging, and RFID Tap-In
  screens, styled to match the real app and driven by mock/sanitized demo
  data (no live backend).
- A scripted, AI-guide-voiced walkthrough (Shepherd.js) that highlights each
  section in sequence with a "Start Guided Demo" button.
- Reactive speech-bubble tips that pop up on real visitor interaction (typing
  in the login fields, clicking a sidebar item for the first time, or
  simulating an RFID tap) — not just the scripted tour.
- Uses only generic/sanitized imagery (campus photography, a placeholder
  avatar) — deliberately excludes the real student ID photos present
  elsewhere in the repo's `img/` folder.
## [1.1.9] - 2026-09-15

Patch release. Fixes the v1.1.8 Docker deployment, which only appeared to
work — login and the handful of files touched by the v1.0.8 patch happened
to succeed, but most of the app (dashboard, Activity Dashboard, and likely
others) was broken. No application code changes; Docker packaging only.

### Fixed
- **Dashboard/Activity Dashboard crashed with `mysqli_connect(): (HY000/2002):
  No such file or directory`** — most of the app's PHP connects to MySQL
  with host `"localhost"`, which mysqli resolves via a local Unix socket
  file, not TCP. Splitting app and db into separate containers meant no such
  socket file existed in the app container, and container-to-container
  networking alone can't fix that. Fixed by sharing a volume for
  `/var/run/mysqld` between both containers and explicitly setting
  `mysqli.default_socket` (this PHP image's compiled default,
  `/tmp/mysql.sock`, doesn't match where the mysql:5.7 image actually puts
  the socket).
- **Activity Dashboard threw `file_put_contents(../../gatekeeperdevice/
  UIDContainer.php): failed to open stream`, and the RFID Tap In/Out sidebar
  links 404'd** — 5 files (`gatekeeper.php`, `dashboard3.php`,
  `systemusers.php`, `tap-in-new.php`, and one more) use relative paths that
  assume the real production layout: `gatekeeperdevice/` two directories
  above `dist/`, as a sibling of `CCIS GateKeeper/`. v1.1.8 flattened both
  into one webroot, breaking that assumption for both server-side file
  writes and client-side navigation. Fixed by preserving the real directory
  nesting inside the container instead of flattening it — the app now lives
  at `/CCIS GateKeeper/dist/` with `/gatekeeperdevice/` as an actual sibling,
  matching production. `docker/root-index.php` redirects the bare `/` to the
  login page for convenience.

### Added
- `docker/sql/04-spread-dates-recent.sql` — the shipped DEMO SQL dump's tap
  logs, attendance records, and messages are all dated January 2020/2021, so
  the dashboard's live counters and "today" queries always showed zero and
  the app looked dead. Docker demo seed only — doesn't touch the canonical
  DEMO SQL dump.

### Fixed (same-day, before this script shipped in any release)
- **Reports page showed "no data" for every query, and duration
  calculations were wrong** — the first version of this script shifted
  `tapin_logs`/`tapout_logs`/`attendance_record`/`attnmessage` but not
  `calendar`. `reports_admin.php`'s report generation (`lastupdate.php`)
  only produces rows for dates present in `calendar` — it's the driver
  table — so Reports always showed "no data" against the new date range
  despite tap logs existing. The first version also redistributed each
  table's dates independently at random, which broke same-day tap-in/
  tap-out pairing (duration calculations need both halves of a visit on the
  same day). Replaced the random per-row redistribution with a uniform
  shift (same day offset applied to `calendar`, `tapin_logs`,
  `tapout_logs`, and `attnmessage` together, anchored on `calendar`'s own
  range), which preserves both weekday pattern/spacing and cross-table
  same-day relationships. `attendance_record` isn't read by the current
  report-generation flow, so it keeps its own independent shift.

## [1.3.8] - 2026-09-15

MINOR release. Adds a new admin page — a real application feature, not
Docker packaging.

### Added
- **Demo Data Generator** (`demo_generator.php`) — a new System Admin page,
  linked in the sidebar under Page Simulation. Shows the current
  earliest/latest date and row count for `calendar`, tap-in logs, tap-out
  logs, attendance, and messages, and lets an admin regenerate them on
  demand: shifts `calendar`, tap-in, tap-out, and message dates together by
  the same offset (so Reports keeps working — it only generates data for
  dates present in `calendar`), with attendance on its own independent
  offset. Preserves time-of-day, weekday pattern, and same-day tap-in/
  tap-out pairing. Same logic as `docker/sql/04-spread-dates-recent.sql`
  (v1.1.9), now available as an in-app tool instead of only at container
  init — useful any time the demo data goes stale between deployments.

## [1.3.9] - 2026-09-15

Patch release.

### Fixed
- **`reports_admin.php` threw `Warning: session_start(): Cannot start
  session when headers already sent`** — `session_start()` was called from
  inside a `<?php ?>` block partway down the file, after the `<!doctype
  html>` and `<head>` markup (plus a leading blank line) had already been
  output, which sends HTTP headers. The page still rendered, but
  `$_SESSION['uname']` ("Report generation requested by: ...") and the
  session-stored filter state (`$_SESSION['query']`, `$_SESSION['xfilter']`,
  etc.) were silently broken. Fixed by moving `session_start()` to the very
  first line of the file, before any output.
- **`reports_admin.php` threw `Fatal error: Uncaught Error: Call to
  undefined function clear_absents()`** on Generate — `clear_absents()` is
  defined in `lastupdate.php`, but that file was only `include`d at the very
  bottom of `reports_admin.php`, after two earlier calls to the function.
  (The same bug exists identically in `print_report_admins_TESTING.php`,
  not fixed here.) Fixed by moving the `include` to the top of the file,
  before first use. The include's own top-level cleanup queries already ran
  unconditionally on every page load either way — this only changes when in
  execution they run, not whether.

## [1.1.8] - 2026-09-15

MINOR release. Adds a reusable Docker Compose deployment — no application
code changes.

### Added
- `docker/` — Docker Compose deployment (`php:7.4-apache` + `mysql:5.7`) for
  running the app locally. Seeds the sanitized DEMO SQL dump, applies the
  v1.0.8 `migrations/` fix, and adds a Docker-only demo `CCIS` System User
  account so both roles are reachable without manual DB edits. See
  `docker/README.md` for usage.

## [1.0.8] - 2026-09-15

Patch release. All changes are backward-compatible bug fixes plus additive
deployment tooling — no breaking changes to existing schema, routes, or
behavior. Bumped 8 PATCH versions from the existing `v1.0.0` tag, one per bug
fixed below. Found and fixed while building and validating a Docker
deployment against the tagged `v1.0.0` source (the Docker deployment itself
ships separately in the next release, v1.1.8). Full walkthrough screenshots
for this validation pass are in `docs/screenshots/v1.0.8/`.

### Fixed
1. **Login broken on a fresh/default database** — `core_authenticate.php` compared
   the session role against the literal string `'System Admin'` (with a space), but
   every shipped seed dump (including the pre-cleanup "BEFORE" dump) stores the
   default admin's role as `SystemAdmin` (no space). The default admin account could
   never log in out of the box. Fixed by normalizing the comparison
   (case/whitespace-insensitive) and storing the canonical role string in the
   session so downstream per-page guards keep working unchanged.
2. **Missing `department` column** — `core_registeruser.php` and `systemusers.php`
   both read/write a `systemusers.department` column that was never defined in the
   shipped schema. This surfaced as a raw PHP warning
   (`mysqli_num_rows() expects parameter 1 to be mysqli_result, bool given`) on
   every System User dashboard load, and silently dropped the department on
   registration. Fixed with a schema migration (`ALTER TABLE systemusers ADD
   COLUMN department`) — see `migrations/v1.0.8-add-systemusers-department.sql`.
3. **User registration form (`register_new_user.php`) — Account Role value
   mismatch** — the "System Administrator" dropdown option didn't match the
   string the login logic checks for (`System Admin`), so an admin account
   created through registration could never log in. Corrected the option value.
4. **User registration form (`register_new_user.html`) — wrong/missing fields** —
   this duplicate, unreachable copy of the registration page mislabeled its only
   dropdown `urole` while populating it with department names, and had no
   `department` field at all. Left in place (not deleted, per policy) but flagged
   as dead code superseded by `register_new_user.php`.
5. **`core_registeruser.php` — SQL injection** — `uname`, `department`, and
   `urole` were concatenated into the INSERT statement unescaped. Fixed with
   `mysqli_real_escape_string`.
6. **`core_registeruser.php` / `reset_password.php` — false-positive success
   messages** — both showed "Success!" regardless of whether the underlying
   query actually succeeded. Now gated on the query result.
7. **Password reset writes to the wrong column** — `reset_password.php` ran
   `UPDATE systemusers SET password=...` but the real column is `pword`; every
   password reset silently no-opped while telling the user it succeeded. Fixed
   the column name. Also fixed login page's "Forgot Password?" link, which
   pointed at `reset_password.html` — a dead orphaned duplicate with a
   malformed `class`/`name` attribute (`class="form-control name="uid" py-4"`)
   and no form `method`/`action` at all, so it could never submit. Repointed
   the link to the working `reset_password.php`.
8. **RFID Tap In/Out pages crashed with a permissions warning in Docker** —
   `gatekeeperdevice/tap-in-new.php` (and tap-out) write scanned UID state to
   `UIDContainer.php` on disk; the container's default file ownership blocked
   the write. Fixed container image permissions. (The underlying pattern —
   using a writable `.php` file as ad-hoc state storage — is flagged as an
   architectural item for v2, not something patched here.) Before/after
   screenshots: `docs/screenshots/v1.0.8/rfid-tap-in-before-fix-php-warning.png`
   vs `rfid-tap-in-after-fix.png`.

Also flagged, unreachable and not fixed as its own bug: `msg_index.php`, an
orphaned leftover template file (nothing in the app links to it) containing
an unreplaced `ROLE` placeholder and dead links to a different project's page
names (`Plane_Geometry_Notes.php`, etc.).

### Added
- `index.php` — redirects `/` to `login.html`, since the shipped repository's
  actual `index.html` was archived as `index.rar` and never committed loose.
- `docs/screenshots/v1.0.8/` — full feature walkthrough screenshots captured
  during this validation pass (login, dashboard, users, members, tap logs,
  admin logs, reports, messaging list + edit modal, RFID tap in/out).
- `docs/v1.0.8-feature-checklist.md` — per-feature test checklist with
  pass/fail status for this release.

### Known limitations (not fixed in this release — out of scope for a patch)
- Iframe/frameset-based navigation (`target="abc_frame"`) throughout the app —
  a legacy architecture pattern. Visual design is being kept; the technique is
  being replaced in the planned v2 rewrite.
- No parameterized queries elsewhere in the codebase beyond the one injection
  fix above — the wider codebase still concatenates SQL directly. Broader
  hardening deferred to the v2 rewrite.
- `register_new_user.php`, `reset_password.php`, and `msg_index.php`'s dead
  duplicate are not linked from any in-app navigation; they're reachable only
  by direct URL. Left as-is (functionality confirmed working); wiring or
  removing them is a v2/product decision, not a bug fix.

## [1.0.0]

First tagged release (pre-existing tag; no changelog entry was kept for it).
