@extends('layouts.authenticated')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-[60vh] w-full bg-white rounded-2xl shadow-sm border border-[#E2E8F0] gap-4 p-8">
        <h1 class="text-4xl font-bold text-[#1E293B]">Dashboard Siswa</h1>
        <p class="text-[#64748B] mb-4 text-center">Selamat datang di portal akademik Anda.</p>
        <div class="w-full max-w-sm flex flex-col gap-2">
            <a href="{{ route('profile.show') }}" 
               class="w-full text-left px-4 py-3 text-sm text-[#1E293B] bg-[#F8FAFC] border border-[#E2E8F0] hover:bg-gray-100 hover:border-gray-300 font-bold flex items-center gap-3 transition-colors rounded-xl">
                <div class="w-8 h-8 rounded bg-gray-200 flex items-center justify-center text-gray-600">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                Profil Pengguna
            </a>
            <form method="POST" action="{{ route('logout') }}" class="w-full mt-2">
                @csrf
                <button type="submit"
                    class="w-full text-left px-4 py-3 text-sm text-red-600 bg-red-50 border border-red-100 hover:bg-red-100 font-bold flex items-center gap-3 transition-colors rounded-xl">
                    <div class="w-8 h-8 rounded bg-red-200/50 flex items-center justify-center text-red-600">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                            </path>
                        </svg>
                    </div>
                    Logout Sistem
                </button>
            </form>
        </div>
    </div>
@endsection