# Development Workflow

## Prinsip utama
Masalah lama XAMPP bukan karena Laravel, tetapi karena struktur database diedit manual dan tidak diperlakukan sebagai code.

Karena itu workflow CORELASI adalah:
- code sinkron lewat GitHub
- struktur database sinkron lewat migration + seeder
- integration sinkron lewat staging bersama

## Daily flow developer
1. pull branch terbaru
2. jalankan migration terbaru
3. jalankan seeder bila dibutuhkan
4. kerja di feature branch
5. push branch
6. buka PR
7. update Jira issue yang relevan

## Database rule
- jangan ubah schema manual di phpMyAdmin sebagai source of truth
- perubahan schema harus lewat migration
- baseline data penting harus lewat seeder
- `.env.example` harus cukup jelas agar teammate bisa setup lokal

## Shared environment rule
- shared environment dipakai untuk integration testing, QA, dan demo
- jangan jadikan shared DB sebagai tempat semua orang ngoding harian
- local dev tetap jalan di mesin masing-masing
