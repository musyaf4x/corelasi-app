<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Tampilkan halaman login.
     * (FR-AKS-01 — Corelasi Web harus memverifikasi kredensial login)
     */
    public function showLoginForm()
    {
        // Jika sudah login, langsung redirect ke dashboard sesuai role
        if (Auth::check()) {
            return $this->redirectByRole(Auth::user()->primary_role);
        }
        return view('auth.login');
    }

    /**
     * Proses login: validasi credential, cek is_active, redirect per role.
     * (FR-AKS-01, FR-AKS-02)
     */
    public function login(Request $request)
    {
        // Validasi input: field login adalah email
        $credentials = $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // Auth attempt menggunakan email
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $user = Auth::user();

            // Cek akun aktif (account_status = 'Aktif')
            // Sesuai SDD: is_active / account_status harus TRUE/Aktif
            if (!$user->isActive()) {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Akun Anda tidak aktif. Hubungi administrator.',
                ])->onlyInput('email');
            }

            // Regenerate session setelah login berhasil (mitigasi session fixation)
            $request->session()->regenerate();

            // Redirect ke dashboard sesuai primary_role
            // (FR-AKS-02 — mengarahkan ke dashboard yang sesuai peran)
            return $this->redirectByRole($user->primary_role);
        }

        return back()->withErrors([
            'email' => 'email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    /**
     * Logout: invalidate session dan token.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    /**
     * Helper: redirect ke dashboard sesuai primary_role.
     * Role: admin | guru | siswa
     */
    private function redirectByRole(string $role)
    {
        return match($role) {
            'admin'  => redirect()->intended(route('admin.dashboard')),
            'guru'   => redirect()->intended(route('teacher.dashboard')),
            'siswa'  => redirect()->intended(route('student.dashboard')),
            default  => redirect('/'),
        };
    }
}
