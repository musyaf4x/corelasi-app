<x-guest-layout>
    <div class="w-full max-w-[420px] px-6 py-4 flex flex-col items-center mt-8 sm:mt-0">

        <!-- Logo Header -->
        <div class="flex flex-col items-center mb-8">
            <div class="w-12 h-12 bg-[#2E7D32] rounded-xl flex items-center justify-center mb-4 shadow-sm">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 10H20V20H4V10Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 2L2 7L12 12L22 7L12 2Z" fill="white"/>
                    <path d="M8 10V20" stroke="white" stroke-width="2" stroke-linecap="round"/>
                    <path d="M16 10V20" stroke="white" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-[#2E7D32] tracking-wide mb-1">CORELASI</h1>
            <p class="text-sm text-[#64748B]">Sistem Operasional Akademik &amp; LMS Ringan</p>
        </div>

        <!-- Main Card -->
        <div class="w-full bg-white border border-[#E2E8F0] shadow-sm rounded-xl p-6 mb-8">

            <div class="mb-6">
                <h2 class="text-lg font-bold text-[#1E293B] mb-1">Lupa Password</h2>
                <p class="text-sm text-[#64748B]">
                    Masukkan email sekolah Anda. Kami akan mengirimkan link reset password ke email tersebut.
                </p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-6 bg-[#F0FDF4] border border-[#BBF7D0] text-[#15803D] px-4 py-3 rounded-lg flex items-start gap-3">
                    <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-sm">Link reset password telah dikirim ke email sekolah Anda.</p>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Sekolah -->
                <div class="mb-5">
                    <label for="email" class="block text-xs font-semibold text-[#64748B] tracking-wider mb-2 uppercase">Email Sekolah</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <input id="email"
                               class="block w-full pl-10 pr-4 py-2.5 text-sm border @error('email') border-[#EF4444] @else border-[#E2E8F0] focus:border-[#2E7D32] focus:ring focus:ring-[#2E7D32]/20 @enderror rounded-lg outline-none transition-colors"
                               type="email"
                               name="email"
                               placeholder="nama@sekolah.sch.id"
                               value="{{ old('email') }}"
                               required autofocus autocomplete="email" />
                    </div>
                    @error('email')
                        <p class="mt-2 text-xs text-[#EF4444]">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                        class="w-full bg-[#2A6D30] hover:bg-[#235827] text-white font-medium py-2.5 px-4 rounded-lg transition-colors flex items-center justify-center gap-2">
                    Kirim Link Reset Password
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </button>
            </form>
        </div>

        <a href="{{ route('login') }}" class="text-sm text-[#64748B] hover:text-[#2E7D32] font-medium transition-colors">
            &larr; Kembali ke Login
        </a>

        <p class="text-xs text-[#94A3B8] font-medium tracking-wider mt-4">&copy; 2024 CORELASI</p>
    </div>
</x-guest-layout>