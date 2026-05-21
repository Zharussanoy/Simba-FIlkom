<x-guest-layout title="SIMBA-FILKOM">

{{-- NAVBAR GUEST --}}
<nav style="background: white; border-bottom: 1px solid #f3f4f6;
            position: fixed; top: 0; left: 0; right: 0; z-index: 50; height: 56px;">
    <div style="max-width: 1024px; margin: 0 auto; padding: 0 16px;
                height: 100%; display: flex; align-items: center; justify-content: space-between;">

        {{-- Logo --}}
        <div style="display: flex; align-items: center; gap: 8px;">
            <div style="width: 32px; height: 32px; background: #2563eb; border-radius: 8px;
                        display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                <svg style="width: 16px; height: 16px;" fill="none" stroke="white" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
                </svg>
            </div>
            <img src="{{ asset('images/logo-simba.png') }}" alt="SIMBA-FILKOM"
                 style="height: 28px; object-fit: contain;"
                 onerror="this.style.display='none'">
        </div>

        {{-- Tombol Masuk --}}
        <a href="{{ route('login') }}"
           style="background: #111827; color: white; font-size: 0.875rem;
                  padding: 8px 20px; border-radius: 8px; font-weight: 500;
                  text-decoration: none; transition: background 0.2s;"
           onmouseover="this.style.background='#374151'"
           onmouseout="this.style.background='#111827'">
            Masuk
        </a>

    </div>
</nav>

{{-- Spacer navbar --}}
<div style="height: 56px;"></div>

{{-- HERO --}}
<section style="background: #eff6ff; padding: 64px 16px 96px 16px;">
    <div style="max-width: 672px; margin: 0 auto; text-align: center;">

        {{-- Badge --}}
        <div style="display: inline-flex; align-items: center; gap: 6px;
                    border: 1px solid #bfdbfe; background: white; color: #6b7280;
                    font-size: 0.75rem; padding: 6px 12px; border-radius: 999px;
                    margin-bottom: 24px;">
            <svg style="width: 14px; height: 14px; color: #93c5fd; flex-shrink: 0;"
                 fill="none" stroke="#93c5fd" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            Sistem Informasi Barang Hilang & Temuan
        </div>

        <h1 style="font-size: 3rem; font-weight: 900; color: #111827;
                   margin-bottom: 20px; letter-spacing: -0.02em; line-height: 1.1;">
            SIMBA-FILKOM
        </h1>

        <p style="color: #6b7280; font-size: 1rem; line-height: 1.7;
                  margin-bottom: 32px; max-width: 512px; margin-left: auto; margin-right: auto;">
            Platform terpadu untuk melaporkan dan menemukan barang hilang di
            lingkungan Fakultas Ilmu Komputer Universitas Brawijaya
        </p>

        <div style="display: flex; justify-content: center; gap: 12px; flex-wrap: wrap;">
            <a href="{{ route('login') }}"
               style="display: inline-flex; align-items: center; gap: 8px;
                      background: #111827; color: white; font-size: 0.875rem;
                      padding: 10px 20px; border-radius: 12px; font-weight: 500;
                      text-decoration: none; transition: background 0.2s;"
               onmouseover="this.style.background='#374151'"
               onmouseout="this.style.background='#111827'">
                <svg style="width: 16px; height: 16px; flex-shrink: 0;"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
                </svg>
                Mulai Sekarang
            </a>

            <a href="{{ route('barang.public') }}"
               style="display: inline-flex; align-items: center; gap: 8px;
                      border: 1px solid #d1d5db; background: white; color: #374151;
                      font-size: 0.875rem; padding: 10px 20px; border-radius: 12px;
                      font-weight: 500; text-decoration: none; transition: background 0.2s;"
               onmouseover="this.style.background='#f9fafb'"
               onmouseout="this.style.background='white'">
                <svg style="width: 16px; height: 16px; flex-shrink: 0;"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"/>
                </svg>
                Lihat Barang Temuan
            </a>
        </div>

    </div>
</section>

{{-- FITUR UTAMA --}}
<section class="bg-white py-20">
    <div class="max-w-5xl mx-auto px-4">

        <h2 class="text-center text-2xl font-bold text-gray-900 mb-10">Fitur Utama</h2>

        <div class="grid sm:grid-cols-3 gap-4">

            <div class="p-5 bg-white border border-gray-200 rounded-2xl hover:shadow-sm transition">
                <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900 mb-1.5">Lapor Kehilangan</h3>
                <p class="text-sm text-gray-500 leading-relaxed">
                    Laporkan barang yang hilang dengan mudah dan cepat melalui formulir digital
                </p>
            </div>

            <div class="p-5 bg-white border border-gray-200 rounded-2xl hover:shadow-sm transition">
                <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2zM8 7V5a4 4 0 018 0v2"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900 mb-1.5">Katalog Barang Temuan</h3>
                <p class="text-sm text-gray-500 leading-relaxed">
                    Cari barang yang Anda hilangkan dengan filter lokasi dan kategori
                </p>
            </div>

            <div class="p-5 bg-white border border-gray-200 rounded-2xl hover:shadow-sm transition">
                <div class="w-10 h-10 bg-purple-100 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900 mb-1.5">Verifikasi Keamanan</h3>
                <p class="text-sm text-gray-500 leading-relaxed">
                    Sistem verifikasi untuk memastikan barang kembali ke pemilik yang sah
                </p>
            </div>

            <div class="p-5 bg-white border border-gray-200 rounded-2xl hover:shadow-sm transition">
                <div class="w-10 h-10 bg-orange-100 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900 mb-1.5">Real-time Update</h3>
                <p class="text-sm text-gray-500 leading-relaxed">
                    Notifikasi langsung saat barang Anda ditemukan atau ada update status
                </p>
            </div>

            <div class="p-5 bg-white border border-gray-200 rounded-2xl hover:shadow-sm transition">
                <div class="w-10 h-10 bg-red-100 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900 mb-1.5">Filter Lokasi</h3>
                <p class="text-sm text-gray-500 leading-relaxed">
                    Cari berdasarkan gedung (A, B, G, dll) untuk mempermudah pencarian
                </p>
            </div>

            <div class="p-5 bg-white border border-gray-200 rounded-2xl hover:shadow-sm transition">
                <div class="w-10 h-10 bg-indigo-100 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900 mb-1.5">Statistik & Laporan</h3>
                <p class="text-sm text-gray-500 leading-relaxed">
                    Dashboard monitoring untuk admin dan dekanat memantau aktivitas
                </p>
            </div>

        </div>
    </div>
</section>

{{-- CARA MENGGUNAKAN --}}
<section style="background: white; padding: 64px 16px;">
    <div style="max-width: 1024px; margin: 0 auto; border-radius: 24px; overflow: hidden;
                background: linear-gradient(135deg, #3b82f6 0%, #6d28d9 100%);">
        <div style="padding: 56px 32px; text-align: center;">

            <h2 style="font-size: 1.5rem; font-weight: 700; color: white; margin-bottom: 48px;">
                Cara Menggunakan SIMBA
            </h2>

            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 32px;">

                <div style="text-align: center;">
                    <div style="width: 48px; height: 48px; border-radius: 50%;
                                background: rgba(255,255,255,0.2); color: white;
                                font-size: 1.125rem; font-weight: 700;
                                display: flex; align-items: center; justify-content: center;
                                margin: 0 auto 16px auto; flex-shrink: 0;">
                        1
                    </div>
                    <h3 style="font-weight: 700; color: white; margin-bottom: 8px;">Login dengan Akun UB</h3>
                    <p style="font-size: 0.875rem; color: #bfdbfe; line-height: 1.6;">
                        Gunakan Google SSO dengan akun Universitas Brawijaya
                    </p>
                </div>

                <div style="text-align: center;">
                    <div style="width: 48px; height: 48px; border-radius: 50%;
                                background: rgba(255,255,255,0.2); color: white;
                                font-size: 1.125rem; font-weight: 700;
                                display: flex; align-items: center; justify-content: center;
                                margin: 0 auto 16px auto; flex-shrink: 0;">
                        2
                    </div>
                    <h3 style="font-weight: 700; color: white; margin-bottom: 8px;">Lapor atau Cari Barang</h3>
                    <p style="font-size: 0.875rem; color: #bfdbfe; line-height: 1.6;">
                        Laporkan barang hilang atau cari di katalog barang temuan
                    </p>
                </div>

                <div style="text-align: center;">
                    <div style="width: 48px; height: 48px; border-radius: 50%;
                                background: rgba(255,255,255,0.2); color: white;
                                font-size: 1.125rem; font-weight: 700;
                                display: flex; align-items: center; justify-content: center;
                                margin: 0 auto 16px auto; flex-shrink: 0;">
                        3
                    </div>
                    <h3 style="font-weight: 700; color: white; margin-bottom: 8px;">Klaim & Ambil Barang</h3>
                    <p style="font-size: 0.875rem; color: #bfdbfe; line-height: 1.6;">
                        Verifikasi kepemilikan dan ambil barang di pos keamanan
                    </p>
                </div>

            </div>
        </div>
    </div>
</section>
{{-- FOOTER --}}
<footer class="bg-gray-900 text-gray-400 py-10">
    <div class="max-w-5xl mx-auto px-4 text-center space-y-3">

        <div class="flex items-center justify-center gap-2">
            <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
                </svg>
            </div>
            <span class="text-white font-bold text-base">SIMBA-FILKOM</span>
        </div>

        <p class="text-sm">Sistem Informasi Barang Hilang & Temuan</p>
        <p class="text-xs text-gray-500">© 2026 Fakultas Ilmu Komputer, Universitas Brawijaya</p>

    </div>
</footer>

</x-guest-layout>