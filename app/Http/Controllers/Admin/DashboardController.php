<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * AdminDashboardController — Dashboard utama untuk role Admin.
 *
 * Sesuai SRS FR-AKS-02: mengarahkan pengguna ke dashboard sesuai peran.
 * Sesuai SDD Tabel 3.1: aktor Admin, tujuan memberikan ringkasan
 * integritas operasional semester aktif.
 *
 * Catatan: Implementasi penuh (kartu indikator, monitoring, dsb.)
 * dikerjakan di task terpisah. Controller ini adalah entry point
 * yang sudah dilindungi middleware auth + role:admin + check.active.
 */
class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('dashboard', compact('user'));
    }
}
