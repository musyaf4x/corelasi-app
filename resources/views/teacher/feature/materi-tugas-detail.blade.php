@extends('profile.show')

@section('content')
<div class="w-full">
    <!-- Breadcrumb -->
    <div class="flex items-center gap-2 text-xs font-bold text-[#64748B] mb-2 tracking-wide uppercase">
        <a href="{{ route('teacher.materi-tugas') }}" class="hover:text-[#2D7336] cursor-pointer transition-colors flex items-center gap-1">
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            BIOLOGI
        </a>
        <svg class="w-3 h-3 text-[#94A3B8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
        <span class="text-[#1E293B]">KELAS XII IPA 1</span>
    </div>

    <h1 class="text-3xl md:text-4xl font-bold text-[#1E293B] mb-6">Materi dan Tugas</h1>

    <!-- Header Actions -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
        <div class="flex flex-wrap items-center gap-3">
            <div
                class="flex items-center gap-2 px-3 py-1.5 bg-white border border-[#E2E8F0] rounded-md shadow-[0_1px_2px_0_rgb(0,0,0,0.05)]">
                <svg class="w-4 h-4 text-[#2D7336]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span class="text-sm font-semibold text-[#64748B]">{{ e(auth()->user()->name) }}</span>
            </div>
            <div
                class="flex items-center gap-2 px-3 py-1.5 bg-white border border-[#E2E8F0] rounded-md shadow-[0_1px_2px_0_rgb(0,0,0,0.05)]">
                <svg class="w-4 h-4 text-[#2D7336]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-sm font-semibold text-[#64748B]">Selasa, 08:00 - 09:30</span>
            </div>
        </div>

        <div class="flex items-center gap-3 w-full md:w-auto">
            <button
                class="flex-1 md:flex-none items-center justify-center gap-2 px-4 py-2 bg-[#F1F5F9] hover:bg-[#E2E8F0] text-[#1E293B] border border-[#E2E8F0] rounded-md font-bold text-sm transition-colors flex shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4">
                    </path>
                </svg>
                Arsip
            </button>
            <button
                class="flex-1 md:flex-none items-center justify-center gap-2 px-4 py-2 bg-[#2D7336] hover:bg-[#235c2b] text-white rounded-md font-bold text-sm transition-colors flex shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4v16m8-8H4"></path>
                </svg>
                Buat Baru
            </button>
        </div>
    </div>

    <!-- Two Columns Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8">

        <!-- Left Column: Daftar Materi -->
        <div class="flex flex-col gap-4">
            <div class="flex items-center justify-between mb-2">
                <h2 class="text-lg font-bold text-[#1E293B] flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#2D7336]" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477-4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    Daftar Materi
                </h2>
                <a href="#"
                    class="text-sm font-bold text-[#2D7336] hover:text-[#235c2b] transition-colors">Tambah
                    Materi</a>
            </div>

            <!-- Materi Card 1 -->
            <div
                class="bg-white border border-[#E2E8F0] rounded-xl p-4 flex items-center justify-between shadow-[0_1px_2px_0_rgb(0,0,0,0.02)] hover:border-[#CBD5E1] transition-colors">
                <div class="flex items-center gap-4">
                    <div
                        class="w-12 h-12 rounded-lg bg-[#DCFCE7] flex items-center justify-center text-[#16A34A]">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-[#1E293B] text-[15px]">Modul Genetika</h3>
                        <p class="text-xs font-medium text-[#64748B] mt-0.5">Link Eksternal &bull; Diakses
                            120 kali</p>
                    </div>
                </div>
                <button class="text-gray-400 hover:text-[#1E293B] p-2 transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
                        </path>
                    </svg>
                </button>
            </div>

            <!-- Materi Card 2 -->
            <div
                class="bg-white border border-[#E2E8F0] rounded-xl p-4 flex items-center justify-between shadow-[0_1px_2px_0_rgb(0,0,0,0.02)] hover:border-[#CBD5E1] transition-colors">
                <div class="flex items-center gap-4">
                    <div
                        class="w-12 h-12 rounded-lg bg-[#EFF6FF] flex items-center justify-center text-[#2563EB]">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-[#1E293B] text-[15px]">Pembelahan Sel</h3>
                        <p class="text-xs font-medium text-[#64748B] mt-0.5">File PDF &bull; 2.4 MB</p>
                    </div>
                </div>
                <button class="text-gray-400 hover:text-[#1E293B] p-2 transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
                        </path>
                    </svg>
                </button>
            </div>

            <!-- Upload Materi Baru -->
            <div
                class="border-2 border-dashed border-[#CBD5E1] rounded-xl p-8 flex flex-col items-center justify-center text-center hover:bg-gray-50 transition-colors cursor-pointer bg-white mt-2">
                <svg class="w-8 h-8 text-[#94A3B8] mb-3" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                    </path>
                </svg>
                <span class="text-sm font-semibold text-[#64748B]">Unggah Materi Baru</span>
            </div>
        </div>

        <!-- Right Column: Daftar Tugas -->
        <div class="flex flex-col gap-4">
            <div class="flex items-center justify-between mb-2">
                <h2 class="text-lg font-bold text-[#1E293B] flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#2D7336]" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                    Daftar Tugas
                </h2>
                <a href="#"
                    class="text-sm font-bold text-[#2D7336] hover:text-[#235c2b] transition-colors">Tambah
                    Tugas</a>
            </div>

            <!-- Tugas Table -->
            <div
                class="bg-white border border-[#E2E8F0] rounded-xl shadow-[0_1px_2px_0_rgb(0,0,0,0.02)] overflow-hidden">
                <!-- Table Header -->
                <div class="grid grid-cols-12 gap-2 px-5 py-4 border-b border-[#E2E8F0] bg-[#F8FAFC]">
                    <div class="col-span-6 text-[11px] font-bold text-[#64748B] uppercase tracking-wider">
                        Judul Tugas</div>
                    <div
                        class="col-span-3 text-[11px] font-bold text-[#64748B] uppercase tracking-wider text-center">
                        Metode</div>
                    <div
                        class="col-span-3 text-[11px] font-bold text-[#64748B] uppercase tracking-wider text-right pr-4">
                        Deadline</div>
                </div>

                <!-- Table Body -->
                <div class="divide-y divide-[#E2E8F0]">
                    <!-- Row 1 -->
                    <a href="#"
                        class="grid grid-cols-12 gap-2 px-5 py-4 items-center hover:bg-gray-50 transition-colors group">
                        <div class="col-span-6 pr-2">
                            <h3 class="font-bold text-[#1E293B] text-[14px]">Latihan Soal Mitosis</h3>
                            <div class="flex items-center gap-1.5 mt-1">
                                <span class="w-2 h-2 rounded-full bg-[#16A34A] flex-shrink-0"></span>
                                <span class="text-[11px] font-medium text-[#64748B] truncate">32/36 Siswa
                                    mengumpulkan</span>
                            </div>
                        </div>
                        <div class="col-span-3 text-center">
                            <span
                                class="inline-block px-2.5 py-1 bg-[#F1F5F9] text-[#475569] text-[10px] font-bold rounded-full">Teks
                                Singkat</span>
                        </div>
                        <div class="col-span-3 flex items-center justify-end gap-3">
                            <span class="text-[13px] font-bold text-[#DC2626]">24 Okt</span>
                            <svg class="w-4 h-4 text-[#CBD5E1] group-hover:text-[#64748B] transition-colors"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </a>

                    <!-- Row 2 -->
                    <a href="#"
                        class="grid grid-cols-12 gap-2 px-5 py-4 items-center hover:bg-gray-50 transition-colors group">
                        <div class="col-span-6 pr-2">
                            <h3 class="font-bold text-[#1E293B] text-[14px]">Analisis Fenotipe</h3>
                            <div class="flex items-center gap-1.5 mt-1">
                                <span class="w-2 h-2 rounded-full bg-[#CBD5E1] flex-shrink-0"></span>
                                <span class="text-[11px] font-medium text-[#64748B] truncate">0/36 Siswa
                                    mengumpulkan</span>
                            </div>
                        </div>
                        <div class="col-span-3 text-center">
                            <span
                                class="inline-block px-2.5 py-1 bg-[#DCFCE7] text-[#16A34A] text-[10px] font-bold rounded-full">Satu
                                File</span>
                        </div>
                        <div class="col-span-3 flex items-center justify-end gap-3">
                            <span class="text-[13px] font-bold text-[#1E293B]">27 Okt</span>
                            <svg class="w-4 h-4 text-[#CBD5E1] group-hover:text-[#64748B] transition-colors"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </a>

                    <!-- Row 3 -->
                    <a href="#"
                        class="grid grid-cols-12 gap-2 px-5 py-4 items-center hover:bg-gray-50 transition-colors group">
                        <div class="col-span-6 pr-2">
                            <h3 class="font-bold text-[#1E293B] text-[14px]">Observasi Lingkungan</h3>
                            <div class="flex items-center gap-1.5 mt-1">
                                <span class="w-2 h-2 rounded-full bg-[#CBD5E1] flex-shrink-0"></span>
                                <span class="text-[11px] font-medium text-[#64748B] truncate">Project
                                    Group</span>
                            </div>
                        </div>
                        <div class="col-span-3 text-center">
                            <span
                                class="inline-block px-2.5 py-1 bg-[#EFF6FF] text-[#2563EB] text-[10px] font-bold rounded-full">Tautan
                                Eksternal</span>
                        </div>
                        <div class="col-span-3 flex items-center justify-end gap-3">
                            <span class="text-[13px] font-bold text-[#1E293B]">30 Okt</span>
                            <svg class="w-4 h-4 text-[#CBD5E1] group-hover:text-[#64748B] transition-colors"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Panduan Penilaian Card -->
            <div class="bg-[#DCFCE7] border border-[#BBF7D0] rounded-xl p-5 mt-2 flex gap-4">
                <div class="flex-shrink-0 text-[#16A34A] mt-0.5">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="font-bold text-[#14532D] mb-1.5 text-sm">Panduan Penilaian</h4>
                    <p class="text-[13px] text-[#14532D] leading-relaxed">
                        Semua tugas yang telah melewati tenggat waktu akan otomatis masuk ke antrean
                        penilaian di menu Penilaian Tugas. Pastikan nilai dan feedback singkat sudah
                        disiapkan.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection