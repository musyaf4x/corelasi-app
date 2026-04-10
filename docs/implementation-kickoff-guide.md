# Implementation Kickoff Guide

## 1. Pertanyaan paling penting: apakah tiap orang harus `git init` dulu?
**Tidak.**

Repo CORELASI **sudah ada** dan sudah menjadi source of truth:
- https://github.com/musyaf4x/corelasi-app

Jadi alur yang benar untuk backend/frontend nanti adalah:
1. dapat akses ke repo GitHub
2. **clone** repo yang sudah ada
3. checkout branch kerja masing-masing
4. kerja di branch itu
5. push branch
6. buka PR

Yang **tidak** dilakukan:
- jangan bikin repo baru sendiri
- jangan `git init` project CORELASI dari nol di laptop masing-masing
- jangan bikin remote masing-masing untuk app yang sama

## 2. Kondisi repo saat ini
Saat ini repo sudah berisi:
- README
- aturan kontribusi
- SOP Jira
- team working model
- catatan lane PBI-01

Tetapi repo **belum** berisi Laravel scaffold nyata, karena environment bootstrap (PHP + Composer + DB runtime) belum dijalankan di machine yang siap.

Jadi ada 2 fase kerja:

### Fase A, pre-bootstrap
Boleh mulai sekarang.
Fokus: kejelasan arah, kontrak kerja, dan dependency.

### Fase B, post-bootstrap
Mulai saat baseline Laravel sudah dipush ke repo.
Fokus: coding real di codebase Laravel.

## 3. Jadi backend dan frontend bisa mulai atau belum?
### Khansa / UI
Bisa mulai **sekarang**.
Karena kerja utamanya berbasis Figma + flow + freeze decision.

### Backend dan Frontend
**Bisa mulai sebagian sekarang, tapi belum coding real penuh.**

Yang bisa dimulai sekarang:
- pahami task Jira
- pahami Figma/UI flow
- kunci decision yang dibutuhkan coding nanti
- tentukan kontrak perilaku fitur
- siapkan branch plan
- siapkan handoff structure

Yang menunggu bootstrap:
- implement route/controller/view Laravel real
- middleware nyata
- migration nyata
- integrasi full code di repo app

## 4. Start konkret untuk CLS-11 Backend
Issue: `CLS-11` Implementasi autentikasi login dan middleware akses

### Fase A, mulai sekarang
1. baca hasil final dari `CLS-10`
2. putuskan field login yang dipakai: username atau email
3. tulis route yang dibutuhkan, minimal:
   - `GET /login`
   - `POST /login`
   - `POST /logout`
4. tulis tabel minimum yang dibutuhkan di lane auth, terutama `users`
5. tentukan role apa saja yang dipakai di level login:
   - admin
   - guru
   - siswa
6. tentukan redirect target per role setelah login
7. tentukan halaman apa saja yang harus dibatasi oleh middleware per role
8. comment hasil keputusan di Jira supaya frontend dan Affa lihat konteks yang sama

### Fase B, setelah Laravel bootstrap masuk repo
1. clone/pull repo terbaru
2. buat branch contoh: `feature/cls-11-login-auth`
3. implement route login/logout
4. implement controller/auth action
5. implement validasi credential input
6. implement cek user + password
7. implement session login
8. implement middleware role-based access
9. test secara lokal
10. push branch + update Jira + handoff ke frontend/QA

## 5. Start konkret untuk CLS-12 Frontend
Issue: `CLS-12` Implementasi dashboard awal dan menu berbasis peran

### Fase A, mulai sekarang
1. buka Figma CORELASI
2. ambil screen login dan dashboard sebagai base
3. catat komponen yang dibutuhkan:
   - form login
   - error message
   - dashboard shell
   - sidebar/menu
   - state per role
4. catat menu apa yang tampil untuk tiap role
5. tentukan state minimal setelah login sukses dan gagal
6. comment di Jira kalau ada dependency ke backend atau UI yang belum jelas

### Fase B, setelah Laravel bootstrap masuk repo
1. clone/pull repo terbaru
2. buat branch contoh: `feature/cls-12-dashboard-shell`
3. implement Blade view untuk login
4. implement dashboard shell
5. implement sidebar/menu berbasis role
6. integrasikan error state login dari backend
7. push branch + update Jira + handoff ke QA/Affa

## 6. Handoff konkret backend/frontend
Contoh saat backend selesai lane awal auth:
- issue: `CLS-11`
- Jira comment:
  - selesai: route login/logout, validasi login, middleware role dasar
  - evidence: branch/commit/PR link
  - blocker/dependency: masih pakai role map final dari CLS-10 versi tanggal X
  - handoff ke: Fadhli, Nashbilla, Affa

Jika urgent:
- kirim WA singkat: `CLS-11 ready untuk frontend integrate, detail di Jira.`

## 7. Next hard blocker
Agar backend/frontend masuk fase coding penuh, masih dibutuhkan:
- machine bootstrap dengan PHP + Composer + database runtime
- lalu baseline Laravel pertama dipush ke repo

Setelah itu backend/frontend tidak perlu bingung lagi. Mereka tinggal clone, branch, coding, push.
