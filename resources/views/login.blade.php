<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>Login - Aplikasi Peminjaman Alat Laboratorium</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
        
        <!-- Tailwind CSS CDN -->
        <script src="https://cdn.tailwindcss.com"></script>
        
        <!-- Custom Tailwind Config -->
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            'sans': ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                        }
                    }
                }
            }
        </script>
    </head>
    <body class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-emerald-50">
        <div class="min-h-screen flex items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
            <div class="w-full max-w-6xl bg-white rounded-2xl shadow-2xl overflow-hidden">
                <div class="flex flex-col lg:flex-row">
                    <!-- Left Side - Hero Illustration -->
                    <div class="lg:w-1/2 bg-gradient-to-br from-blue-600 to-emerald-600 p-8 lg:p-12 flex flex-col justify-center items-center text-white relative overflow-hidden">
                        <!-- Background Pattern -->
                        <div class="absolute inset-0 opacity-10">
                            <svg class="w-full h-full" viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                                        <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1"/>
                                    </pattern>
                                </defs>
                                <rect width="100%" height="100%" fill="url(#grid)" />
                            </svg>
                        </div>
                        
                        <!-- Content -->
                        <div class="relative z-10 text-center">
                            <!-- Lab Equipment Icon -->
                            <div class="mb-8">
                                <svg class="w-32 h-32 mx-auto" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="100" cy="100" r="80" stroke="white" stroke-width="3" fill="rgba(255,255,255,0.1)"/>
                                    <path d="M70 80 L70 120 M130 80 L130 120 M85 65 L115 65 M85 135 L115 135" 
                                          stroke="white" stroke-width="4" stroke-linecap="round"/>
                                    <circle cx="100" cy="100" r="25" stroke="white" stroke-width="3" fill="none"/>
                                    <path d="M90 90 L110 110 M110 90 L90 110" stroke="white" stroke-width="3" stroke-linecap="round"/>
                                </svg>
                            </div>
                            
                            <h1 class="text-4xl font-bold mb-4">Selamat Datang</h1>
                            <h2 class="text-2xl font-light mb-6 opacity-90">Sistem Peminjaman Alat Laboratorium</h2>
                            <p class="text-lg opacity-80 max-w-md mx-auto leading-relaxed">
                                Kelola peminjaman alat laboratorium dengan mudah dan efisien. 
                                Sistem modern untuk mendukung kegiatan penelitian dan praktikum Anda.
                            </p>
                            
                            <!-- Features -->
                            <div class="mt-8 space-y-3 text-left max-w-md mx-auto">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-sm">Peminjaman alat yang terintegrasi</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-sm">Monitoring real-time status alat</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-sm">Laporan peminjaman otomatis</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side - Login Form -->
                    <div class="lg:w-1/2 p-8 lg:p-12">
                        <div class="max-w-md mx-auto">
                            <!-- Logo/Title -->
                            <div class="text-center mb-8">
                                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-600 to-emerald-600 rounded-2xl mb-4">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                </div>
                                <h2 class="text-3xl font-bold text-gray-900">Masuk ke Akun</h2>
                                <p class="mt-2 text-gray-600">Selamat datang kembali! Silakan login untuk melanjutkan</p>
                            </div>

                            <!-- Login Form -->
                            <form class="space-y-6" method="POST" action="{{ route('login.submit') }}">
                                @csrf
                                
                                <!-- Username Input -->
                                <div>
                                    <label for="username" class="block text-sm font-medium text-gray-700 mb-2">
                                        Username
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                            </svg>
                                        </div>
                                        <input 
                                            id="username" 
                                            name="username" 
                                            type="text" 
                                            required
                                            class="appearance-none block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 text-gray-900 placeholder-gray-500"
                                            placeholder="Masukkan username"
                                            autocomplete="username"
                                        >
                                    </div>
                                </div>

                                <!-- Password Input -->
                                <div>
                                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                        Kata Sandi
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                            </svg>
                                        </div>
                                        <input 
                                            id="password" 
                                            name="password" 
                                            type="password" 
                                            required
                                            class="appearance-none block w-full pl-10 pr-10 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 text-gray-900 placeholder-gray-500"
                                            placeholder="Masukkan kata sandi"
                                            autocomplete="current-password"
                                        >
                                        <button 
                                            type="button" 
                                            id="togglePassword"
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center"
                                        >
                                            <svg id="eyeIcon" class="h-5 w-5 text-gray-400 hover:text-gray-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                            <svg id="eyeOffIcon" class="h-5 w-5 text-gray-400 hover:text-gray-600 transition-colors hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <!-- Remember Me & Forgot Password -->
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <input 
                                            id="remember" 
                                            name="remember" 
                                            type="checkbox" 
                                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded transition-colors"
                                        >
                                        <label for="remember" class="ml-2 block text-sm text-gray-700">
                                            Ingat Saya
                                        </label>
                                    </div>
                                    <div class="text-sm">
                                        <a href="#" class="font-medium text-blue-600 hover:text-blue-500 transition-colors">
                                            Lupa kata sandi?
                                        </a>
                                    </div>
                                </div>

                                <!-- Flash Messages -->
                                @if (session('error'))
                                    <div class="bg-orange-50 border border-orange-200 rounded-xl p-4 mb-4">
                                        <div class="flex">
                                            <div class="flex-shrink-0">
                                                <svg class="h-5 w-5 text-orange-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                            <div class="ml-3">
                                                <h3 class="text-sm font-medium text-orange-800">
                                                    {{ session('error') }}
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <!-- Success Messages -->
                                @if (session('success'))
                                    <div class="bg-green-50 border border-green-200 rounded-xl p-4 mb-4">
                                        <div class="flex">
                                            <div class="flex-shrink-0">
                                                <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                            <div class="ml-3">
                                                <h3 class="text-sm font-medium text-green-800">
                                                    {{ session('success') }}
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <!-- Error Messages -->
                                @if ($errors->any())
                                    <div class="bg-red-50 border border-red-200 rounded-xl p-4">
                                        <div class="flex">
                                            <div class="flex-shrink-0">
                                                <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                            <div class="ml-3">
                                                <h3 class="text-sm font-medium text-red-800">
                                                    Login gagal, periksa kembali data Anda
                                                </h3>
                                                <div class="mt-2 text-sm text-red-700">
                                                    <ul class="list-disc list-inside space-y-1">
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <!-- Submit Button -->
                                <div>
                                    <button 
                                        type="submit" 
                                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-emerald-600 hover:from-blue-700 hover:to-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200 transform hover:scale-[1.02]"
                                    >
                                        <span class="flex items-center">
                                            Masuk
                                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                            </svg>
                                        </span>
                                    </button>
                                </div>

                                <!-- Register Link -->
                                <div class="text-center">
                                    <p class="text-sm text-gray-600">
                                        Belum punya akun? 
                                        <a href="#" class="font-medium text-blue-600 hover:text-blue-500 transition-colors">
                                            Daftar sekarang
                                        </a>
                                    </p>
                                </div>
                            </form>

                            <!-- Footer Info -->
                            <div class="mt-8 pt-6 border-t border-gray-200">
                                <p class="text-center text-xs text-gray-500">
                                    © 2024 Sistem Peminjaman Alat Laboratorium. 
                                    Dilindungi oleh kebijakan privasi dan syarat layanan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- JavaScript for password toggle -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const togglePassword = document.getElementById('togglePassword');
                const passwordInput = document.getElementById('password');
                const eyeIcon = document.getElementById('eyeIcon');
                const eyeOffIcon = document.getElementById('eyeOffIcon');

                togglePassword.addEventListener('click', function() {
                    // Toggle password visibility
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);

                    // Toggle icons
                    if (type === 'text') {
                        eyeIcon.classList.add('hidden');
                        eyeOffIcon.classList.remove('hidden');
                    } else {
                        eyeIcon.classList.remove('hidden');
                        eyeOffIcon.classList.add('hidden');
                    }
                });

                // Add form validation feedback
                const form = document.querySelector('form');
                const inputs = form.querySelectorAll('input[required]');

                inputs.forEach(input => {
                    input.addEventListener('blur', function() {
                        if (this.value.trim() === '') {
                            this.classList.add('border-red-300');
                            this.classList.remove('border-gray-300');
                        } else {
                            this.classList.remove('border-red-300');
                            this.classList.add('border-gray-300');
                        }
                    });

                    input.addEventListener('focus', function() {
                        this.classList.remove('border-red-300');
                        this.classList.add('ring-2', 'ring-blue-500', 'border-transparent');
                    });

                    input.addEventListener('blur', function() {
                        this.classList.remove('ring-2', 'ring-blue-500');
                        if (this.value.trim() === '') {
                            this.classList.add('border-gray-300');
                        }
                    });
                });
            });
        </script>
    </body>
</html>
