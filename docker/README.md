# Docker deployment

Local reference deployment for isGatekeeper (php:7.4-apache + mysql:5.7),
seeded from the sanitized DEMO SQL dump plus the v1.0.8 schema migration.

## Run

From the repo root:

```
docker compose -f docker/docker-compose.yml up -d --build
```

App serves at `http://localhost:8088/` (redirects to the login page).

## Why the container mirrors the real folder layout

The app's code — both PHP-side file paths and browser-side links — assumes
the real production layout: `gatekeeperdevice/` sits two directories above
`dist/`, as a sibling of `CCIS GateKeeper/`. The container preserves that
exact nesting (`/var/www/html/CCIS GateKeeper/dist/...` and
`/var/www/html/gatekeeperdevice/...`) rather than flattening everything into
one webroot, so relative paths like `../../gatekeeperdevice/UIDContainer.php`
resolve correctly on both sides. `docker/root-index.php` just gives the bare
`/` a friendly redirect into the app.

## Why `localhost` works for MySQL despite two containers

Most of the app's PHP files (all but the ones patched in v1.0.8) connect to
MySQL with host `"localhost"`. PHP's mysqli treats that as "connect via a
local Unix socket file," not TCP — so container-to-container networking
alone doesn't satisfy it. `docker-compose.yml` shares a `mysql-socket`
volume between `db` and `app` at `/var/run/mysqld`, so the real socket file
that MySQL creates is visible at the same path inside the app container.
The Dockerfile also sets `mysqli.default_socket` explicitly, since this
image's PHP is compiled with a different default socket path
(`/tmp/mysql.sock`) than where the mysql:5.7 image puts it.

## Default credentials

- System Admin: `admin` / `admin`
- System User: `CCIS` / `CCIS`

## What gets seeded

Init order (`docker-entrypoint-initdb.d`, alphabetical):

1. `sql/01-schema.sql` — full schema + sanitized demo data (`mclccisn_gatekeeper DEMO.sql`)
2. `../migrations/v1.0.8-add-systemusers-department.sql` — the v1.0.8 schema fix (canonical source, not duplicated here)
3. `sql/02-demo-seed.sql` — Docker-demo-only: seeds the `CCIS` System User account

## Stop

```
docker compose -f docker/docker-compose.yml down -v
```
