# CORELASI App

Repository aplikasi CORELASI.

## Baseline stack
- Laravel 11
- PHP 8.3
- Blade + Tailwind CSS + JavaScript ringan / Alpine.js
- MySQL 8 atau MariaDB
- Nginx + PHP-FPM

## Working model
- GitHub = source of truth untuk code
- Laravel migration + seeder = source of truth untuk struktur database
- local development tetap per developer
- satu shared staging dipakai untuk integration testing dan demo

## Branch strategy
- `main` = stable branch
- feature branches singkat

## Current platform foundation issues
- `CLS-26` Bootstrap GitHub repo & branch workflow
- `CLS-27` Bootstrap Laravel app baseline
- `CLS-28` Establish migration, seeding, and shared DB workflow
- `CLS-29` Prepare shared staging environment for integration
