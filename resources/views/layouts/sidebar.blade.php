<!-- Sidebar -->
<aside class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full lg:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gradient-to-br from-blue-600 to-emerald-600 text-white relative scrollbar-thin">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid-sidebar" width="40" height="40" patternUnits="userSpaceOnUse">
                        <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid-sidebar)" />
            </svg>
        </div>
        
        <div class="relative z-10">
        <!-- Logo -->
        <div class="mb-8 px-4">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-lg font-semibold text-white">Lab System</h1>
                    <p class="text-xs text-white/80">Peminjaman Alat</p>
                </div>
            </div>
        </div>

        <!-- User Info -->
        <div class="mb-6 px-4">
            <div class="flex items-center space-x-3 p-3 bg-white/20 backdrop-blur-sm rounded-lg">
                <div class="w-10 h-10 bg-white/30 rounded-full flex items-center justify-center">
                    <span class="text-white font-semibold">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-white truncate">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-white/80 truncate">{{ ucfirst(Auth::user()->role) }}</p>
                </div>
            </div>
        </div>

        <!-- Navigation Menu -->
        <ul class="space-y-2 font-medium">
            <!-- Dashboard -->
            <li>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center p-3 text-white rounded-lg hover:bg-white/20 group {{ request()->routeIs('admin.dashboard') ? 'bg-white/20' : '' }}">
                    <svg class="flex-shrink-0 w-5 h-5 text-white/90 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>

            <!-- Data Menu -->
            <li>
                <button type="button" class="flex items-center p-3 w-full text-white rounded-lg hover:bg-white/20 group transition-all duration-200 {{ request()->routeIs('admin.alat.*') || request()->routeIs('admin.dosen.*') || request()->routeIs('admin.mahasiswa.*') || request()->routeIs('admin.sanksi.*') ? 'bg-white/20' : '' }}" aria-controls="data-dropdown" data-collapse-toggle="data-dropdown">
                    <svg class="flex-shrink-0 w-5 h-5 text-white/90 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    <span class="ml-3 flex-1 text-left">Data</span>
                    <svg class="w-4 h-4 text-white/90 group-hover:text-white transition-transform duration-200 {{ request()->routeIs('admin.alat.*') || request()->routeIs('admin.dosen.*') || request()->routeIs('admin.mahasiswa.*') || request()->routeIs('admin.sanksi.*') ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <ul id="data-dropdown" class="{{ request()->routeIs('admin.alat.*') || request()->routeIs('admin.dosen.*') || request()->routeIs('admin.mahasiswa.*') || request()->routeIs('admin.sanksi.*') ? '' : 'hidden' }} py-2 space-y-2">
                    <li>
                        <a href="{{ route('admin.alat.index') }}" class="flex items-center p-2 pl-11 w-full text-white/80 rounded-lg hover:bg-white/10 group transition-colors {{ request()->routeIs('admin.alat.*') ? 'bg-white/10' : '' }}">
                            <svg class="flex-shrink-0 w-4 h-4 text-white/70 group-hover:text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/>
                            </svg>
                            <span class="ml-2">Alat</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.dosen.index') }}" class="flex items-center p-2 pl-11 w-full text-white/80 rounded-lg hover:bg-white/10 group transition-colors {{ request()->routeIs('admin.dosen.*') ? 'bg-white/10' : '' }}">
                            <svg class="flex-shrink-0 w-4 h-4 text-white/70 group-hover:text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span class="ml-2">Dosen</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.mahasiswa.index') }}" class="flex items-center p-2 pl-11 w-full text-white/80 rounded-lg hover:bg-white/10 group transition-colors {{ request()->routeIs('admin.mahasiswa.*') ? 'bg-white/10' : '' }}">
                            <svg class="flex-shrink-0 w-4 h-4 text-white/70 group-hover:text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                            <span class="ml-2">Mahasiswa</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.sanksi.index') }}" class="flex items-center p-2 pl-11 w-full text-white/80 rounded-lg hover:bg-white/10 group transition-colors {{ request()->routeIs('admin.sanksi.*') ? 'bg-white/10' : '' }}">
                            <svg class="flex-shrink-0 w-4 h-4 text-white/70 group-hover:text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                            </svg>
                            <span class="ml-2">Sanksi</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Peminjaman -->
            <li>
                <a href="{{ route('admin.peminjaman.index') }}" class="flex items-center p-3 text-white rounded-lg hover:bg-white/20 group {{ request()->routeIs('admin.peminjaman.*') ? 'bg-white/20' : '' }}">
                    <svg class="flex-shrink-0 w-5 h-5 text-white/90 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span class="ml-3">Peminjaman</span>
                </a>
            </li>

            <!-- Pengembalian -->
            <li>
                <a href="{{ route('admin.pengembalian.index') }}" class="flex items-center p-3 text-white rounded-lg hover:bg-white/20 group {{ request()->routeIs('admin.pengembalian.*') ? 'bg-white/20' : '' }}">
                    <svg class="flex-shrink-0 w-5 h-5 text-white/90 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    <span class="ml-3">Pengembalian</span>
                </a>
            </li>

            <!-- Laporan -->
            <li>
                <a href="{{ route('admin.laporan.index') }}" class="flex items-center p-3 text-white rounded-lg hover:bg-white/20 group {{ request()->routeIs('admin.laporan.*') ? 'bg-white/20' : '' }}">
                    <svg class="flex-shrink-0 w-5 h-5 text-white/90 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v1a1 1 0 001 1h4a1 1 0 001-1v-1m3-2V8a2 2 0 00-2-2H8a2 2 0 00-2 2v6m12-4H4"/>
                    </svg>
                    <span class="ml-3">Laporan</span>
                </a>
            </li>

            <!-- Divider -->
            <li class="pt-4 border-t border-white/20">
                <!-- Logout dengan Konfirmasi -->
                <button type="button" onclick="confirmLogout()" class="flex items-center p-3 w-full text-white rounded-lg hover:bg-red-500/20 group transition-colors">
                    <svg class="flex-shrink-0 w-5 h-5 text-white/90 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    <span class="ml-3">Keluar</span>
                </button>
            </li>
        </ul>
    </div>
</aside>
