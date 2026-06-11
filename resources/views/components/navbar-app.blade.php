<nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="flex items-center justify-between h-14">

            {{-- LOGO & BRAND --}}
            <div class="flex items-center gap-2">
                <img src="{{ asset('images/logo-simba.png') }}" alt="SIMBA" class="h-8 object-contain"
                     onerror="this.style.display='none'">
                <p class="text-xs text-gray-400 leading-none">FILKOM UB</p>
            </div>

            {{-- NAV LINKS --}}
            <div class="hidden sm:flex items-center gap-6">
                <a href="{{ route('dashboard') }}"
                   class="text-sm font-medium {{ request()->routeIs('dashboard') ? 'text-gray-900' : 'text-gray-500 hover:text-gray-900' }} transition">
                    Dashboard
                </a>
                <a href="{{ route('barang.public') }}"
                   class="text-sm font-medium {{ request()->routeIs('barang.*') ? 'text-gray-900' : 'text-gray-500 hover:text-gray-900' }} transition">
                    Cari Barang
                </a>
                <a href="{{ route('laporan.create') }}"
                   class="text-sm font-medium {{ request()->routeIs('laporan.*') ? 'text-gray-900' : 'text-gray-500 hover:text-gray-900' }} transition">
                    Lapor Hilang
                </a>

                {{-- Hanya muncul untuk security --}}
                @if(auth()->user()?->role === 'security')
                    <a href="{{ route('security.dashboard') }}"
                       class="text-sm font-medium {{ request()->routeIs('security.*') ? 'text-gray-900' : 'text-gray-500 hover:text-gray-900' }} transition">
                        Verifikasi
                    </a>
                @endif
            </div>

            {{-- RIGHT ACTIONS --}}
            <div class="flex items-center gap-3">
                {{-- Notifikasi --}}
                <button class="relative p-2 text-gray-500 hover:text-gray-900 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                    <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>

                {{-- Profile --}}
                <a href="{{ route('profile.index') }}"
                   class="p-2 text-gray-500 hover:text-gray-900 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </a>

                {{-- Keluar --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="text-sm font-medium px-4 py-1.5 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                        Keluar
                    </button>
                </form>
            </div>

        </div>
    </div>
</nav>