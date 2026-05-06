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
        <div class="w-full bg-white border border-[#E2E8F0] shadow-sm rounded-xl p-6 mb-6"
             x-data="{
                showPassword: false,
                showConfirm: false,
                password: '',
                hasMin: false,
                hasLower: false,
                hasUpper: false,
                hasNumber: false,
                hasSpecial: false,
                checkPassword() {
                    this.hasMin     = this.password.length >= 8;
                    this.hasLower   = /[a-z]/.test(this.password);
                    this.hasUpper   = /[A-Z]/.test(this.password);
                    this.hasNumber  = /[0-9]/.test(this.password);
                    this.hasSpecial = /[^A-Za-z0-9]/.test(this.password);
                }
             }">

            <!-- Header -->
            <div class="mb-6">
                <h2 class="text-lg font-bold text-[#1E293B] mb-1">Reset Password</h2>
                <p class="text-sm text-[#64748B]">Buat password baru untuk akun CORELASI Anda.</p>
            </div>

            <!-- Password Requirements -->
            <div class="mb-5 bg-[#F8FAFC] rounded-lg p-4 border border-[#F1F5F9]">
                <p class="text-xs font-semibold text-[#64748B] mb-2">Pastikan password memenuhi syarat:</p>
                <ul class="space-y-1.5 text-xs">
                    <li class="flex items-center gap-2" :class="hasMin ? 'text-[#16A34A]' : 'text-[#94A3B8]'">
                        <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                  :d="hasMin ? 'M5 13l4 4L19 7' : 'M12 5v14M5 12h14'"/>
                        </svg>
                        Minimal 8 karakter
                    </li>
                    <li class="flex items-center gap-2" :class="hasLower ? 'text-[#16A34A]' : 'text-[#94A3B8]'">
                        <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                  :d="hasLower ? 'M5 13l4 4L19 7' : 'M12 5v14M5 12h14'"/>
                        </svg>
                        1 huruf kecil (a–z)
                    </li>
                    <li class="flex items-center gap-2" :class="hasNumber ? 'text-[#16A34A]' : 'text-[#94A3B8]'">
                        <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                  :d="hasNumber ? 'M5 13l4 4L19 7' : 'M12 5v14M5 12h14'"/>
                        </svg>
                        1 angka (0–9)
                    </li>
                    <li class="flex items-center gap-2" :class="hasSpecial ? 'text-[#16A34A]' : 'text-[#94A3B8]'">
                        <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                  :d="hasSpecial ? 'M5 13l4 4L19 7' : 'M12 5v14M5 12h14'"/>
                        </svg>
                        1 karakter spesial (!@#$...)
                    </li>
                </ul>
            </div>

            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email (hidden, pre-filled) -->
                <input type="hidden" name="email" value="{{ old('email', $request->email) }}">

                @error('email')
                    <p class="mb-4 text-xs text-[#EF4444] bg-red-50 border border-red-200 rounded-lg px-3 py-2">{{ $message }}</p>
                @enderror

                <!-- Password Baru -->
                <div class="mb-4">
                    <label for="password" class="block text-xs font-semibold text-[#64748B] tracking-wider mb-2 uppercase">
                        Password Baru
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <input id="password"
                               :type="showPassword ? 'text' : 'password'"
                               name="password"
                               x-model="password"
                               @input="checkPassword()"
                               placeholder="Masukkan password baru"
                               class="block w-full pl-10 pr-10 py-2.5 text-sm border @error('password') border-[#EF4444] @else border-[#E2E8F0] focus:border-[#2E7D32] focus:ring focus:ring-[#2E7D32]/20 @enderror rounded-lg outline-none transition-colors"
                               required autocomplete="new-password"/>
                        <button type="button" @click="showPassword = !showPassword"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 transition-colors">
                            <svg x-show="!showPassword" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            <svg x-show="showPassword" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display:none;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="mt-1.5 text-xs text-[#EF4444]">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Konfirmasi Password -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-xs font-semibold text-[#64748B] tracking-wider mb-2 uppercase">
                        Konfirmasi Password Baru
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <input id="password_confirmation"
                               :type="showConfirm ? 'text' : 'password'"
                               name="password_confirmation"
                               placeholder="Ulangi password baru"
                               class="block w-full pl-10 pr-10 py-2.5 text-sm border @error('password_confirmation') border-[#EF4444] @else border-[#E2E8F0] focus:border-[#2E7D32] focus:ring focus:ring-[#2E7D32]/20 @enderror rounded-lg outline-none transition-colors"
                               required autocomplete="new-password"/>
                        <button type="button" @click="showConfirm = !showConfirm"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 transition-colors">
                            <svg x-show="!showConfirm" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            <svg x-show="showConfirm" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display:none;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                            </svg>
                        </button>
                    </div>
                    @error('password_confirmation')
                        <p class="mt-1.5 text-xs text-[#EF4444]">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                        class="w-full bg-[#2A6D30] hover:bg-[#235827] text-white font-medium py-2.5 px-4 rounded-lg transition-colors flex items-center justify-center gap-2">
                    Reset Password
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