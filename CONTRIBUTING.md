# Contributing to CORELASI

## Prinsip utama
- GitHub = source of truth untuk code
- Jira = source of truth untuk task, status, blocker, dan handoff
- Figma = source of truth untuk UI mockup
- WA = notifikasi cepat, bukan tempat final state proyek disimpan

## Branch strategy
- `main` = branch stabil
- buat branch kecil per scope, contoh:
  - `feature/cls-11-login-auth`
  - `feature/cls-12-dashboard-shell`
  - `fix/cls-13-login-redirect`

## Before you start
1. cek issue Jira yang Anda pegang
2. pahami deliverable dan evidence yang diminta
3. cek dependency dari UI/backend/frontend/QA lain
4. kalau ada kebingungan, comment di Jira dulu agar konteks tidak hilang

## Commit convention
Gunakan format ringan seperti:
- `feat: add login auth flow`
- `fix: correct role redirect logic`
- `docs: add jira handoff notes`

Kalau bisa, sebut issue key Jira di commit atau PR.

## Pull request rule
- satu PR untuk satu issue atau satu scope kecil yang jelas
- tulis apa yang selesai, evidence, dependency, dan impact
- jangan merge diam-diam untuk area inti tanpa review Affa

## Database rule
- jangan jadikan phpMyAdmin/manual edit sebagai source of truth schema
- perubahan struktur database harus lewat migration
- baseline data penting harus lewat seeder

## Handoff rule
Saat Anda selesai atau siap dilempar ke role lain:
1. update status issue di Jira
2. tulis comment dengan format:
   - selesai:
   - evidence:
   - blocker/dependency:
   - handoff ke:
3. mention orang berikutnya di Jira jika akunnya ada
4. kalau urgent atau teman belum terbiasa buka Jira, kirim WA singkat berisi key issue + inti handoff

## Tool split
- Figma: desain dan mockup UI
- Jira: task, owner, evidence, status, blocker
- GitHub: code, branch, PR, review
- WA: notifikasi cepat dan sinkronisasi singkat
