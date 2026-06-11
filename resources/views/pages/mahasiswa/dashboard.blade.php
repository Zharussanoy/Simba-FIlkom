<x-app-layout title="Dashboard">

    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-8 space-y-6">

        {{-- HEADER --}}
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
            <p class="text-gray-500 text-sm mt-0.5">
                Selamat datang, {{ auth()->user()->name }}
            </p>
        </div>

        {{-- STAT CARDS --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

            <div class="bg-white border border-gray-200 rounded-2xl p-5">
                <div class="flex items-center justify-between">
                    <p class="text-sm text-gray-500">Total Laporan</p>
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2zM16 3H8a2 2 0 00-2 2v2h12V5a2 2 0 00-2-2z"/>
                    </svg>
                </div>
                <p class="text-3xl font-bold text-gray-900 mt-3">{{ $totalLaporan }}</p>
                <p class="text-xs text-gray-400 mt-1">Barang yang dilaporkan hilang</p>
            </div>

            <div class="bg-white border border-gray-200 rounded-2xl p-5">
                <div class="flex items-center justify-between">
                    <p class="text-sm text-gray-500">Ditemukan</p>
                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <p class="text-3xl font-bold text-gray-900 mt-3">{{ $totalDitemukan ?? 0 }}</p>
                <p class="text-xs text-gray-400 mt-1">Barang berhasil ditemukan</p>
            </div>

            <div class="bg-white border border-gray-200 rounded-2xl p-5">
                <div class="flex items-center justify-between">
                    <p class="text-sm text-gray-500">Menunggu</p>
                    <svg class="w-5 h-5 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <p class="text-3xl font-bold text-gray-900 mt-3">{{ $totalMenunggu ?? 0 }}</p>
                <p class="text-xs text-gray-400 mt-1">Masih dalam pencarian</p>
            </div>

        </div>

        {{-- ACTION CARDS --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

            <a href="{{ route('laporan.create') }}"
               class="bg-white border border-gray-200 rounded-2xl p-6 hover:border-blue-300 hover:shadow-sm transition group">
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mb-4 group-hover:bg-blue-200 transition">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900">Lapor Kehilangan Baru</h3>
                <p class="text-sm text-gray-500 mt-1">Laporkan barang yang hilang dengan mengisi formulir</p>
            </a>

            <a href="{{ route('barang.public') }}"
               class="bg-white border border-gray-200 rounded-2xl p-6 hover:border-green-300 hover:shadow-sm transition group">
                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mb-4 group-hover:bg-green-200 transition">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900">Cari Barang Temuan</h3>
                <p class="text-sm text-gray-500 mt-1">Lihat katalog barang yang ditemukan oleh petugas</p>
            </a>

        </div>

        {{-- RIWAYAT LAPORAN --}}
        <div class="bg-white border border-gray-200 rounded-2xl p-5">

            <div class="mb-4">
                <h3 class="font-semibold text-gray-900">Riwayat Laporan Saya</h3>
                <p class="text-sm text-gray-500 mt-0.5">Daftar barang yang pernah Anda laporkan hilang</p>
            </div>

            <div class="space-y-3">
                @forelse($laporanTerbaru as $laporan)
                    <div class="flex items-center gap-4 p-3 rounded-xl border border-gray-100 hover:bg-gray-50 transition">

                        {{-- Thumbnail --}}
                        <div class="w-14 h-14 rounded-xl bg-gray-200 overflow-hidden flex-shrink-0">
                            @if($laporan->foto)
                                <img src="{{ Storage::url($laporan->foto) }}"
                                     class="w-full h-full object-cover"
                                     alt="{{ $laporan->judul }}">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-gray-300 to-gray-400"></div>
                            @endif
                        </div>

                        {{-- Info --}}
                        <div class="flex-1 min-w-0">
                            <p class="font-semibold text-gray-900 text-sm truncate">
                                {{ $laporan->judul }}
                            </p>
                            <p class="text-xs text-gray-500 mt-0.5">
                                {{ $laporan->kategori->nama ?? 'Lainnya' }}  {{-- ← DIUBAH --}}
                                @if($laporan->lokasi)
                                    • {{ $laporan->lokasi->nama ?? 'Lokasi tidak diketahui' }}  {{-- ← DIUBAH --}}
                                @endif
                            </p>
                            <p class="text-xs text-gray-400 mt-0.5">
                                {{ \Carbon\Carbon::parse($laporan->created_at)->format('Y-m-d') }}
                            </p>
                        </div>

                        {{-- Status Badge --}}
                        @php
                            $status = strtolower($laporan->status ?? 'pending');
                            $badgeClass = match($status) {
                                'ditemukan', 'found'  => 'bg-gray-900 text-white',
                                'pending'             => 'bg-gray-100 text-gray-600 border border-gray-200',
                                default               => 'bg-gray-100 text-gray-600',
                            };
                            $badgeLabel = match($status) {
                                'ditemukan', 'found' => '✓ Ditemukan',
                                'pending'            => '⏱ Pending',
                                default              => ucfirst($laporan->status),
                            };
                        @endphp
                        <span class="text-xs px-3 py-1.5 rounded-full font-medium flex-shrink-0 {{ $badgeClass }}">
                            {{ $badgeLabel }}
                        </span>

                    </div>
                @empty
                    <div class="text-center py-8">
                        <p class="text-sm text-gray-400">Belum ada laporan</p>
                    </div>
                @endforelse
            </div>

        </div>

    </div>

</x-app-layout>