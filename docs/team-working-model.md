# CORELASI Team Working Model

## 1. Tool roles
### Figma
Dipakai untuk source of truth UI mockup.
- link utama UI: https://www.figma.com/design/B6ZanLkWPt20hVl3ZnzfKq/CORELASI?node-id=0-1&t=bXrwdJZjwhDwkk97-1
- khusus UI task, referensi final visual harus balik ke Figma

### Jira
Dipakai untuk:
- siapa pegang task apa
- status kerja
- blocker/dependency
- evidence kerja
- handoff antar role

### GitHub
Dipakai untuk:
- source of truth code
- branch kerja
- pull request
- review perubahan

### WA
Dipakai untuk:
- notifikasi cepat
- nanya hal singkat
- ping ketika handoff urgent

WA bukan tempat final truth proyek. Final truth tetap di Jira + GitHub + Figma.

## 2. Apa arti "handoff ke"
"Handoff ke" artinya pekerjaan Anda sudah sampai titik yang bisa dipakai role lain, dan Anda harus menyerahkan konteksnya dengan rapi.

### Cara handoff yang benar
1. update issue di Jira
2. comment dengan format:
   - selesai:
   - evidence:
   - blocker/dependency:
   - handoff ke:
3. kalau user Jira orang tujuan sudah ada, mention di comment
4. kalau urgent atau takut tidak terbaca cepat, kirim WA singkat: `CLS-11 ready, silakan lanjut integrasi`.

### Jadi handoff pakai apa?
Jawaban terbaik: **utama di Jira, notifikasi tambahan via WA bila perlu**.

## 3. Aturan umum role
### UI/UX
- pakai Figma sebagai base visual
- flow note boleh di luar Figma kalau lebih cepat
- tapi keputusan final harus balik ke Jira comment

### Backend
- fokus pada route, controller, middleware, migration, validation, service logic
- jangan mulai dari editing DB manual
- semua schema change harus masuk migration

### Frontend
- ambil acuan visual dari Figma
- ambil aturan data/behavior dari Jira + backend handoff
- kalau pakai dummy data, tulis itu di Jira comment

### QA
- mulai testing segera setelah ada lane yang terintegrasi
- jangan nunggu semua fitur selesai total
- tulis pass/fail dan langkah reproduksi bug di Jira

### Affa / Tech Lead
- menjaga arah teknis
- memastikan issue tidak kabur
- memastikan handoff benar-benar terjadi
- review hasil integrasi

## 4. Model kerja harian
1. buka Jira
2. cek issue yang dipegang
3. kerjakan di branch GitHub
4. saat ada progres berarti, update Jira
5. saat siap diteruskan, lakukan handoff
6. saat selesai, attach evidence

## 5. Rule singkat untuk menghindari chaos
- jangan simpan keputusan penting hanya di WA
- jangan ubah DB manual lalu berharap semua orang ikut sinkron
- jangan biarkan issue tanpa update berhari-hari
- jangan handoff tanpa evidence yang jelas
