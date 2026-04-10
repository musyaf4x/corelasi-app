<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * RoleMiddleware — Membatasi akses route berdasarkan primary_role pengguna.
 *
 * Sesuai SRS FR-AKS-05: "Corelasi Web harus membatasi akses fitur
 * berdasarkan peran utama dan penugasan peran akademik."
 * Sesuai SDD: "Route dan middleware dipisahkan menurut peran utama."
 *
 * Penggunaan di routes: middleware('role:admin'), middleware('role:guru'), middleware('role:siswa')
 */
class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        // Pastikan user sudah terautentikasi
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $userRole = $user->primary_role; // 'admin' | 'guru' | 'siswa'

        // Cek apakah role user ada di daftar role yang diizinkan
        if (!in_array($userRole, $roles)) {
            abort(403, 'Akses tidak diizinkan. Anda tidak memiliki hak akses ke halaman ini.');
        }

        return $next($request);
    }
}
