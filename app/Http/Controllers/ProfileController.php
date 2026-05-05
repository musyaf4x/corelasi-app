<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Tampilkan halaman profil user yang sedang login (readonly).
     * Data diambil dari session (Auth::user()), bukan dari parameter URL.
     */
    public function show(): View
    {
        $user = Auth::user();

        return view('profile.show', compact('user'));
    }
}
