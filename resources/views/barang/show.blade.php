<x-app-layout title="{{ $barang->nama_barang }}">
<div class="max-w-5xl mx-auto px-4 sm:px-6 py-8">

    {{-- KEMBALI --}}
    <a href="{{ url()->previous() }}"
       style="display: inline-flex; align-items: center; gap: 6px; font-size: 0.875rem;
              color: #374151; text-decoration: none; margin-bottom: 24px; font-weight: 500;"
       onmouseover="this.style.color='#111827'"
       onmouseout="this.style.color='#374151'">
        <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Kembali
    </a>

    {{-- KONTEN UTAMA --}}
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 32px; align-items: start;">

        {{-- FOTO --}}
        <div style="border-radius: 16px; overflow: hidden; background: #f3f4f6;">
            @if($barang->foto)
                <img src="{{ Storage::url($barang->foto) }}"
                     alt="{{ $barang->nama_barang }}"
                     style="width: 100%; height: 360px; object-fit: cover; display: block;">
            @else
                <div style="width: 100%; height: 360px; display: flex; align-items: center;
                            justify-content: center; background: #f9fafb;">
                    <svg style="width: 64px; height: 64px;" fill="none" stroke="#d1d5db" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
            @endif
        </div>

        {{-- INFO --}}
        <div>

            {{-- Nama + Badge --}}
            <div style="display: flex; align-items: flex-start; justify-content: space-between;
                        gap: 12px; margin-bottom: 6px;">
                <h1 style="font-size: 1.625rem; font-weight: 800; color: #111827;
                           line-height: 1.2; margin: 0;">
                    {{ $barang->nama_barang }}
                </h1>
                @php
                    $status = strtolower($barang->status ?? 'tersedia');
                    $badgeLabel = $status === 'diklaim' ? 'Diklaim' : 'Tersedia';
                    $badgeBg = $status === 'diklaim' ? '#374151' : '#111827';
                @endphp
                <span style="background: {{ $badgeBg }}; color: white; font-size: 0.75rem;
                             font-weight: 600; padding: 4px 12px; border-radius: 999px;
                             white-space: nowrap; flex-shrink: 0;">
                    {{ $badgeLabel }}
                </span>
            </div>

            {{-- Kode --}}
            <p style="font-size: 0.875rem; color: #6b7280; margin: 0 0 20px 0;">
                Kode: {{ $barang->kode ?? 'SIMBA-' . date('Y') . '-' . str_pad($barang->id, 3, '0', STR_PAD_LEFT) }}
            </p>

            {{-- Detail Card --}}
            <div style="background: white; border: 1px solid #e5e7eb; border-radius: 14px;
                        padding: 20px; margin-bottom: 16px;">

                {{-- Kategori --}}
                <div style="display: flex; align-items: flex-start; gap: 12px; padding-bottom: 14px;
                            border-bottom: 1px solid #f3f4f6;">
                    <svg style="width: 18px; height: 18px; flex-shrink: 0; margin-top: 1px;"
                         fill="none" stroke="#9ca3af" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"/>
                    </svg>
                    <div>
                        <p style="font-size: 0.75rem; color: #9ca3af; margin: 0 0 2px 0;">Kategori</p>
                        <p style="font-size: 0.9375rem; font-weight: 600; color: #111827; margin: 0;">
                            {{ $barang->kategori->nama ?? '-' }}
                        </p>
                    </div>
                </div>

                {{-- Lokasi --}}
                <div style="display: flex; align-items: flex-start; gap: 12px; padding: 14px 0;
                            border-bottom: 1px solid #f3f4f6;">
                    <svg style="width: 18px; height: 18px; flex-shrink: 0; margin-top: 1px;"
                         fill="none" stroke="#9ca3af" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    </svg>
                    <div>
                        <p style="font-size: 0.75rem; color: #9ca3af; margin: 0 0 2px 0;">Lokasi Ditemukan</p>
                        <p style="font-size: 0.9375rem; font-weight: 600; color: #111827; margin: 0;">
                            {{ $barang->lokasi->nama ?? 'Tidak diketahui' }}
                        </p>
                    </div>
                </div>

                {{-- Tanggal --}}
                <div style="display: flex; align-items: flex-start; gap: 12px; padding: 14px 0;
                            border-bottom: 1px solid #f3f4f6;">
                    <svg style="width: 18px; height: 18px; flex-shrink: 0; margin-top: 1px;"
                         fill="none" stroke="#9ca3af" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <div>
                        <p style="font-size: 0.75rem; color: #9ca3af; margin: 0 0 2px 0;">Tanggal Ditemukan</p>
                        <p style="font-size: 0.9375rem; font-weight: 600; color: #111827; margin: 0;">
                            {{ \Carbon\Carbon::parse($barang->created_at)->format('Y-m-d') }}
                        </p>
                    </div>
                </div>

                {{-- Ditemukan Oleh --}}
                <div style="display: flex; align-items: flex-start; gap: 12px; padding-top: 14px;">
                    <svg style="width: 18px; height: 18px; flex-shrink: 0; margin-top: 1px;"
                         fill="none" stroke="#9ca3af" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div>
                        <p style="font-size: 0.75rem; color: #9ca3af; margin: 0 0 2px 0;">Ditemukan Oleh</p>
                        <p style="font-size: 0.9375rem; font-weight: 600; color: #111827; margin: 0;">
                            {{ $barang->user->name ?? 'Petugas Keamanan' }}
                        </p>
                    </div>
                </div>

            </div>

            {{-- Deskripsi --}}
            @if($barang->deskripsi)
                <div style="background: white; border: 1px solid #e5e7eb; border-radius: 14px;
                            padding: 20px; margin-bottom: 20px;">
                    <h3 style="font-size: 1rem; font-weight: 700; color: #111827; margin: 0 0 10px 0;">
                        Deskripsi
                    </h3>
                    <p style="font-size: 0.875rem; color: #374151; line-height: 1.7; margin: 0;">
                        {{ $barang->deskripsi }}
                    </p>
                </div>
            @endif

            {{-- Tombol Klaim --}}
            @if($status !== 'diklaim')
                @auth
                    <form method="POST" action="{{ route('barang.klaim', $barang->id) }}">
                        @csrf
                        <button type="submit"
                                style="width: 100%; padding: 14px; background: #111827; color: white;
                                       font-size: 1rem; font-weight: 700; border: none;
                                       border-radius: 12px; cursor: pointer; transition: background 0.2s;"
                                onmouseover="this.style.background='#374151'"
                                onmouseout="this.style.background='#111827'">
                            Klaim Barang Ini
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                       style="display: block; text-align: center; width: 100%; padding: 14px;
                              background: #111827; color: white; font-size: 1rem; font-weight: 700;
                              border-radius: 12px; text-decoration: none; box-sizing: border-box;
                              transition: background 0.2s;"
                       onmouseover="this.style.background='#374151'"
                       onmouseout="this.style.background='#111827'">
                        Login untuk Klaim Barang
                    </a>
                @endauth
            @else
                <button disabled
                        style="width: 100%; padding: 14px; background: #e5e7eb; color: #9ca3af;
                               font-size: 1rem; font-weight: 700; border: none;
                               border-radius: 12px; cursor: not-allowed;">
                    Barang Sudah Diklaim
                </button>
            @endif

        </div>
    </div>

</div>
</x-app-layout>