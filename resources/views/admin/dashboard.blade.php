@if(isset($user) && $user->primary_role === 'guru')
    @include('teacher.dashboard')
@elseif(isset($user) && $user->primary_role === 'siswa')
    @include('student.dashboard')
@@else
    @extends('layouts.authenticated')

    @section('content')
        <div class="flex flex-col xl:flex-row gap-8 w-full">
            <!-- Main Content Area (Left Col) -->
            <div class="flex-1 flex flex-col min-w-0">
                    <!-- Greeting -->
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-[#1E293B] mb-2 tracking-tight">Selamat Datang,
                            {{ $user->name ?? 'Administrator' }}
                        </h1>
                        <p class="text-base text-[#64748B]">Pantau integritas operasional dan aktivitas akademik hari ini.
                        </p>
                    </div>

                    <!-- 3 Stat Cards Row -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-10">
                        <!-- Sesi Aktif -->
                        <div class="bg-white rounded-2xl border border-[#E2E8F0] p-5 shadow-[0_1px_3px_0_rgb(0,0,0,0.02)]">
                            <div class="flex justify-between items-start mb-4">
                                <div
                                    class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center text-[#2D7336]">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span
                                    class="bg-green-100 text-[#2D7336] text-[11px] font-bold px-2 py-0.5 rounded-full uppercase tracking-wider">LIVE</span>
                            </div>
                            <h3 class="text-[#64748B] text-sm font-semibold mb-1">Sesi Aktif</h3>
                            <div class="text-3xl font-bold text-[#1E293B] mb-3">12</div>
                            <div class="flex items-start gap-1 text-xs text-[#64748B]">
                                <svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                                <span class="leading-tight">2 sesi baru dalam 1 jam<br>terakhir</span>
                            </div>
                        </div>

                        <!-- Verifikasi Tertunda -->
                        <div class="bg-white rounded-2xl border border-[#E2E8F0] p-5 shadow-[0_1px_3px_0_rgb(0,0,0,0.02)]">
                            <div class="flex justify-between items-start mb-4">
                                <div
                                    class="w-10 h-10 rounded-xl bg-gray-50 flex items-center justify-center text-[#64748B]">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <h3 class="text-[#64748B] text-sm font-semibold mb-1">Verifikasi Tertunda</h3>
                            <div class="text-3xl font-bold text-[#1E293B] mb-3">48</div>
                            <div class="flex items-start gap-1 text-xs text-[#64748B]">
                                <span class="leading-tight">Menunggu konfirmasi<br>kehadiran guru</span>
                            </div>
                        </div>

                        <!-- Tugas Belum Dinilai -->
                        <div class="bg-white rounded-2xl border border-[#E2E8F0] p-5 shadow-[0_1px_3px_0_rgb(0,0,0,0.02)]">
                            <div class="flex justify-between items-start mb-4">
                                <div class="w-10 h-10 rounded-xl bg-red-50 flex items-center justify-center text-red-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                        </path>
                                    </svg>
                                </div>
                                <span
                                    class="bg-red-100 text-red-600 text-[11px] font-bold px-2 py-0.5 rounded-full uppercase tracking-wider">PRIORITY</span>
                            </div>
                            <h3 class="text-[#64748B] text-sm font-semibold mb-1">Tugas Belum Dinilai</h3>
                            <div class="text-3xl font-bold text-[#1E293B] mb-3">156</div>
                            <div class="flex items-start gap-1 text-xs text-[#64748B]">
                                <span class="leading-tight">Mendekati tenggat waktu<br>rapor bayangan</span>
                            </div>
                        </div>
                    </div>

                    <!-- Perhatian Admin Section -->
                    <div class="mb-10">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <h2 class="text-xl font-bold text-[#1E293B]">Perhatian Admin</h2>
                                <p class="text-sm text-[#64748B] mt-0.5">Tugas operasional yang memerlukan tindakan segera.
                                </p>
                            </div>
                            <a href="#"
                                class="text-sm font-semibold text-[#2D7336] hover:text-[#1E5725] flex items-center gap-1 transition-colors">
                                Lihat Semua
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>

                        <div class="flex flex-col gap-3">
                            <!-- Alert Item 1 -->
                            <div
                                class="bg-white border border-[#E2E8F0] shadow-sm rounded-xl p-4 flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 rounded-lg bg-red-100/80 flex items-center justify-center text-red-500 flex-shrink-0">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-[#1E293B] text-sm md:text-base">Jurnal Pertemuan Tidak
                                            Lengkap</h4>
                                        <p class="text-xs text-[#64748B] mt-0.5">Kelas XII IPA 1 - Matematika (Bpk. Ahmad)
                                        </p>
                                    </div>
                                </div>
                                <button
                                    class="bg-[#3D8545] hover:bg-[#2D7336] text-white px-5 py-2 rounded-lg text-sm font-semibold transition-colors shadow-sm">
                                    Selesaikan
                                </button>
                            </div>

                            <!-- Alert Item 2 -->
                            <div
                                class="bg-white border border-[#E2E8F0] shadow-sm rounded-xl p-4 flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center text-[#64748B] flex-shrink-0">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-[#1E293B] text-sm md:text-base">Tenggat Pengumpulan Tugas
                                            Terlampaui</h4>
                                        <p class="text-xs text-[#64748B] mt-0.5">Kimia Dasar - 12 Siswa belum mengumpulkan
                                        </p>
                                    </div>
                                </div>
                                <button
                                    class="bg-[#F1F5F9] hover:bg-[#E2E8F0] text-[#475569] px-5 py-2 rounded-lg text-sm font-semibold transition-colors shadow-sm">
                                    Review
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Akses Cepat Modul -->
                    <div>
                        <h2 class="text-xl font-bold text-[#1E293B] mb-4">Akses Cepat Modul</h2>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div
                                class="bg-white border border-[#E2E8F0] rounded-xl p-6 flex flex-col items-center justify-center text-center cursor-pointer hover:border-[#2D7336] hover:shadow-md transition-all group">
                                <svg class="w-8 h-8 text-[#64748B] group-hover:text-[#2D7336] mb-3 transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                    </path>
                                </svg>
                                <span class="font-bold text-[#1E293B] text-sm">Data Guru</span>
                            </div>
                            <div
                                class="bg-white border border-[#E2E8F0] rounded-xl p-6 flex flex-col items-center justify-center text-center cursor-pointer hover:border-[#2D7336] hover:shadow-md transition-all group">
                                <svg class="w-8 h-8 text-[#64748B] group-hover:text-[#2D7336] mb-3 transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2">
                                    </path>
                                </svg>
                                <span class="font-bold text-[#1E293B] text-sm">Database Siswa</span>
                            </div>
                            <div
                                class="bg-white border border-[#E2E8F0] rounded-xl p-6 flex flex-col items-center justify-center text-center cursor-pointer hover:border-[#2D7336] hover:shadow-md transition-all group">
                                <svg class="w-8 h-8 text-[#64748B] group-hover:text-[#2D7336] mb-3 transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                    </path>
                                </svg>
                                <span class="font-bold text-[#1E293B] text-sm">Jadwal Kelas</span>
                            </div>
                            <div
                                class="bg-white border border-[#E2E8F0] rounded-xl p-6 flex flex-col items-center justify-center text-center cursor-pointer hover:border-[#2D7336] hover:shadow-md transition-all group">
                                <svg class="w-8 h-8 text-[#64748B] group-hover:text-[#2D7336] mb-3 transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                    </path>
                                </svg>
                                <span class="font-bold text-[#1E293B] text-sm">Laporan Nilai</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Sidebar Area -->
                <div class="w-[340px] flex-shrink-0 flex flex-col gap-6 hidden xl:block">
                    <!-- Profil Sekolah Card -->
                    <div class="bg-white border border-[#E2E8F0] shadow-sm rounded-2xl p-6">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 bg-green-50 rounded flex items-center justify-center text-[#2D7336]">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-[#1E293B] text-lg">Profil Sekolah</h3>
                                <p class="text-xs text-[#64748B]">SMAT Baiturrahman Tangerang Selatan</p>
                            </div>
                        </div>

                        <div class="space-y-4 mb-6">
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-[#64748B] font-medium">Akreditasi</span>
                                <span class="font-bold text-[#2D7336]">A (Unggul)</span>
                            </div>
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-[#64748B] font-medium">Siswa Aktif</span>
                                <span class="font-bold text-[#1E293B]">1,240</span>
                            </div>
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-[#64748B] font-medium">Tenaga Pendidik</span>
                                <span class="font-bold text-[#1E293B]">85</span>
                            </div>
                        </div>

                        <div class="border-t border-[#E2E8F0] pt-5">
                            <h4 class="text-[11px] font-bold tracking-wider text-[#94A3B8] uppercase mb-3">Status Semester
                            </h4>
                            <div
                                class="bg-[#F8FAFC] rounded-lg p-3 flex justify-between items-center mb-2 text-sm border border-[#F1F5F9]">
                                <span class="text-[#64748B] flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    Minggu Efektif
                                </span>
                                <span class="font-bold text-[#1E293B]">14 / 18</span>
                            </div>
                            <div
                                class="bg-[#F0FDF4] rounded-lg p-3 flex justify-between items-center text-sm border border-green-100">
                                <span class="text-[#64748B] flex items-center gap-2">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Periode Rapor
                                </span>
                                <span class="font-bold text-[#1E293B]">Bayangan</span>
                            </div>
                        </div>
                    </div>

                    <!-- Aktivitas Akademik Terkini -->
                    <div class="bg-white border border-[#E2E8F0] shadow-sm rounded-2xl p-6 relative">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="font-bold text-[#1E293B] text-lg">Aktivitas Akademik Terkini</h3>
                            <button class="text-gray-400 hover:text-gray-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                    </path>
                                </svg>
                            </button>
                        </div>

                        <div class="relative border-l border-gray-200 ml-3 space-y-6">
                            <!-- Activity 1 -->
                            <div class="relative pl-6">
                                <span
                                    class="absolute -left-3.5 top-0.5 bg-green-600 rounded-full w-7 h-7 flex items-center justify-center border-4 border-white shadow-sm text-white">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                    </svg>
                                </span>
                                <h4 class="font-bold text-[#1E293B] text-sm leading-tight mb-1">Materi Baru Diunggah</h4>
                                <p class="text-[13px] text-[#64748B] leading-relaxed mb-1">Ibu Ratna mengunggah 'Modul
                                    Termodinamika' untuk Kelas XI IPA 2.</p>
                                <span class="text-[11px] text-[#94A3B8] font-medium block">10 menit yang lalu</span>
                            </div>

                            <!-- Activity 2 -->
                            <div class="relative pl-6">
                                <span
                                    class="absolute -left-3.5 top-0.5 bg-[#475569] rounded-full w-7 h-7 flex items-center justify-center border-4 border-white shadow-sm text-white">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <h4 class="font-bold text-[#1E293B] text-sm leading-tight mb-1">Absensi Terverifikasi</h4>
                                <p class="text-[13px] text-[#64748B] leading-relaxed mb-1">Sesi Bahasa Inggris XII IPS 1
                                    telah diverifikasi otomatis oleh sistem.</p>
                                <span class="text-[11px] text-[#94A3B8] font-medium block">25 menit yang lalu</span>
                            </div>

                            <!-- Activity 3 -->
                            <div class="relative pl-6">
                                <span
                                    class="absolute -left-3.5 top-0.5 bg-gray-400 rounded-full w-7 h-7 flex items-center justify-center border-4 border-white shadow-sm text-white">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                        </path>
                                    </svg>
                                </span>
                                <h4 class="font-bold text-[#1E293B] text-sm leading-tight mb-1">Nilai Baru Dipublikasi</h4>
                                <p class="text-[13px] text-[#64748B] leading-relaxed mb-1">Hasil kuis 'Sejarah Kebudayaan
                                    Islam' telah dirilis oleh Bpk. Fauzi.</p>
                                <span class="text-[11px] text-[#94A3B8] font-medium block">1 jam yang lalu</span>
                            </div>
                        </div>

                        <div class="mt-6">
                            <button
                                class="w-full bg-[#F8FAFC] hover:bg-[#F1F5F9] border border-[#E2E8F0] text-[#64748B] font-semibold py-2.5 rounded-lg text-sm transition-colors">
                                Lihat Log Selengkapnya
                            </button>
                        </div>
                    </div>

                </div>
            <!-- FAB Floating Button bottom right (like the green + icon in image) -->
            <button class="fixed bottom-8 right-8 w-14 h-14 bg-[#2D7336] hover:bg-[#1E5725] text-white rounded-full shadow-lg flex items-center justify-center focus:outline-none transition-transform hover:scale-105 z-20">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
            </button>
        </div>
    @endsection
@endif