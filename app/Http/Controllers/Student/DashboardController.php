<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * StudentDashboardController — Dashboard utama untuk role Siswa.
 *
 * Sesuai SRS FR-AKS-02: mengarahkan pengguna ke dashboard sesuai peran.
 * Sesuai SRS: Siswa mengakses kelas pembelajaran, daftar tugas,
 * hasil penilaian, dan riwayat absensi pribadi.
 *
 * Catatan: Implementasi penuh dikerjakan di task LMS/Submission.
 */
class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('dashboard', compact('user'));
    }
}
