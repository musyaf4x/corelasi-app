<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route(match(Auth::user()->primary_role) {
            'admin' => 'admin.dashboard',
            'guru'  => 'teacher.dashboard',
            'siswa' => 'student.dashboard',
            default => 'login',
        });
    }
    return redirect('/login');
});

// Route /dashboard sebagai fallback redirect dari guest middleware
Route::get('/dashboard', function () {
    if (!Auth::check()) {
        return redirect('/login');
    }
    return redirect()->route(match(Auth::user()->primary_role) {
        'admin' => 'admin.dashboard',
        'guru'  => 'teacher.dashboard',
        'siswa' => 'student.dashboard',
        default => 'login',
    });
})->middleware('auth')->name('dashboard');

/*
|--------------------------------------------------------------------------
| Auth Routes (Publik)
|--------------------------------------------------------------------------
| FR-AKS-01: Verifikasi kredensial login untuk Admin, Guru, dan Siswa.
| Login menggunakan field 'email'.
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    // Guest Password Reset (Breeze)
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');
    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');
    Route::post('/reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
| Sesuai SDD: Route dipisahkan menurut peran utama.
| FR-AKS-05: Membatasi akses fitur berdasarkan peran utama.
| Hanya role 'admin' (primary_role = 'admin') yang dapat mengakses.
*/
Route::middleware(['auth', 'check.active', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
            ->name('dashboard');

        // Placeholder untuk route Admin lainnya (dikerjakan di task berikutnya):
        // - Manajemen akun & penugasan peran (CLS-10, CLS-27, CLS-28)
        // - Semester aktif (UC04)
        // - Struktur akademik: kelas, mapel, jadwal
        // - Override absensi administratif
        // - Rekap operasional & ekspor
    });

/*
|--------------------------------------------------------------------------
| Teacher / Guru Routes
|--------------------------------------------------------------------------
| Hanya role 'guru' yang dapat mengakses.
| Penugasan tambahan (guru_piket, wali_kelas) diotorisasi di level controller.
*/
Route::middleware(['auth', 'check.active', 'role:guru'])
    ->prefix('teacher')
    ->name('teacher.')
    ->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Teacher\DashboardController::class, 'index'])
            ->name('dashboard');
        Route::get('/courses', [App\Http\Controllers\Teacher\DashboardController::class, 'courses'])
            ->name('courses');

        // Placeholder untuk route Guru lainnya (Teacher Schedule, Materi, dsb.)
    });

/*
|--------------------------------------------------------------------------
| Student / Siswa Routes
|--------------------------------------------------------------------------
| Hanya role 'siswa' yang dapat mengakses.
| Otorisasi granular (cek class_memberships) dilakukan di level controller.
*/
Route::middleware(['auth', 'check.active', 'role:siswa'])
    ->prefix('student')
    ->name('student.')
    ->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Student\DashboardController::class, 'index'])
            ->name('dashboard');

        // Placeholder untuk route Siswa lainnya (dikerjakan di task LMS):
        // - Akses materi & kumpulkan tugas (UC08, FR-PMB-03, FR-PMB-04)
        // - Lihat nilai & absensi pribadi
    });

/*
|--------------------------------------------------------------------------
| Shared Authenticated Routes (lintas role)
|--------------------------------------------------------------------------
| Route yang dapat diakses oleh semua role yang sudah login.
*/
Route::middleware(['auth', 'check.active'])->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'show'])
        ->name('profile.show');
    Route::put('/password', [App\Http\Controllers\PasswordController::class, 'update'])->name('password.update');
    Route::get('/profile/change-password', function () {
        return view('profile.change-password');
    })->name('password.edit');
});
