<x-guest-layout>
    <div class="w-full max-w-[420px] px-6 py-4 flex flex-col items-center mt-8 sm:mt-0">

        <!-- Logo Header -->
        <div class="flex flex-col items-center mb-8">
            <div class="w-12 h-12 bg-[#2E7D32] rounded-xl flex items-center justify-center mb-4 shadow-sm">
                <!-- icon sekolah -->
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 10H20V20H4V10Z" stroke="white" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M12 2L2 7L12 12L22 7L12 2Z" fill="white" />
                    <path d="M8 10V20" stroke="white" stroke-width="2" stroke-linecap="round" />
                    <path d="M16 10V20" stroke="white" stroke-width="2" stroke-linecap="round" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-[#2E7D32] tracking-wide mb-1">CORELASI</h1>
            <p class="text-sm text-[#64748B]">Sistem Operasional Akademik &amp; LMS Ringan</p>
        </div>

        <!-- Main Card -->
        <div class="w-full bg-white border border-[#E2E8F0] shadow-sm rounded-xl p-6 mb-8">

            <!-- Error Banner -->
            @if ($errors->any())
                <div
                    class="bg-[#FEF2F2] border border-[#FECACA] text-[#B91C1C] px-4 py-3 rounded-lg mb-6 flex items-start gap-3">
                    <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <div class="text-sm">
                        <span class="block">Login gagal. Periksa kembali email dan password Anda.</span>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email Address -->
                <div class="mb-5">
                    <label for="email"
                        class="block text-xs font-semibold text-[#64748B] tracking-wider mb-2 uppercase">Email Institusi
                        / Username</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input id="email"
                            class="block w-full pl-10 pr-10 py-2.5 text-sm border {{ $errors->any() ? 'border-[#EF4444] text-[#EF4444]' : 'border-[#E2E8F0] focus:border-[#2E7D32] focus:ring focus:ring-[#2E7D32]/20' }} rounded-lg outline-none transition-colors"
                            type="text" name="email" placeholder="user@gmail.com" value="{{ old('email') }}" required
                            autofocus autocomplete="username" />

                        @if($errors->any())
                            {{-- Error: tombol X untuk clear email --}}
                            <button type="button"
                                onclick="var el=document.getElementById('email'); el.value=''; el.focus();"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-[#EF4444] hover:text-red-700 transition-colors"
                                title="Hapus Email">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        @endif
                    </div>
                    @if($errors->any())
                        <div class="mt-2 text-[#EF4444] text-xs flex items-start gap-1">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>
                                <span class="font-semibold">Email tidak terdaftar.</span><br>
                                <span class="text-[#94A3B8]">Silahkan cek kembali atau hubungi admin</span>
                            </span>
                        </div>
                    @endif
                </div>

                <!-- Password -->
                <div class="mb-5">
                    <div class="flex items-center justify-between mb-2">
                        <label for="password"
                            class="block text-xs font-semibold text-[#64748B] tracking-wider uppercase">Kata
                            Sandi</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                                class="text-xs font-semibold text-[#2E7D32] hover:underline">
                                Lupa Password?
                            </a>
                        @endif
                    </div>

                    {{-- Password field — selalu pakai eye toggle, border merah saat error --}}
                    <div class="relative" x-data="{ showPassword: false }">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input id="password"
                            class="block w-full pl-10 pr-10 py-2.5 text-sm border {{ $errors->any() ? 'border-[#EF4444] text-[#EF4444]' : 'border-[#E2E8F0] focus:border-[#2E7D32] focus:ring focus:ring-[#2E7D32]/20' }} rounded-lg outline-none transition-colors"
                            :type="showPassword ? 'text' : 'password'" name="password" placeholder="........" required
                            autocomplete="current-password" />
                        <button type="button" @click="showPassword = !showPassword"
                            class="{{ $errors->any() ? 'text-red-400 hover:text-red-600' : 'text-gray-400 hover:text-gray-600' }} absolute inset-y-0 right-0 pr-3 flex items-center transition-colors"
                            title="Tampilkan / Sembunyikan Password">
                            <svg x-show="!showPassword" class="h-5 w-5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg x-show="showPassword" class="h-5 w-5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" style="display:none;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                        </button>
                    </div>

                    @if($errors->any())
                        <div class="mt-2 text-[#EF4444] text-xs flex items-start gap-1">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>
                                <span class="font-semibold">Kata Sandi yang kamu masukkan salah</span><br>
                                <span class="text-[#94A3B8]">Silahkan cek kembali atau <a
                                        href="{{ route('password.request') }}"
                                        class="text-[#2E7D32] hover:underline font-semibold">klik "Lupa Password"</a></span>
                            </span>
                        </div>
                    @endif
                </div>

                <!-- Remember Me -->
                <div class="block mb-6">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-[#CBD5E1] text-[#2E7D32] shadow-sm focus:ring-[#2E7D32] w-4 h-4"
                            name="remember">
                        <span class="ms-2 text-sm text-[#64748B]">Tetap masuk di perangkat ini</span>
                    </label>
                </div>

                <div class="flex items-center justify-end w-full">
                    <button type="submit"
                        class="w-full bg-[#2A6D30] hover:bg-[#235827] text-white font-medium py-2.5 px-4 rounded-lg transition-colors flex items-center justify-center gap-2">
                        Masuk ke Sistem
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </button>
                </div>
            </form>

            <!-- Info Box -->
            <div class="mt-8 bg-[#F8FAFC] rounded-lg p-4 flex items-start gap-3 border border-[#F1F5F9]">
                <svg class="w-5 h-5 text-[#2E7D32] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="text-xs text-[#64748B] leading-relaxed">Akses untuk Admin, Guru, dan Siswa terdaftar. Jika
                    mengalami kendala akun, hubungi admin sekolah.</p>
            </div>
        </div>

        <p class="text-xs text-[#94A3B8] font-medium tracking-wider">&copy; 2024 CORELASI</p>
    </div>
</x-guest-layout>