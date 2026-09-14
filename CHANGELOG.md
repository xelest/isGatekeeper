# Changelog

All notable changes to isGatekeeper are documented here.
Versioning follows [Semantic Versioning](https://semver.org/): `MAJOR.MINOR.PATCH`.

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
