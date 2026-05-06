@extends('layouts.authenticated')

@section('content')
<div class="w-full">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-bold text-[#1E293B] mb-2">Mata Pelajaran & Kelas</h1>
        <p class="text-[#64748B] text-sm font-medium">Pilih mata pelajaran dan kelas yang ingin Anda kelola materi dan tugasnya.</p>
    </div>

    <!-- Subjects List -->
    <div class="space-y-4">
        
        <!-- Subject 1: Biologi -->
        <div x-data="{ expanded: true }" class="bg-white border border-[#E2E8F0] rounded-xl shadow-[0_1px_2px_0_rgb(0,0,0,0.02)] overflow-hidden">
            <!-- Subject Header (Clickable to toggle) -->
            <div @click="expanded = !expanded" class="flex items-center justify-between p-5 cursor-pointer hover:bg-gray-50 transition-colors select-none">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-lg bg-[#DCFCE7] flex items-center justify-center text-[#16A34A]">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-[#1E293B] text-lg">Biologi</h3>
                        <p class="text-xs font-medium text-[#64748B] mt-0.5">2 Kelas Aktif &bull; Total 72 Siswa</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="px-2.5 py-1 bg-[#EEF2FF] text-[#4F46E5] text-[10px] font-bold rounded-full uppercase tracking-wider hidden sm:inline-block">Semester Ganjil</span>
                    <svg class="w-5 h-5 text-[#94A3B8] transition-transform duration-200" :class="{ 'rotate-180': expanded }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>

            <!-- Classes List -->
            <div x-show="expanded" x-collapse>
                <div class="px-5 pb-5 pt-2 border-t border-[#E2E8F0] bg-gray-50/50">
                    <h4 class="text-xs font-bold text-[#64748B] uppercase tracking-wider mb-3">Pilih Kelas:</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- Class Card 1 -->
                        <a href="{{ route('teacher.materi-tugas.detail') }}" class="group bg-white border border-[#E2E8F0] hover:border-[#2D7336] rounded-lg p-4 flex flex-col transition-all shadow-sm hover:shadow-md relative overflow-hidden">
                            <div class="absolute top-0 left-0 w-1 h-full bg-[#2D7336] opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <div class="flex items-center justify-between mb-3">
                                <span class="font-bold text-[#1E293B] text-base group-hover:text-[#2D7336] transition-colors">XII IPA 1</span>
                                <span class="flex items-center gap-1 text-[11px] font-bold text-[#16A34A] bg-[#DCFCE7] px-2 py-0.5 rounded">
                                    <span class="w-1.5 h-1.5 rounded-full bg-[#16A34A] animate-pulse"></span>
                                    Aktif
                                </span>
                            </div>
                            <div class="flex items-center gap-2 text-xs font-medium text-[#64748B] mb-1.5">
                                <svg class="w-3.5 h-3.5 text-[#94A3B8]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Selasa, 08:00 - 09:30
                            </div>
                            <div class="flex items-center gap-2 text-xs font-medium text-[#64748B]">
                                <svg class="w-3.5 h-3.5 text-[#94A3B8]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                36 Siswa
                            </div>
                        </a>

                        <!-- Class Card 2 -->
                        <a href="{{ route('teacher.materi-tugas.detail') }}" class="group bg-white border border-[#E2E8F0] hover:border-[#2D7336] rounded-lg p-4 flex flex-col transition-all shadow-sm hover:shadow-md relative overflow-hidden">
                            <div class="absolute top-0 left-0 w-1 h-full bg-[#2D7336] opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <div class="flex items-center justify-between mb-3">
                                <span class="font-bold text-[#1E293B] text-base group-hover:text-[#2D7336] transition-colors">XII IPA 2</span>
                                <span class="flex items-center gap-1 text-[11px] font-bold text-[#16A34A] bg-[#DCFCE7] px-2 py-0.5 rounded">
                                    <span class="w-1.5 h-1.5 rounded-full bg-[#16A34A] animate-pulse"></span>
                                    Aktif
                                </span>
                            </div>
                            <div class="flex items-center gap-2 text-xs font-medium text-[#64748B] mb-1.5">
                                <svg class="w-3.5 h-3.5 text-[#94A3B8]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Kamis, 10:00 - 11:30
                            </div>
                            <div class="flex items-center gap-2 text-xs font-medium text-[#64748B]">
                                <svg class="w-3.5 h-3.5 text-[#94A3B8]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                36 Siswa
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subject 2: Kimia Lintas Minat -->
        <div x-data="{ expanded: false }" class="bg-white border border-[#E2E8F0] rounded-xl shadow-[0_1px_2px_0_rgb(0,0,0,0.02)] overflow-hidden">
            <div @click="expanded = !expanded" class="flex items-center justify-between p-5 cursor-pointer hover:bg-gray-50 transition-colors select-none">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-lg bg-[#EFF6FF] flex items-center justify-center text-[#2563EB]">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-[#1E293B] text-lg">Kimia Terapan (Lintas Minat)</h3>
                        <p class="text-xs font-medium text-[#64748B] mt-0.5">1 Kelas Aktif &bull; Total 28 Siswa</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="px-2.5 py-1 bg-[#EEF2FF] text-[#4F46E5] text-[10px] font-bold rounded-full uppercase tracking-wider hidden sm:inline-block">Semester Ganjil</span>
                    <svg class="w-5 h-5 text-[#94A3B8] transition-transform duration-200" :class="{ 'rotate-180': expanded }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>

            <!-- Classes List -->
            <div x-show="expanded" x-collapse>
                <div class="px-5 pb-5 pt-2 border-t border-[#E2E8F0] bg-gray-50/50">
                    <h4 class="text-xs font-bold text-[#64748B] uppercase tracking-wider mb-3">Pilih Kelas:</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- Class Card 1 -->
                        <a href="#" class="group bg-white border border-[#E2E8F0] hover:border-[#2D7336] rounded-lg p-4 flex flex-col transition-all shadow-sm hover:shadow-md relative overflow-hidden">
                            <div class="absolute top-0 left-0 w-1 h-full bg-[#2D7336] opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <div class="flex items-center justify-between mb-3">
                                <span class="font-bold text-[#1E293B] text-base group-hover:text-[#2D7336] transition-colors">XII IPS 2</span>
                                <span class="flex items-center gap-1 text-[11px] font-bold text-[#16A34A] bg-[#DCFCE7] px-2 py-0.5 rounded">
                                    <span class="w-1.5 h-1.5 rounded-full bg-[#16A34A] animate-pulse"></span>
                                    Aktif
                                </span>
                            </div>
                            <div class="flex items-center gap-2 text-xs font-medium text-[#64748B] mb-1.5">
                                <svg class="w-3.5 h-3.5 text-[#94A3B8]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Jumat, 13:30 - 15:00
                            </div>
                            <div class="flex items-center gap-2 text-xs font-medium text-[#64748B]">
                                <svg class="w-3.5 h-3.5 text-[#94A3B8]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                28 Siswa
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
