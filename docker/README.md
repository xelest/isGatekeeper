# Docker deployment

Local reference deployment for isGatekeeper (php:7.4-apache + mysql:5.7),
seeded from the sanitized DEMO SQL dump plus the v1.0.8 schema migration.

## Run

From the repo root:

```
docker compose -f docker/docker-compose.yml up -d --build
```

App serves at `http://localhost:8088/login.html`.

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
