# CORELASI App

Repository aplikasi CORELASI.

## Baseline stack
- Laravel 11
- PHP 8.3
- Laravel Breeze (Blade auth scaffolding)
- Tailwind CSS + Alpine.js
- MySQL 8 atau MariaDB untuk target utama
- SQLite untuk bootstrap lokal cepat

## Yang sudah siap di baseline ini
- skeleton Laravel 11
- auth UI + flow dasar dari Breeze
- asset pipeline Vite + Tailwind
- migration default Laravel sudah jalan
- struktur repo untuk mulai pembagian kerja backend, frontend, dan QA

## Quick start lokal
1. Install dependency backend
   - `composer install`
2. Siapkan environment
   - `cp .env.example .env`
   - `php artisan key:generate`
3. Pilih database
   - cepat: pakai SQLite
     - `touch database/database.sqlite`
     - pastikan `.env` memakai `DB_CONNECTION=sqlite`
   - target tim: pakai MySQL/MariaDB
     - ubah `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`
4. Jalankan migration
   - `php artisan migrate`
5. Install dependency frontend
   - `npm install`
6. Jalankan development server
   - `composer run dev`
   - atau pisah: `php artisan serve` dan `npm run dev`

## Working model
- GitHub = source of truth untuk code
- Laravel migration + seeder = source of truth untuk struktur database
- local development tetap per developer
- satu shared staging dipakai untuk integration testing dan demo

## Branch strategy
- `main` = stable branch
- feature branch singkat per task / subtask
- buka PR kecil, jangan menumpuk perubahan besar di lokal

## Dokumen kerja tim
- `docs/team-working-model.md`
- `docs/implementation-kickoff-guide.md`
- `docs/pre-bootstrap-task-clarity.md`
- `docs/pbi-01-auth-lane-notes.md`
- `docs/development-workflow.md`
- `docs/jira-team-sop.md`

## Current platform foundation issues
- `CLS-26` Bootstrap GitHub repo & branch workflow
- `CLS-27` Bootstrap Laravel app baseline
- `CLS-28` Establish migration, seeding, and shared DB workflow
- `CLS-29` Prepare shared staging environment for integration
