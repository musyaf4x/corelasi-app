# Pre-Bootstrap Task Clarity

Dokumen ini menjawab kebingungan utama sebelum Laravel scaffold masuk ke repo.

## Inti aturan
Sebelum bootstrap Laravel selesai, beberapa task **belum masuk coding real**, tetapi itu **bukan berarti hanya "mapping di kepala"**.

Yang dimaksud **pre-bootstrap work** adalah membuat **artifact kerja nyata** yang nanti langsung dipakai saat coding dimulai.

Artifact itu harus hidup di platform yang jelas:
- **Figma** untuk visual UI/mockup
- **Jira comment** untuk status, keputusan, blocker, handoff
- **GitHub repo docs** untuk catatan implementasi, kontrak perilaku, route list, field list, dan workflow
- **WA** hanya untuk notifikasi cepat, bukan tempat final truth

## Fase kerja
### Fase A — Pre-bootstrap
Belum coding Laravel real, tetapi sudah membuat artifact implementasi.

### Fase B — Post-bootstrap
Laravel baseline sudah ada di repo, lalu task pindah ke implementasi code nyata.

---

## CLS-10 — UI/UX Login Flow
### Fase A
Platform:
- Figma
- Jira comment

Artifact yang harus jadi:
- login flow final
- error state login
- redirect per role
- menu matrix per role

### Fase B
Tidak banyak coding di task ini. Tugas ini jadi dasar untuk backend/frontend.

---

## CLS-11 — Backend Login Auth
### Fase A
Platform:
- Jira comment
- GitHub repo docs

Artifact yang harus jadi:
- pilihan field login: username atau email
- daftar route auth minimum
- daftar role yang dikenali saat login
- redirect target per role
- halaman yang harus dibatasi middleware
- catatan alur login valid/invalid

Bentuk artifact yang benar:
- bukan kode Laravel dulu
- tapi kontrak implementasi tertulis yang bisa langsung diterjemahkan jadi code nanti

### Fase B
Baru implementasi:
- route login/logout
- controller auth
- validasi credential
- session login
- middleware role

---

## CLS-12 — Frontend Login + Dashboard Shell
### Fase A
Platform:
- Figma
- Jira comment
- GitHub repo docs jika perlu

Artifact yang harus jadi:
- daftar komponen login form
- daftar state error/sukses
- struktur dashboard shell
- sidebar/menu per role
- dependency ke backend bila ada field/behavior yang belum jelas

### Fase B
Baru implementasi:
- Blade login page
- dashboard shell
- sidebar/menu role-based
- integrasi error state dari backend

---

## CLS-13 — QA Login Lane
### Fase A
Platform:
- Jira comment
- dokumen test note sederhana

Artifact yang harus jadi:
- test scenario login valid
- test scenario login invalid
- test redirect per role
- test akses halaman yang harus diblok

### Fase B
Baru testing pada build nyata.

---

## CLS-14 — UI/UX Profile Read-Only
### Fase A
Platform:
- Figma
- Jira comment

Artifact:
- layout profil
- field mana yang tampil
- field mana yang read-only
- perbedaan tampilan per role jika ada

## CLS-15 — Backend Profile Read-Only
### Fase A
Platform:
- Jira comment
- GitHub repo docs

Artifact:
- route profile
- field data yang diload
- aturan self-only access
- batasan field yang tidak bisa diedit

### Fase B
Implementasi controller, query data, dan guard access.

## CLS-16 — QA Profile
### Fase A
Artifact:
- skenario akses profile sendiri
- skenario coba akses profile orang lain
- verifikasi read-only field

---

## CLS-17 — UI/UX Change Password
### Fase A
Platform:
- Figma
- Jira comment

Artifact:
- layout form ubah password
- validation copy
- success state
- fail state

## CLS-18 — Backend Change Password
### Fase A
Platform:
- Jira comment
- GitHub repo docs

Artifact:
- field yang dibutuhkan
- urutan validasi password lama -> password baru
- rule error message utama
- dependency ke frontend untuk form behavior

### Fase B
Implementasi endpoint/logic ubah password dan hashing.

## CLS-19 — QA Change Password
### Fase A
Artifact:
- test password lama salah
- test password baru valid
- test password baru gagal rule tertentu

---

## CLS-20 — UI/UX Account Management
### Fase A
Platform:
- Figma
- Jira comment

Artifact:
- tabel akun admin
- form tambah/edit akun
- state aktif/nonaktif
- penempatan tombol reset password

## CLS-21 — Backend Account CRUD
### Fase A
Platform:
- Jira comment
- GitHub repo docs

Artifact:
- field data akun yang wajib ada
- validasi username/role/status
- daftar action CRUD minimum
- dependency ke migration baseline

### Fase B
Implementasi CRUD akun dan status aktif/nonaktif.

## CLS-22 — QA Account CRUD
### Fase A
Artifact:
- skenario tambah akun
- skenario edit akun
- skenario aktif/nonaktif akun

---

## CLS-23 — Backend Reset Password Admin
### Fase A
Platform:
- Jira comment
- GitHub repo docs

Artifact:
- alur admin reset password
- expected outcome setelah reset
- dependency ke UI reset control
- dependency ke QA scenario

### Fase B
Implementasi action reset password dan hashing password baru.

## CLS-24 — Frontend Reset Password Control
### Fase A
Platform:
- Figma
- Jira comment

Artifact:
- posisi tombol reset
- dialog/state konfirmasi
- feedback setelah reset sukses/gagal

### Fase B
Implementasi control di account-management module.

## CLS-25 — QA Reset Password
### Fase A
Artifact:
- skenario reset berhasil
- skenario login pertama pasca-reset
- skenario reset gagal / unauthorized

---

## CLS-26 sampai CLS-29
### CLS-26
Sudah selesai: repo dan branch workflow baseline.

### CLS-27
Task bootstrap Laravel baseline. Ini adalah gerbang utama ke coding real.

### CLS-28
Artifact pre-bootstrap yang valid:
- migration-first workflow note
- baseline schema auth/access
- seeding strategy

### CLS-29
Artifact pre-bootstrap yang valid:
- staging plan
- machine target
- deploy flow minimum

---

## Jadi jawaban paling singkat untuk kebingungan ini
Kalau sebuah task masih pre-bootstrap, artinya:
- **belum coding Laravel real**
- tapi **tetap menghasilkan artifact kerja nyata**
- artifact itu dibuat di platform yang sesuai, bukan sekadar dipikirkan

## Platform ringkas per role
### UI/UX
Utama: Figma + Jira

### Backend
Utama: Jira + repo docs
Nanti: coding di GitHub repo setelah bootstrap

### Frontend
Utama: Figma + Jira + repo docs bila perlu
Nanti: coding di GitHub repo setelah bootstrap

### QA
Utama: Jira test scenarios
Nanti: test execution setelah build tersedia
