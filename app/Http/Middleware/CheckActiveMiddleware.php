<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * CheckActiveMiddleware — Menolak akses jika akun user tidak aktif.
 *
 * Sesuai SDD tabel users: kolom account_status ENUM ('Aktif','NonAktif')
 * Sesuai SRS: "Keamanan dasar wajib: akses dibatasi oleh peran."
 *
 * Middleware ini dipasang di semua route yang memerlukan autentikasi
 * sebagai lapisan kedua setelah auth, sebelum RoleMiddleware.
 */
class CheckActiveMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && !Auth::user()->isActive()) {
            // Logout user yang akunnya sudah dinonaktifkan
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')->withErrors([
                'email' => 'Akun Anda telah dinonaktifkan. Hubungi administrator.',
            ]);
        }

        return $next($request);
    }
}
