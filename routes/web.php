<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route(match (Auth::user()->primary_role) {
            'admin' => 'admin.dashboard',
            'guru' => 'teacher.dashboard',
            'siswa' => 'student.dashboard',
            default => 'login',
        });
    }
    return redirect('/login');
});
Route::get('/dashboard', function () {
    if (!Auth::check()) {
        return redirect('/login');
    }
    return redirect()->route(match (Auth::user()->primary_role) {
        'admin' => 'admin.dashboard',
        'guru' => 'teacher.dashboard',
        'siswa' => 'student.dashboard',
        default => 'login',
    });
})->middleware('auth')->name('dashboard');


Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth', 'check.active', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
            ->name('dashboard');

    });

Route::middleware(['auth', 'check.active', 'role:guru'])
    ->prefix('teacher')
    ->name('teacher.')
    ->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Teacher\DashboardController::class, 'index'])
            ->name('dashboard');
        Route::get('/courses', [App\Http\Controllers\Teacher\DashboardController::class, 'courses'])
            ->name('courses');

    });
Route::middleware(['auth', 'check.active', 'role:siswa'])
    ->prefix('student')
    ->name('student.')
    ->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Student\DashboardController::class, 'index'])
            ->name('dashboard');
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
});
