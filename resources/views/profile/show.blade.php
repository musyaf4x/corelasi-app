@extends('layouts.authenticated')

@section('content')
<div class="w-full">
    <h1 class="text-2xl md:text-3xl font-bold text-[#1E293B] mb-1">Profile</h1>
    <p class="text-sm text-[#64748B] mb-6">Profile (Read Only Mode)</p>

    <!-- Avatar Card -->
    <div class="bg-white rounded-xl shadow-[0_1px_3px_0_rgb(0,0,0,0.02)] border border-[#E2E8F0] p-6 md:p-8 mb-6 flex flex-col sm:flex-row items-center sm:items-start gap-6">
        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name ?? Auth::user()->name) }}&background=c7d2fe&color=3730a3&size=160&bold=true"
            class="w-24 h-24 rounded-full object-cover shadow-sm flex-shrink-0" alt="{{ $user->name ?? Auth::user()->name }}">
        <div class="flex-1 text-center sm:text-left mt-2 sm:mt-0">
            <div class="flex items-center justify-center sm:justify-start gap-2 mb-2">
                <svg class="w-4 h-4 text-[#1E293B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
                <span class="text-lg font-bold text-[#1E293B]">{{ $user->name ?? Auth::user()->name }}</span>
            </div>
            <span class="inline-flex items-center gap-1.5 bg-[#2D7336] text-white text-sm font-semibold px-4 py-1.5 rounded-md mb-3">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                </svg>
                {{ ucfirst($user->primary_role ?? Auth::user()->primary_role) }}
            </span>
            <div class="text-sm text-[#64748B]">Profile (Read Only Mode)</div>
        </div>
    </div>

    <!-- Data Diri Card -->
    <div class="bg-white rounded-xl shadow-[0_1px_3px_0_rgb(0,0,0,0.02)] border border-[#E2E8F0] p-6 md:p-8 mb-6">
        <h2 class="flex items-center gap-2 text-xl font-bold text-[#1E293B] mb-5">
            <svg class="w-5 h-5 text-[#1E293B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
            Data Diri
        </h2>
        <div class="space-y-3">
            <div class="flex flex-col sm:flex-row sm:items-center bg-[#F8FAFC] rounded-md px-4 py-3">
                <div class="text-[#64748B] text-sm font-medium w-48 mb-1 sm:mb-0">Nama Lengkap</div>
                <div class="text-[#1E293B] text-sm font-medium">{{ $user->name ?? Auth::user()->name }}</div>
            </div>
            <div class="flex flex-col sm:flex-row sm:items-center bg-[#F8FAFC] rounded-md px-4 py-3">
                <div class="text-[#64748B] text-sm font-medium w-48 mb-1 sm:mb-0">Email</div>
                <div class="text-[#1E293B] text-sm font-medium">{{ $user->email ?? Auth::user()->email }}</div>
            </div>
            <div class="flex flex-col sm:flex-row sm:items-center bg-[#F8FAFC] rounded-md px-4 py-3">
                <div class="text-[#64748B] text-sm font-medium w-48 mb-1 sm:mb-0">No Induk (NIS/NIP)</div>
                <div class="text-[#1E293B] text-sm font-medium">{{ $user->nomor_induk ?? '-' }}</div>
            </div>
        </div>
    </div>

    <!-- Role-Specific Section -->
    @php $role = $user->primary_role ?? Auth::user()->primary_role; @endphp
    @if($role === 'admin')
        <div class="bg-white rounded-xl shadow-[0_1px_3px_0_rgb(0,0,0,0.02)] border border-[#E2E8F0] p-6 md:p-8">
            <h2 class="flex items-center gap-2 text-xl font-bold text-[#1E293B] mb-5">
                <svg class="w-5 h-5 text-[#1E293B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
                Akun
            </h2>
            <div class="space-y-3">
                <div class="flex flex-col sm:flex-row sm:items-center bg-[#F8FAFC] rounded-md px-4 py-3">
                    <div class="text-[#64748B] text-sm font-medium w-48 mb-1 sm:mb-0">Username</div>
                    <div class="text-[#1E293B] text-sm font-medium">{{ explode('@', $user->email ?? Auth::user()->email)[0] }}</div>
                </div>
                <div class="flex flex-col sm:flex-row sm:items-center bg-[#F8FAFC] rounded-md px-4 py-3">
                    <div class="text-[#64748B] text-sm font-medium w-48 mb-1 sm:mb-0">Role</div>
                    <div class="text-[#1E293B] text-sm font-medium">{{ ucfirst($user->role ?? Auth::user()->role) }}</div>
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
                <svg class="w-5 h-5 text-[#1E293B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
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
                <svg class="w-5 h-5 text-[#1E293B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
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

    <!-- Keamanan Akun Card -->
    <section class="rounded-2xl border border-[#E2E8F0] bg-white p-6 md:p-8 shadow-[0_1px_3px_0_rgb(0,0,0,0.02)] mb-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
            <div>
                <h2 class="flex items-center gap-2 text-xl font-bold text-[#1E293B]">
                    <svg class="w-5 h-5 text-[#1E293B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    Keamanan Akun
                </h2>
                <p class="mt-4 text-sm text-[#64748B]">
                    Kelola kata sandi akun Anda untuk menjaga keamanan akses CORELASI.
                </p>
                <p class="mt-1 text-xs text-slate-500">
                    Gunakan password yang kuat dan jangan bagikan kepada orang lain.
                </p>
            </div>

            <a href="{{ route('password.edit') }}"
                class="inline-flex items-center justify-center rounded-lg bg-[#2D7336] px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-[#235c2b] focus:outline-none focus:ring-2 focus:ring-[#2D7336] focus:ring-offset-2 mt-2 sm:mt-0">
                Ubah Password
            </a>
        </div>
    </section>
</div>
@endsection