<x-app-layout>
@php
    $role = $user->primary_role; // admin | guru | siswa
    $dashRoute = match($role) {
        'admin' => 'admin.dashboard',
        'guru'  => 'teacher.dashboard',
        'siswa' => 'student.dashboard',
        default => 'dashboard',
    };
    $navItems = match($role) {
        'siswa' => [
            ['label' => 'Beranda',           'icon' => 'home'],
            ['label' => 'Pengumpulan Tugas', 'icon' => 'upload'],
            ['label' => 'Jadwal Kelas',      'icon' => 'calendar'],
            ['label' => 'Nilai Akademik',    'icon' => 'star'],
            ['label' => 'Perpustakaan',      'icon' => 'book'],
        ],
        default => [
            ['label' => 'Administrasi Akademik', 'icon' => 'book'],
            ['label' => 'Presensi Sesi Aktif',   'icon' => 'clock'],
            ['label' => 'Verifikasi Absensi',     'icon' => 'check'],
            ['label' => 'Materi dan Tugas',       'icon' => 'book2'],
            ['label' => 'Pengumpulan Tugas',      'icon' => 'upload'],
            ['label' => 'Penilaian Tugas',        'icon' => 'checklist'],
            ['label' => 'Jurnal Pertemuan',       'icon' => 'flask'],
            ['label' => 'Rekap Operasional',      'icon' => 'chart'],
        ],
    };
    $roleLabel = match($role) {
        'admin' => 'Admin',
        'guru'  => 'Guru Pengampu',
        'siswa' => 'Siswa',
        default => ucfirst($role),
    };
@endphp

<!-- Left Sidebar -->
<aside class="w-64 bg-white border-r border-[#E2E8F0] min-h-screen flex flex-col fixed left-0 top-0 z-20 shadow-sm hidden md:flex">
    <!-- Logo Area -->
    <div class="p-6 pb-8 border-b-0 border-[#E2E8F0] flex items-center gap-3">
        <div class="w-10 h-10 bg-[#2D7336] rounded text-white flex items-center justify-center shadow-sm">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 10H20V20H4V10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M12 2L2 7L12 12L22 7L12 2Z" fill="currentColor" />
                <path d="M8 10V20" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                <path d="M16 10V20" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
            </svg>
        </div>
        <div>
            <h2 class="text-base font-bold text-[#1E293B] leading-tight">CORELASI</h2>
            <span class="text-[10px] text-[#64748B] tracking-wide uppercase font-semibold">Sistem Operasional</span>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 px-4 py-4 space-y-1 overflow-y-auto no-scrollbar">
        @foreach($navItems as $item)
        <a href="{{ in_array($item['label'], ['Beranda', 'Administrasi Akademik']) ? route($dashRoute) : '#' }}" class="flex items-center gap-3 px-3 py-2.5 text-[#64748B] hover:bg-gray-50 hover:text-[#1E293B] rounded-md font-medium text-sm transition-colors">
            @if($item['icon'] === 'home')
                <svg class="w-5 h-5 flex-shrink-0 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            @elseif($item['icon'] === 'upload')
                <svg class="w-5 h-5 flex-shrink-0 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
            @elseif($item['icon'] === 'calendar')
                <svg class="w-5 h-5 flex-shrink-0 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            @elseif($item['icon'] === 'star')
                <svg class="w-5 h-5 flex-shrink-0 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
            @elseif($item['icon'] === 'clock')
                <svg class="w-5 h-5 flex-shrink-0 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            @elseif($item['icon'] === 'check')
                <svg class="w-5 h-5 flex-shrink-0 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            @elseif($item['icon'] === 'checklist')
                <svg class="w-5 h-5 flex-shrink-0 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
            @elseif($item['icon'] === 'flask')
                <svg class="w-5 h-5 flex-shrink-0 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
            @elseif($item['icon'] === 'chart')
                <svg class="w-5 h-5 flex-shrink-0 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
            @else
                <svg class="w-5 h-5 flex-shrink-0 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477-4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            @endif
            {{ $item['label'] }}
        </a>
        @endforeach
    </nav>

    <!-- Bottom Menu -->
    <div class="px-4 py-4 border-t border-[#E2E8F0] space-y-1">
        <a href="#" class="flex items-center gap-3 px-3 py-2.5 text-[#64748B] hover:bg-gray-50 hover:text-[#1E293B] rounded-md font-medium text-sm transition-colors">
            <svg class="w-5 h-5 flex-shrink-0 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            Pengaturan
        </a>

        @if($role === 'siswa')
        <div class="mt-4 px-3 py-3 bg-[#F8FAFC] rounded-lg">
            <div class="text-[10px] text-[#64748B] font-semibold mb-1.5">Status Keaktifan</div>
            <div class="flex items-center gap-2 text-xs text-[#1E293B] font-medium">
                <span class="w-2 h-2 rounded-full bg-green-500 inline-block"></span>
                Aktif • Smt Ganjil
            </div>
        </div>
        @endif

        <form method="POST" action="{{ route('logout') }}" class="mt-2">
            @csrf
            <button type="submit" class="flex items-center gap-3 px-3 py-2.5 text-[#64748B] hover:bg-red-50 hover:text-red-600 rounded-md font-medium text-sm transition-colors w-full">
                <svg class="w-5 h-5 flex-shrink-0 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                Keluar
            </button>
        </form>
    </div>
</aside>

<!-- Main Content Area -->
<div class="md:ml-64 flex-1 flex flex-col min-h-screen relative w-full bg-[#F8FAFC]">
    <!-- Top Navigation Header -->
    <header class="h-16 border-b border-[#E2E8F0] bg-white/80 backdrop-blur top-0 z-10 flex items-center justify-between px-4 md:px-8 absolute w-full">
        <!-- Left: Semester Info -->
        <div>
            <button class="flex items-center gap-2 bg-gray-100/80 hover:bg-gray-200/80 text-gray-700 py-1.5 px-3 rounded-full text-sm font-medium transition-colors border border-gray-200">
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span class="hidden sm:inline">Semester Ganjil 2023/2024</span>
                <span class="sm:hidden">Smt Ganjil</span>
            </button>
        </div>

        <!-- Right: Profile & Notifications -->
        <div class="flex items-center gap-4 md:gap-6">
            <!-- Notifications -->
            <button class="relative text-gray-400 hover:text-gray-600 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                </svg>
            </button>

            <!-- Profile -->
            <div class="flex items-center gap-3 cursor-pointer">
                <div class="text-right flex flex-col justify-center hidden sm:flex">
                    <span class="text-sm font-bold text-[#1E293B] leading-tight">{{ $user->name }}</span>
                    <span class="text-xs text-[#94A3B8]">{{ ucfirst($user->primary_role) }} Access</span>
                </div>
                <div class="w-9 h-9 rounded-full bg-gray-200 border border-gray-300 overflow-hidden">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=1E293B&color=fff" alt="{{ $user->name }}" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </header>

    <!-- Content -->
    <!-- Add pt-24 to account for absolute header -->
    <main class="flex-1 p-4 md:p-8 pt-20 md:pt-24 flex">
        <div class="w-full">
            <h1 class="text-2xl md:text-3xl font-bold text-[#1E293B] mb-1">Profile</h1>
            <p class="text-sm text-[#64748B] mb-6">Profile (Read Only Mode)</p>

            <!-- Avatar Card -->
            <div class="bg-white rounded-xl shadow-[0_1px_3px_0_rgb(0,0,0,0.02)] border border-[#E2E8F0] p-6 md:p-8 mb-6 flex flex-col sm:flex-row items-center sm:items-start gap-6">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=c7d2fe&color=3730a3&size=160&bold=true"
                     class="w-24 h-24 rounded-full object-cover shadow-sm flex-shrink-0" alt="{{ $user->name }}">
                <div class="flex-1 text-center sm:text-left mt-2 sm:mt-0">
                    <div class="flex items-center justify-center sm:justify-start gap-2 mb-2">
                        <svg class="w-4 h-4 text-[#1E293B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        <span class="text-lg font-bold text-[#1E293B]">{{ $user->name }}</span>
                    </div>
                    <span class="inline-flex items-center gap-1.5 bg-[#2D7336] text-white text-sm font-semibold px-4 py-1.5 rounded-md mb-3">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                        {{ $roleLabel }}
                    </span>
                    <div class="text-sm text-[#64748B]">Profile (Read Only Mode)</div>
                </div>
            </div>

            <!-- Data Diri Card -->
            <div class="bg-white rounded-xl shadow-[0_1px_3px_0_rgb(0,0,0,0.02)] border border-[#E2E8F0] p-6 md:p-8 mb-6">
                <h2 class="flex items-center gap-2 text-xl font-bold text-[#1E293B] mb-5">
                    <svg class="w-5 h-5 text-[#1E293B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    Data Diri
                </h2>
                <div class="space-y-3">
                    <div class="flex flex-col sm:flex-row sm:items-center bg-[#F8FAFC] rounded-md px-4 py-3">
                        <div class="text-[#64748B] text-sm font-medium w-48 mb-1 sm:mb-0">Nama Lengkap</div>
                        <div class="text-[#1E293B] text-sm font-medium">{{ $user->name }}</div>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center bg-[#F8FAFC] rounded-md px-4 py-3">
                        <div class="text-[#64748B] text-sm font-medium w-48 mb-1 sm:mb-0">Email</div>
                        <div class="text-[#1E293B] text-sm font-medium">{{ $user->email }}</div>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center bg-[#F8FAFC] rounded-md px-4 py-3">
                        <div class="text-[#64748B] text-sm font-medium w-48 mb-1 sm:mb-0">No Induk (NIS/NIP)</div>
                        <div class="text-[#1E293B] text-sm font-medium">{{ $user->nomor_induk ?? '-' }}</div>
                    </div>
                </div>
            </div>

            <!-- Role-Specific Section -->
            @if($role === 'admin')
            <div class="bg-white rounded-xl shadow-[0_1px_3px_0_rgb(0,0,0,0.02)] border border-[#E2E8F0] p-6 md:p-8">
                <h2 class="flex items-center gap-2 text-xl font-bold text-[#1E293B] mb-5">
                    <svg class="w-5 h-5 text-[#1E293B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    Akun
                </h2>
                <div class="space-y-3">
                    <div class="flex flex-col sm:flex-row sm:items-center bg-[#F8FAFC] rounded-md px-4 py-3">
                        <div class="text-[#64748B] text-sm font-medium w-48 mb-1 sm:mb-0">Username</div>
                        <div class="text-[#1E293B] text-sm font-medium">{{ explode('@', $user->email)[0] }}</div>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center bg-[#F8FAFC] rounded-md px-4 py-3">
                        <div class="text-[#64748B] text-sm font-medium w-48 mb-1 sm:mb-0">Role</div>
                        <div class="text-[#1E293B] text-sm font-medium">{{ ucfirst($user->role) }}</div>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center bg-[#F8FAFC] rounded-md px-4 py-3">
                        <div class="text-[#64748B] text-sm font-medium w-48 mb-1 sm:mb-0">Status</div>
                        <div>
                            <span class="inline-flex items-center bg-[#16A34A] text-white text-xs font-bold px-3 py-1 rounded">
                                {{ $user->account_status ?? 'Aktif' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            @elseif($role === 'siswa')
            <div class="bg-white rounded-xl shadow-[0_1px_3px_0_rgb(0,0,0,0.02)] border border-[#E2E8F0] p-6 md:p-8">
                <h2 class="flex items-center gap-2 text-xl font-bold text-[#1E293B] mb-5">
                    <svg class="w-5 h-5 text-[#1E293B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    Akademik
                </h2>
                <div class="space-y-3">
                    <div class="flex flex-col sm:flex-row sm:items-center bg-[#F8FAFC] rounded-md px-4 py-3">
                        <div class="text-[#64748B] text-sm font-medium w-48 mb-1 sm:mb-0">Kelas</div>
                        <div class="text-[#1E293B] text-sm font-medium">X / XI / XII</div>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center bg-[#F8FAFC] rounded-md px-4 py-3">
                        <div class="text-[#64748B] text-sm font-medium w-48 mb-1 sm:mb-0">Wali Kelas</div>
                        <div class="text-[#1E293B] text-sm font-medium">-</div>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center bg-[#F8FAFC] rounded-md px-4 py-3">
                        <div class="text-[#64748B] text-sm font-medium w-48 mb-1 sm:mb-0">Tahun Ajaran</div>
                        <div class="text-[#1E293B] text-sm font-medium">2023 / 2024</div>
                    </div>
                </div>
            </div>

            @elseif($role === 'guru')
            <div class="bg-white rounded-xl shadow-[0_1px_3px_0_rgb(0,0,0,0.02)] border border-[#E2E8F0] p-6 md:p-8 mb-6">
                <h2 class="flex items-center gap-2 text-xl font-bold text-[#1E293B] mb-5">
                    <svg class="w-5 h-5 text-[#1E293B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    Jadwal Mengajar
                </h2>
                <div class="space-y-3">
                    <div class="flex flex-col sm:flex-row sm:items-center bg-[#F8FAFC] rounded-md px-4 py-3">
                        <div class="text-[#64748B] text-sm font-medium w-48 mb-1 sm:mb-0">Mata Pelajaran</div>
                        <div class="text-[#1E293B] text-sm font-medium">-</div>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center bg-[#F8FAFC] rounded-md px-4 py-3">
                        <div class="text-[#64748B] text-sm font-medium w-48 mb-1 sm:mb-0">Kelas</div>
                        <div class="text-[#1E293B] text-sm font-medium">-</div>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center bg-[#F8FAFC] rounded-md px-4 py-3">
                        <div class="text-[#64748B] text-sm font-medium w-48 mb-1 sm:mb-0">Jumlah Kelas</div>
                        <div class="text-[#1E293B] text-sm font-medium">-</div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Ubah Password Card -->
            <div class="bg-white rounded-xl shadow-[0_1px_3px_0_rgb(0,0,0,0.02)] border border-[#E2E8F0] p-6 md:p-8">
                <h2 class="flex items-center gap-2 text-xl font-bold text-[#1E293B] mb-5">
                    <svg class="w-5 h-5 text-[#1E293B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    Ubah Password
                </h2>
                
                @if (session('status') === 'password-updated')
                    <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">Password berhasil diperbarui.</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="current_password" class="block text-sm font-medium text-[#64748B] mb-1">Password Lama</label>
                        <input id="current_password" name="current_password" type="password" required
                               class="w-full rounded-md border-[#E2E8F0] shadow-sm focus:border-[#2D7336] focus:ring focus:ring-[#2D7336] focus:ring-opacity-50"
                               autocomplete="current-password">
                        @error('current_password')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-[#64748B] mb-1">Password Baru</label>
                        <input id="password" name="password" type="password" required
                               class="w-full rounded-md border-[#E2E8F0] shadow-sm focus:border-[#2D7336] focus:ring focus:ring-[#2D7336] focus:ring-opacity-50"
                               autocomplete="new-password">
                        @error('password')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-[#64748B] mb-1">Konfirmasi Password Baru</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                               class="w-full rounded-md border-[#E2E8F0] shadow-sm focus:border-[#2D7336] focus:ring focus:ring-[#2D7336] focus:ring-opacity-50"
                               autocomplete="new-password">
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-[#2D7336] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#235c2b] focus:bg-[#235c2b] active:bg-[#1a4420] focus:outline-none focus:ring-2 focus:ring-[#2D7336] focus:ring-offset-2 transition ease-in-out duration-150">
                            Simpan Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
</x-app-layout>
