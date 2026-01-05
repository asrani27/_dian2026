<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.head')
    <body class="bg-gray-50">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Main Content -->
        <main class="lg:ml-64 pt-16 pb-16 px-4 lg:px-6">
            <!-- Page Header -->
            <div class="mb-8">
                <h1 class="text-2xl font-semibold text-gray-900">@yield('page-title', 'Dashboard')</h1>
                <p class="text-gray-600 mt-1">@yield('page-description', 'Selamat datang di sistem peminjaman alat laboratorium')</p>
            </div>

            <!-- Content Area -->
            <div class="min-h-[calc(100vh-8rem)]">
                @yield('content')
            </div>
        </main>

        <!-- Footer -->
        @include('layouts.footer')

        <!-- Mobile Menu Toggle -->
        <button data-drawer-target="sidebar" data-drawer-toggle="sidebar" aria-controls="sidebar" type="button" class="lg:hidden fixed top-4 left-4 z-40 p-2 rounded-lg bg-white border border-gray-200 hover:bg-gray-100">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        <!-- Scripts -->
        @stack('scripts')
        
        <!-- Initialize Flowbite for sidebar dropdown -->
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
        
        <!-- Custom JavaScript -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Initialize dropdown toggles
                const dropdownToggles = document.querySelectorAll('[data-collapse-toggle]');
                
                dropdownToggles.forEach(toggle => {
                    toggle.addEventListener('click', function() {
                        const targetId = this.getAttribute('data-collapse-toggle');
                        const target = document.getElementById(targetId);
                        
                        if (target) {
                            target.classList.toggle('hidden');
                            
                            // Rotate arrow icon
                            const arrow = this.querySelector('svg:last-child');
                            if (arrow) {
                                arrow.classList.toggle('rotate-180');
                            }
                        }
                    });
                });

                // Mobile menu toggle
                const mobileMenuToggle = document.querySelector('[data-drawer-toggle="sidebar"]');
                const sidebar = document.querySelector('[aria-label="Sidebar"]');
                
                if (mobileMenuToggle && sidebar) {
                    mobileMenuToggle.addEventListener('click', function() {
                        sidebar.classList.toggle('-translate-x-full');
                    });
                }

                // Close mobile menu when clicking outside
                document.addEventListener('click', function(event) {
                    const sidebar = document.querySelector('[aria-label="Sidebar"]');
                    const toggle = document.querySelector('[data-drawer-toggle="sidebar"]');
                    
                    if (sidebar && toggle && !sidebar.contains(event.target) && !toggle.contains(event.target)) {
                        if (window.innerWidth < 1024) {
                            sidebar.classList.add('-translate-x-full');
                        }
                    }
                });
            });

            // Fungsi konfirmasi logout
            function confirmLogout() {
                // Buat modal konfirmasi
                const modal = document.createElement('div');
                modal.className = 'fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm';
                modal.innerHTML = `
                    <div class="bg-white rounded-2xl p-6 max-w-md w-full mx-4 transform transition-all scale-100 shadow-2xl">
                        <div class="text-center">
                            <div class="mx-auto flex items-center justify-center w-16 h-16 bg-red-100 rounded-full mb-4">
                                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Konfirmasi Keluar</h3>
                            <p class="text-gray-600 mb-6">Apakah Anda yakin ingin keluar dari sistem?</p>
                            
                            <div class="flex space-x-3">
                                <button onclick="closeLogoutModal()" class="flex-1 px-4 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors font-medium">
                                    Batal
                                </button>
                                <form action="{{ route('logout') }}" method="POST" class="flex-1">
                                    @csrf
                                    <button type="submit" class="w-full px-4 py-2 text-white bg-red-600 hover:bg-red-700 rounded-lg transition-colors font-medium">
                                        Ya, Keluar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                `;

                // Tambahkan modal ke body
                document.body.appendChild(modal);

                // Fungsi untuk menutup modal
                window.closeLogoutModal = function() {
                    modal.remove();
                };

                // Tutup modal saat klik di luar
                modal.addEventListener('click', function(event) {
                    if (event.target === modal) {
                        closeLogoutModal();
                    }
                });

                // Tutup modal dengan tombol Escape
                document.addEventListener('keydown', function(event) {
                    if (event.key === 'Escape') {
                        closeLogoutModal();
                    }
                });
            }
        </script>
    </body>
</html>
