# PBI-01 Auth Lane Notes

Parent story:
- `CLS-5` PBI-01 — Login & akses dashboard sesuai peran

Subtasks:
- `CLS-10` UI/UX — finalisasi alur login dan pemetaan menu per peran
- `CLS-11` Backend — implement login auth, credential validation, and role-based middleware restrictions
- `CLS-12` Frontend — implement dashboard awal dan menu berbasis peran
- `CLS-13` QA — uji login valid/invalid dan redirect peran

## Apa maksud CLS-11 secara praktis?
Ini bukan sekadar "bikin login" secara abstrak. Start yang masuk akal:
1. tentukan field login yang dipakai, mis. username atau email
2. buat route login
3. buat controller/action untuk handle submit login
4. validasi input
5. cek credential ke tabel `users`
6. kalau valid, buat session login
7. kalau invalid, kembalikan error yang jelas
8. tambahkan middleware berbasis role
9. batasi akses halaman menurut role
10. sepakati redirect setelah login bersama UI/frontend

## Output minimal untuk lane PBI-01
### UI/UX
- flow login final
- error state login
- menu per role

### Backend
- auth route/controller
- session login jalan
- middleware role jalan
- invalid login ditolak jelas

### Frontend
- form login
- dashboard shell
- sidebar/menu sesuai role

### QA
- login valid
- login invalid
- redirect role benar
- akses halaman diblok saat role tidak sesuai

## Dependency order
- `CLS-10` membantu mengunci arah
- `CLS-11` dan `CLS-12` bisa jalan paralel setelah flow cukup jelas
- `CLS-13` mulai saat backend+frontend lane pertama sudah nyambung
