<x-app-layout title="Dashboard Security">
<div class="max-w-5xl mx-auto px-4 sm:px-6 py-8">

    {{-- NOTIFIKASI --}}
    @if(session('success'))
    <div id="notif-ok" style="position: fixed; top: 80px; right: 20px; z-index: 200;
            background: white; border: 1px solid #bbf7d0; border-radius: 14px;
            padding: 14px 18px; box-shadow: 0 8px 24px rgba(0,0,0,0.1);
            display: flex; align-items: flex-start; gap: 12px; max-width: 360px;">
        <div style="width: 32px; height: 32px; background: #dcfce7; border-radius: 8px;
                    display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
            <svg style="width: 16px; height: 16px;" fill="none" stroke="#16a34a" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
        </div>
        <div style="flex: 1;">
            <p style="font-size: 0.875rem; font-weight: 600; color: #111827; margin: 0 0 2px 0;">Berhasil!</p>
            <p style="font-size: 0.8125rem; color: #6b7280; margin: 0;">{{ session('success') }}</p>
        </div>
        <button onclick="this.parentElement.style.display='none'"
                style="background: none; border: none; cursor: pointer; color: #9ca3af;">✕</button>
    </div>
    <script>setTimeout(() => { const el = document.getElementById('notif-ok'); if(el) el.style.display='none'; }, 5000);</script>
    @endif

    @if(session('error'))
    <div id="notif-err" style="position: fixed; top: 80px; right: 20px; z-index: 200;
            background: white; border: 1px solid #fecaca; border-radius: 14px;
            padding: 14px 18px; box-shadow: 0 8px 24px rgba(0,0,0,0.1);
            display: flex; align-items: flex-start; gap: 12px; max-width: 360px;">
        <div style="width: 32px; height: 32px; background: #fef2f2; border-radius: 8px;
                    display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
            <svg style="width: 16px; height: 16px;" fill="none" stroke="#dc2626" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </div>
        <div style="flex: 1;">
            <p style="font-size: 0.875rem; font-weight: 600; color: #111827; margin: 0 0 2px 0;">Ditolak</p>
            <p style="font-size: 0.8125rem; color: #6b7280; margin: 0;">{{ session('error') }}</p>
        </div>
        <button onclick="this.parentElement.style.display='none'"
                style="background: none; border: none; cursor: pointer; color: #9ca3af;">✕</button>
    </div>
    <script>setTimeout(() => { const el = document.getElementById('notif-err'); if(el) el.style.display='none'; }, 5000);</script>
    @endif

    {{-- HEADER --}}
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 28px;">
        <div style="display: flex; align-items: center; gap: 16px;">
            <div style="width: 48px; height: 48px; background: #eff6ff; border-radius: 14px;
                        display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                <svg style="width: 24px; height: 24px;" fill="none" stroke="#2563eb" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
            <div>
                <h1 style="font-size: 1.5rem; font-weight: 800; color: #111827; margin: 0;">
                    Dashboard Security
                </h1>
                <p style="font-size: 0.875rem; color: #6b7280; margin: 0;">Kelola barang hilang & temuan</p>
            </div>
        </div>

        <button onclick="document.getElementById('modal-input').style.display='flex'"
                style="display: inline-flex; align-items: center; gap: 8px;
                       background: #111827; color: white; font-size: 0.875rem; font-weight: 600;
                       padding: 10px 18px; border-radius: 12px; border: none; cursor: pointer;"
                onmouseover="this.style.background='#374151'"
                onmouseout="this.style.background='#111827'">
            <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Input Barang Temuan
        </button>
    </div>

    {{-- STAT CARDS --}}
    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; margin-bottom: 24px;">

        <div style="background: white; border: 1px solid #e5e7eb; border-radius: 16px; padding: 18px;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 10px;">
                <p style="font-size: 0.8125rem; color: #6b7280; margin: 0;">Laporan Hilang</p>
                <svg style="width: 16px; height: 16px;" fill="none" stroke="#f87171" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            <p style="font-size: 1.75rem; font-weight: 800; color: #111827; margin: 0 0 4px 0;">{{ $totalLaporan }}</p>
            <p style="font-size: 0.75rem; color: #9ca3af; margin: 0;">Sedang dicari</p>
        </div>

        <div style="background: white; border: 1px solid #e5e7eb; border-radius: 16px; padding: 18px;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 10px;">
                <p style="font-size: 0.8125rem; color: #6b7280; margin: 0;">Klaim Pending</p>
                <svg style="width: 16px; height: 16px;" fill="none" stroke="#f59e0b" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <p style="font-size: 1.75rem; font-weight: 800; color: #111827; margin: 0 0 4px 0;">{{ $totalKlaim }}</p>
            <p style="font-size: 0.75rem; color: #9ca3af; margin: 0;">Perlu verifikasi</p>
        </div>

        <div style="background: white; border: 1px solid #e5e7eb; border-radius: 16px; padding: 18px;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 10px;">
                <p style="font-size: 0.8125rem; color: #6b7280; margin: 0;">Barang Temuan</p>
                <svg style="width: 16px; height: 16px;" fill="none" stroke="#3b82f6" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"/>
                </svg>
            </div>
            <p style="font-size: 1.75rem; font-weight: 800; color: #111827; margin: 0 0 4px 0;">{{ $totalBarang }}</p>
            <p style="font-size: 0.75rem; color: #9ca3af; margin: 0;">Tersedia</p>
        </div>

        <div style="background: white; border: 1px solid #e5e7eb; border-radius: 16px; padding: 18px;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 10px;">
                <p style="font-size: 0.8125rem; color: #6b7280; margin: 0;">Dikembalikan</p>
                <svg style="width: 16px; height: 16px;" fill="none" stroke="#22c55e" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <p style="font-size: 1.75rem; font-weight: 800; color: #111827; margin: 0 0 4px 0;">{{ $totalKembali }}</p>
            <p style="font-size: 0.75rem; color: #9ca3af; margin: 0;">Bulan ini</p>
        </div>

    </div>

    {{-- TABS --}}
    <div style="background: #f3f4f6; border-radius: 12px; padding: 4px;
                display: flex; gap: 4px; margin-bottom: 20px;">
        @foreach([
            ['key' => 'laporan',    'label' => 'Laporan Hilang',   'count' => $laporans->count()],
            ['key' => 'barang',     'label' => 'Barang Temuan',    'count' => $barangs->count()],
            ['key' => 'verifikasi', 'label' => 'Verifikasi Klaim', 'count' => $klaimPending->count()],
        ] as $t)
            <button onclick="switchTab('{{ $t['key'] }}')"
                    id="tab-btn-{{ $t['key'] }}"
                    style="flex: 1; padding: 9px 12px; border-radius: 8px; border: none;
                           font-size: 0.875rem; font-weight: 500; cursor: pointer; transition: all 0.2s;
                           {{ $tab === $t['key'] ? 'background: white; color: #111827; box-shadow: 0 1px 4px rgba(0,0,0,0.08);' : 'background: transparent; color: #6b7280;' }}">
                {{ $t['label'] }} ({{ $t['count'] }})
            </button>
        @endforeach
    </div>

    {{-- TAB: LAPORAN HILANG --}}
    <div id="tab-laporan" style="display: {{ $tab === 'laporan' ? 'block' : 'none' }};">
        <div style="background: white; border: 1px solid #e5e7eb; border-radius: 16px; overflow: hidden;">

            <div style="padding: 16px 20px; border-bottom: 1px solid #f3f4f6;
                        display: flex; justify-content: space-between; align-items: center;">
                <h3 style="font-size: 0.9375rem; font-weight: 700; color: #111827; margin: 0;">
                    Database Laporan Barang Hilang
                </h3>
                <div style="position: relative;">
                    <svg style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%);
                                width: 14px; height: 14px;" fill="none" stroke="#9ca3af" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
                    </svg>
                    <input type="text" placeholder="Cari laporan..."
                           oninput="filterLaporan(this.value)"
                           style="padding: 8px 12px 8px 30px; border: 1px solid #e5e7eb;
                                  border-radius: 8px; font-size: 0.8125rem; outline: none; width: 200px;"
                           onfocus="this.style.borderColor='#2563eb'"
                           onblur="this.style.borderColor='#e5e7eb'">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 130px 1fr 160px 120px 50px;
                        padding: 12px 20px; background: #f9fafb; border-bottom: 1px solid #f3f4f6;">
                @foreach(['Kode','Barang','Pelapor','Status','Aksi'] as $h)
                    <p style="font-size: 0.75rem; font-weight: 600; color: #6b7280; margin: 0;">{{ $h }}</p>
                @endforeach
            </div>

            <div id="laporan-list">
                @forelse($laporans as $laporan)
                    @php
                        $ls = strtolower($laporan->status ?? 'menunggu');
                        $lBadge = match($ls) {
                            'ditemukan'  => 'background:#dcfce7; color:#16a34a;',
                            'disetujui'  => 'background:#dbeafe; color:#2563eb;',
                            'ditutup'    => 'background:#111827; color:white;',
                            default      => 'background:#fee2e2; color:#dc2626;',
                        };
                        $lLabel = match($ls) {
                            'ditemukan'  => 'Dikembalikan',
                            'disetujui'  => 'Ditemukan',
                            'ditutup'    => 'Ditutup',
                            default      => 'Dicari',
                        };
                    @endphp
                    <div class="laporan-row"
                         data-nama="{{ strtolower($laporan->judul) }}"
                         style="display: grid; grid-template-columns: 130px 1fr 160px 120px 50px;
                                padding: 14px 20px; border-bottom: 1px solid #f9fafb; align-items: center;">

                        <p style="font-size: 0.75rem; color: #9ca3af; margin: 0; font-family: monospace;">
                            LOST-{{ date('Y') }}-{{ str_pad($laporan->id, 3, '0', STR_PAD_LEFT) }}
                        </p>

                        <div>
                            <p style="font-size: 0.875rem; font-weight: 600; color: #111827; margin: 0 0 2px 0;">
                                {{ $laporan->judul }}
                            </p>
                            <p style="font-size: 0.75rem; color: #9ca3af; margin: 0;">
                                {{ $laporan->kategori->nama ?? '-' }}
                            </p>
                        </div>

                        <div>
                            <p style="font-size: 0.875rem; color: #374151; margin: 0 0 2px 0;">
                                {{ $laporan->user->name ?? '-' }}
                            </p>
                            <p style="font-size: 0.75rem; color: #9ca3af; margin: 0;">
                                {{ $laporan->user->nim ?? '-' }}
                            </p>
                        </div>

                        <span style="font-size: 0.75rem; font-weight: 600; padding: 4px 10px;
                                     border-radius: 999px; {{ $lBadge }}">
                            {{ $lLabel }}
                        </span>

                        <button onclick="openDetailLaporan({{ $laporan->id }})"
                                style="background: none; border: none; cursor: pointer;
                                       color: #9ca3af; padding: 4px;"
                                onmouseover="this.style.color='#374151'"
                                onmouseout="this.style.color='#9ca3af'">
                            <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </button>
                    </div>
                @empty
                    <div style="padding: 40px; text-align: center;">
                        <p style="color: #9ca3af; font-size: 0.875rem;">Belum ada laporan</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    {{-- TAB: BARANG TEMUAN --}}
    <div id="tab-barang" style="display: {{ $tab === 'barang' ? 'block' : 'none' }};">
        <div style="background: white; border: 1px solid #e5e7eb; border-radius: 16px; overflow: hidden;">

            <div style="padding: 16px 20px; border-bottom: 1px solid #f3f4f6;
                        display: flex; justify-content: space-between; align-items: center;">
                <h3 style="font-size: 0.9375rem; font-weight: 700; color: #111827; margin: 0;">
                    Database Barang Temuan
                </h3>
                <div style="position: relative;">
                    <svg style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%);
                                width: 14px; height: 14px;" fill="none" stroke="#9ca3af" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
                    </svg>
                    <input type="text" placeholder="Cari barang..."
                           oninput="filterBarang(this.value)"
                           style="padding: 8px 12px 8px 30px; border: 1px solid #e5e7eb;
                                  border-radius: 8px; font-size: 0.8125rem; outline: none; width: 200px;"
                           onfocus="this.style.borderColor='#2563eb'"
                           onblur="this.style.borderColor='#e5e7eb'">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 140px 1fr 120px 110px 50px;
                        padding: 12px 20px; background: #f9fafb; border-bottom: 1px solid #f3f4f6;">
                @foreach(['Kode','Barang','Kategori','Status','Aksi'] as $h)
                    <p style="font-size: 0.75rem; font-weight: 600; color: #6b7280; margin: 0;">{{ $h }}</p>
                @endforeach
            </div>

            <div id="barang-list">
                @forelse($barangs as $b)
                    @php
                        $bs = strtolower($b->status ?? 'tersedia');
                        $bBadge = match($bs) {
                            'tersedia'            => 'background:#111827; color:white;',
                            'diklaim'             => 'background:#f3f4f6; color:#374151; border:1px solid #e5e7eb;',
                            'menunggu_verifikasi' => 'background:#fef3c7; color:#d97706;',
                            default               => 'background:#f3f4f6; color:#374151;',
                        };
                        $bLabel = match($bs) {
                            'tersedia'            => 'Tersedia',
                            'diklaim'             => 'Diklaim',
                            'menunggu_verifikasi' => 'Menunggu',
                            default               => ucfirst($bs),
                        };
                    @endphp
                    <div class="barang-row"
                         data-nama="{{ strtolower($b->nama_barang) }}"
                         style="display: grid; grid-template-columns: 140px 1fr 120px 110px 50px;
                                padding: 14px 20px; border-bottom: 1px solid #f9fafb; align-items: center;">

                        <p style="font-size: 0.75rem; color: #9ca3af; margin: 0; font-family: monospace;">
                            SIMBA-{{ date('Y') }}-{{ str_pad($b->id, 3, '0', STR_PAD_LEFT) }}
                        </p>

                        <div style="display: flex; align-items: center; gap: 10px;">
                            @if($b->foto)
                                <img src="{{ Storage::url($b->foto) }}"
                                     style="width: 36px; height: 36px; border-radius: 8px;
                                            object-fit: cover; flex-shrink: 0;">
                            @else
                                <div style="width: 36px; height: 36px; border-radius: 8px;
                                            background: #f3f4f6; flex-shrink: 0;"></div>
                            @endif
                            <p style="font-size: 0.875rem; font-weight: 600; color: #111827; margin: 0;">
                                {{ $b->nama_barang }}
                            </p>
                        </div>

                        <p style="font-size: 0.8125rem; color: #6b7280; margin: 0;">
                            {{ $b->kategori->nama ?? '-' }}
                        </p>

                        <span style="font-size: 0.75rem; font-weight: 600; padding: 4px 10px;
                                     border-radius: 999px; {{ $bBadge }}">
                            {{ $bLabel }}
                        </span>

                        {{-- GANTI: buka popup bukan redirect --}}
                        <button onclick="openDetailBarang({{ $b->id }})"
                                style="background: none; border: none; cursor: pointer;
                                       color: #9ca3af; padding: 4px;"
                                onmouseover="this.style.color='#374151'"
                                onmouseout="this.style.color='#9ca3af'">
                            <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </button>
                    </div>
                @empty
                    <div style="padding: 40px; text-align: center;">
                        <p style="color: #9ca3af; font-size: 0.875rem;">Belum ada barang temuan</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    {{-- TAB: VERIFIKASI KLAIM --}}
    <div id="tab-verifikasi" style="display: {{ $tab === 'verifikasi' ? 'block' : 'none' }};">
        <div style="display: flex; flex-direction: column; gap: 16px;">
            @forelse($klaimPending as $klaim)
                @php $barang = $klaim->barang; @endphp
                <div style="background: white; border: 1px solid #e5e7eb; border-radius: 16px; padding: 24px;">

                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
                        <div>
                            <h3 style="font-size: 1.0625rem; font-weight: 700; color: #111827; margin: 0 0 4px 0;">
                                {{ $barang->nama_barang }}
                            </h3>
                            <p style="font-size: 0.8125rem; color: #6b7280; margin: 0 0 2px 0;">
                                Diklaim oleh:
                                <strong style="color: #2563eb;">
                                    {{ $klaim->user->name ?? '-' }}
                                    @if($klaim->user?->nim)
                                        ({{ $klaim->user->nim }})
                                    @endif
                                </strong>
                            </p>
                            <p style="font-size: 0.75rem; color: #9ca3af; margin: 0;">
                                Kode: SIMBA-{{ date('Y') }}-{{ str_pad($barang->id, 3, '0', STR_PAD_LEFT) }} •
                                {{ \Carbon\Carbon::parse($klaim->created_at)->format('Y-m-d H:i') }}
                            </p>
                        </div>
                        <span style="font-size: 0.75rem; font-weight: 600; padding: 5px 12px;
                                    border-radius: 999px; background: #fef3c7; color: #d97706;
                                    display: flex; align-items: center; gap: 5px;">
                            Pending
                        </span>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                        {{-- Foto Barang --}}
                        <div>
                            <p style="font-size: 0.8125rem; font-weight: 600; color: #374151; margin: 0 0 10px 0;">
                                Foto Barang
                            </p>
                            @if($barang->foto)
                                <img src="{{ Storage::url($barang->foto) }}"
                                    style="width: 100%; height: 200px; object-fit: cover;
                                            border-radius: 12px; border: 1px solid #e5e7eb;">
                            @else
                                <div style="width: 100%; height: 200px; background: #f9fafb;
                                            border-radius: 12px; border: 1px solid #e5e7eb;
                                            display: flex; align-items: center; justify-content: center;">
                                    <p style="color: #9ca3af; font-size: 0.8125rem;">Tidak ada foto</p>
                                </div>
                            @endif
                            <p style="font-size: 0.75rem; color: #9ca3af; margin: 8px 0 0 0;">
                                Lokasi: {{ $barang->lokasi->nama ?? '-' }}
                            </p>
                        </div>

                        {{-- Bukti Kepemilikan --}}
                        <div>
                            <p style="font-size: 0.8125rem; font-weight: 600; color: #374151; margin: 0 0 10px 0;">
                                Bukti Kepemilikan
                            </p>
                            {{-- Foto bukti kalau ada --}}
                            @if($klaim->foto_bukti)
                                <img src="{{ Storage::url($klaim->foto_bukti) }}"
                                    style="width: 100%; height: 140px; object-fit: cover;
                                            border-radius: 10px; border: 1px solid #e5e7eb; margin-bottom: 10px;">
                            @endif
                            <div style="width: 100%; min-height: {{ $klaim->foto_bukti ? '60px' : '200px' }};
                                        background: #f9fafb; border-radius: 12px;
                                        border: 1px solid #e5e7eb; padding: 16px; box-sizing: border-box;">
                                <p style="font-size: 0.8125rem; color: #6b7280; line-height: 1.7; margin: 0;">
                                    {{ $klaim->bukti_kepemilikan ?? 'Tidak ada keterangan' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                        <button onclick="openSetujuiModal({{ $barang->id }})"
                                style="width: 100%; padding: 13px; background: #111827; color: white;
                                    font-size: 0.9375rem; font-weight: 700; border: none;
                                    border-radius: 12px; cursor: pointer; display: flex;
                                    align-items: center; justify-content: center; gap: 8px;"
                                onmouseover="this.style.background='#374151'"
                                onmouseout="this.style.background='#111827'">
                            Setujui Klaim
                        </button>
                        <form method="POST" action="{{ route('security.klaim.tolak', $barang->id) }}">
                            @csrf
                            <button type="submit"
                                    style="width: 100%; padding: 13px; background: #ef4444; color: white;
                                        font-size: 0.9375rem; font-weight: 700; border: none;
                                        border-radius: 12px; cursor: pointer; display: flex;
                                        align-items: center; justify-content: center; gap: 8px;"
                                    onmouseover="this.style.background='#dc2626'"
                                    onmouseout="this.style.background='#ef4444'">
                                Tolak Klaim
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div style="text-align: center; padding: 60px; background: white;
                            border: 1px solid #e5e7eb; border-radius: 16px;">
                    <p style="color: #9ca3af; font-size: 0.875rem;">Tidak ada klaim yang perlu diverifikasi</p>
                </div>
            @endforelse
        </div>
    </div>

</div>

{{-- ===== MODAL INPUT BARANG TEMUAN ===== --}}
<div id="modal-input"
     style="display: none; position: fixed; inset: 0; z-index: 100;
            background: rgba(0,0,0,0.5); align-items: center; justify-content: center; padding: 24px;"
     onclick="if(event.target===this) this.style.display='none'">

    <div style="background: white; border-radius: 20px; padding: 28px;
                width: 100%; max-width: 480px; max-height: 85vh; overflow-y: auto;">

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h2 style="font-size: 1.125rem; font-weight: 700; color: #111827; margin: 0;">
                Input Barang Temuan
            </h2>
            <button onclick="document.getElementById('modal-input').style.display='none'"
                    style="background: #f3f4f6; border: none; cursor: pointer; color: #6b7280;
                           width: 28px; height: 28px; border-radius: 999px; font-size: 0.875rem;">✕</button>
        </div>

        <form method="POST" action="{{ route('security.barang.store') }}" enctype="multipart/form-data">
            @csrf

            <div style="margin-bottom: 14px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600;
                              color: #111827; margin-bottom: 6px;">
                    Nama Barang <span style="color: #ef4444;">*</span>
                </label>
                <input type="text" name="nama_barang" required
                       placeholder="Contoh: Kunci Motor Honda Beat"
                       style="width: 100%; padding: 11px 14px; border: 1px solid #e5e7eb;
                              border-radius: 10px; font-size: 0.875rem; outline: none;
                              box-sizing: border-box; background: #f9fafb;"
                       onfocus="this.style.borderColor='#2563eb'; this.style.background='white'"
                       onblur="this.style.borderColor='#e5e7eb'; this.style.background='#f9fafb'">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 14px;">
                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 600;
                                  color: #111827; margin-bottom: 6px;">
                        Kategori <span style="color: #ef4444;">*</span>
                    </label>
                    <select name="kategori_id" required
                            style="width: 100%; padding: 11px 14px; border: 1px solid #e5e7eb;
                                   border-radius: 10px; font-size: 0.875rem; outline: none;
                                   box-sizing: border-box; background: #f9fafb; cursor: pointer;"
                            onfocus="this.style.borderColor='#2563eb'"
                            onblur="this.style.borderColor='#e5e7eb'">
                        <option value="">Pilih kategori</option>
                        @foreach($kategoris as $k)
                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 600;
                                  color: #111827; margin-bottom: 6px;">
                        Lokasi <span style="color: #ef4444;">*</span>
                    </label>
                    <select name="lokasi_id" required
                            style="width: 100%; padding: 11px 14px; border: 1px solid #e5e7eb;
                                   border-radius: 10px; font-size: 0.875rem; outline: none;
                                   box-sizing: border-box; background: #f9fafb; cursor: pointer;"
                            onfocus="this.style.borderColor='#2563eb'"
                            onblur="this.style.borderColor='#e5e7eb'">
                        <option value="">Pilih lokasi</option>
                        @foreach($lokasis as $l)
                            <option value="{{ $l->id }}">{{ $l->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div style="margin-bottom: 14px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600;
                              color: #111827; margin-bottom: 6px;">
                    Deskripsi <span style="color: #ef4444;">*</span>
                </label>
                <textarea name="deskripsi" rows="3" required
                          placeholder="Jelaskan ciri-ciri barang yang ditemukan..."
                          style="width: 100%; padding: 11px 14px; border: 1px solid #e5e7eb;
                                 border-radius: 10px; font-size: 0.875rem; outline: none; resize: vertical;
                                 box-sizing: border-box; font-family: inherit; background: #f9fafb;"
                          onfocus="this.style.borderColor='#2563eb'; this.style.background='white'"
                          onblur="this.style.borderColor='#e5e7eb'; this.style.background='#f9fafb'"></textarea>
            </div>

            <div style="margin-bottom: 24px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600;
                              color: #111827; margin-bottom: 6px;">Foto Barang</label>
                <label for="foto-input" id="foto-upload-area"
                       style="display: flex; flex-direction: column; align-items: center; gap: 6px;
                              padding: 20px; border: 2px dashed #d1d5db; border-radius: 10px;
                              cursor: pointer; background: #f9fafb;"
                       onmouseover="this.style.borderColor='#2563eb'"
                       onmouseout="this.style.borderColor='#d1d5db'">
                    <svg style="width: 24px; height: 24px;" fill="none" stroke="#9ca3af" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                    </svg>
                    <span style="font-size: 0.8125rem; font-weight: 600; color: #2563eb;">Upload foto</span>
                    <span id="foto-input-label" style="font-size: 0.75rem; color: #9ca3af;">PNG, JPG hingga 5MB</span>
                    <input type="file" id="foto-input" name="foto" accept="image/*" style="display: none;"
                           onchange="document.getElementById('foto-input-label').textContent = this.files[0]?.name ?? 'PNG, JPG hingga 5MB'">
                </label>
            </div>

            <div style="display: flex; gap: 12px;">
                <button type="submit"
                        style="flex: 1; padding: 12px; background: #111827; color: white;
                               font-size: 0.9375rem; font-weight: 700; border: none;
                               border-radius: 12px; cursor: pointer;"
                        onmouseover="this.style.background='#374151'"
                        onmouseout="this.style.background='#111827'">
                    Simpan
                </button>
                <button type="button"
                        onclick="document.getElementById('modal-input').style.display='none'"
                        style="padding: 12px 20px; background: none; border: none;
                               font-size: 0.9375rem; color: #374151; cursor: pointer; font-weight: 500;">
                    Batal
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ===== MODAL SETUJUI KLAIM ===== --}}
<div id="modal-setujui"
     style="display: none; position: fixed; inset: 0; z-index: 100;
            background: rgba(0,0,0,0.5); align-items: center; justify-content: center; padding: 24px;"
     onclick="if(event.target===this) this.style.display='none'">

    <div style="background: white; border-radius: 20px; padding: 28px;
                width: 100%; max-width: 460px; max-height: 85vh; overflow-y: auto;">

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
            <h2 style="font-size: 1.125rem; font-weight: 700; color: #111827; margin: 0;">Setujui Klaim</h2>
            <button onclick="document.getElementById('modal-setujui').style.display='none'"
                    style="background: #f3f4f6; border: none; cursor: pointer; color: #6b7280;
                           width: 28px; height: 28px; border-radius: 999px; font-size: 0.875rem;">✕</button>
        </div>
        <p style="font-size: 0.8125rem; color: #6b7280; margin: 0 0 24px 0;">Isi data penyerahan barang</p>

        <form id="form-setujui" method="POST" action="" enctype="multipart/form-data">
            @csrf

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600;
                              color: #111827; margin-bottom: 6px;">
                    Petugas Penyerah Barang <span style="color: #ef4444;">*</span>
                </label>
                <input type="text" name="petugas_penyerah" required
                       placeholder="Nama petugas yang menyerahkan barang"
                       style="width: 100%; padding: 11px 14px; border: 1px solid #e5e7eb;
                              border-radius: 10px; font-size: 0.875rem; outline: none;
                              box-sizing: border-box; background: #f9fafb;"
                       onfocus="this.style.borderColor='#2563eb'; this.style.background='white'"
                       onblur="this.style.borderColor='#e5e7eb'; this.style.background='#f9fafb'">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600;
                              color: #111827; margin-bottom: 6px;">
                    Foto Bukti Penyerahan
                </label>
                <label for="foto-penyerahan" id="upload-penyerahan"
                       style="display: flex; flex-direction: column; align-items: center; gap: 6px;
                              padding: 20px; border: 2px dashed #d1d5db; border-radius: 10px;
                              cursor: pointer; background: #f9fafb;"
                       onmouseover="this.style.borderColor='#2563eb'"
                       onmouseout="this.style.borderColor='#d1d5db'">
                    <svg style="width: 24px; height: 24px;" fill="none" stroke="#9ca3af" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                    </svg>
                    <span style="font-size: 0.8125rem; font-weight: 600; color: #2563eb;">Upload foto</span>
                    <span id="foto-penyerahan-label" style="font-size: 0.75rem; color: #9ca3af;">
                        Foto saat penyerahan barang
                    </span>
                    <input type="file" id="foto-penyerahan" name="foto_penyerahan" accept="image/*"
                           style="display: none;" onchange="previewPenyerahan(this)">
                </label>
                <div id="preview-penyerahan-wrap" style="display: none; margin-top: 10px; position: relative;">
                    <img id="preview-penyerahan"
                         style="width: 100%; max-height: 160px; object-fit: cover;
                                border-radius: 10px; border: 1px solid #e5e7eb;">
                    <button type="button" onclick="hapusPenyerahan()"
                            style="position: absolute; top: 8px; right: 8px; background: rgba(0,0,0,0.6);
                                   border: none; color: white; border-radius: 999px; width: 24px;
                                   height: 24px; cursor: pointer; font-size: 0.75rem;">✕</button>
                </div>
            </div>

            <div style="background: #eff6ff; border-radius: 10px; padding: 14px 16px; margin-bottom: 24px;">
                <p style="font-size: 0.8125rem; color: #1e40af; line-height: 1.7; margin: 0;">
                    <strong>Setelah disetujui:</strong><br>
                    - Status barang akan diubah menjadi "Diklaim"<br>
                    - Mahasiswa akan menerima notifikasi<br>
                    - Data penyerahan akan tercatat dalam sistem
                </p>
            </div>

            <div style="display: flex; gap: 12px;">
                <button type="submit"
                        style="flex: 1; padding: 13px; background: #111827; color: white;
                               font-size: 0.9375rem; font-weight: 700; border: none;
                               border-radius: 12px; cursor: pointer;"
                        onmouseover="this.style.background='#374151'"
                        onmouseout="this.style.background='#111827'">
                    Setujui
                </button>
                <button type="button"
                        onclick="document.getElementById('modal-setujui').style.display='none'"
                        style="padding: 13px 20px; background: none; border: none;
                               font-size: 0.9375rem; color: #374151; cursor: pointer; font-weight: 500;">
                    Batal
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ===== MODAL DETAIL LAPORAN ===== --}}
<div id="modal-detail-laporan"
     style="display: none; position: fixed; inset: 0; z-index: 100;
            background: rgba(0,0,0,0.5); align-items: center; justify-content: center; padding: 24px;"
     onclick="if(event.target===this){ this.style.display='none'; document.body.style.overflow=''; }">

    <div style="background: white; border-radius: 20px; width: 100%; max-width: 520px;
                max-height: 88vh; overflow-y: auto;">

        <div style="padding: 20px 24px 16px; border-bottom: 1px solid #f3f4f6;
                    display: flex; justify-content: space-between; align-items: center;
                    position: sticky; top: 0; background: white; z-index: 10;
                    border-radius: 20px 20px 0 0;">
            <div>
                <h2 style="font-size: 1rem; font-weight: 700; color: #111827; margin: 0 0 2px 0;">
                    Detail Laporan Barang Hilang
                </h2>
                <p id="detail-kode" style="font-size: 0.75rem; color: #9ca3af; margin: 0;"></p>
            </div>
            <button onclick="document.getElementById('modal-detail-laporan').style.display='none'; document.body.style.overflow='';"
                    style="background: #f3f4f6; border: none; cursor: pointer; color: #6b7280;
                           width: 28px; height: 28px; border-radius: 999px; font-size: 0.875rem; flex-shrink: 0;">✕</button>
        </div>

        <div style="padding: 20px 24px;">
            <div id="detail-foto-wrap" style="margin-bottom: 20px;"></div>

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 16px; margin-bottom: 20px;">
                <div>
                    <p style="font-size: 0.8125rem; font-weight: 700; color: #111827; margin: 0 0 12px 0;">📦 Data Barang</p>
                    <div style="display: flex; flex-direction: column; gap: 10px;">
                        <div>
                            <p style="font-size: 0.6875rem; color: #9ca3af; margin: 0 0 2px 0;">Nama Barang</p>
                            <p id="detail-nama" style="font-size: 0.8125rem; font-weight: 600; color: #111827; margin: 0;"></p>
                        </div>
                        <div>
                            <p style="font-size: 0.6875rem; color: #9ca3af; margin: 0 0 2px 0;">Kategori</p>
                            <p id="detail-kategori" style="font-size: 0.8125rem; color: #374151; margin: 0;"></p>
                        </div>
                        <div>
                            <p style="font-size: 0.6875rem; color: #9ca3af; margin: 0 0 2px 0;">Deskripsi</p>
                            <p id="detail-deskripsi" style="font-size: 0.8125rem; color: #374151; margin: 0; line-height: 1.5;"></p>
                        </div>
                        <div>
                            <p style="font-size: 0.6875rem; color: #9ca3af; margin: 0 0 4px 0;">Status</p>
                            <span id="detail-status-badge"
                                  style="font-size: 0.75rem; font-weight: 600; padding: 3px 10px;
                                         border-radius: 999px; display: inline-block;"></span>
                        </div>
                    </div>
                </div>
                <div>
                    <p style="font-size: 0.8125rem; font-weight: 700; color: #111827; margin: 0 0 12px 0;">👤 Data Pelapor</p>
                    <div style="display: flex; flex-direction: column; gap: 10px;">
                        <div>
                            <p style="font-size: 0.6875rem; color: #9ca3af; margin: 0 0 2px 0;">Nama Pelapor</p>
                            <p id="detail-pelapor" style="font-size: 0.8125rem; font-weight: 600; color: #111827; margin: 0;"></p>
                        </div>
                        <div>
                            <p style="font-size: 0.6875rem; color: #9ca3af; margin: 0 0 2px 0;">NIM</p>
                            <p id="detail-nim" style="font-size: 0.8125rem; color: #374151; margin: 0;"></p>
                        </div>
                        <div>
                            <p style="font-size: 0.6875rem; color: #9ca3af; margin: 0 0 2px 0;">Kontak</p>
                            <p id="detail-kontak" style="font-size: 0.8125rem; color: #374151; margin: 0;"></p>
                        </div>
                        <div>
                            <p style="font-size: 0.6875rem; color: #9ca3af; margin: 0 0 2px 0;">Tanggal Lapor</p>
                            <p id="detail-tanggal-lapor" style="font-size: 0.8125rem; color: #374151; margin: 0;"></p>
                        </div>
                        <div>
                            <p style="font-size: 0.6875rem; color: #9ca3af; margin: 0 0 2px 0;">Petugas Penerima</p>
                            <p id="detail-petugas-terima" style="font-size: 0.8125rem; color: #374151; margin: 0;"></p>
                        </div>
                    </div>
                </div>
                <div>
                    <p style="font-size: 0.8125rem; font-weight: 700; color: #111827; margin: 0 0 12px 0;">📍 Lokasi & Waktu</p>
                    <div style="display: flex; flex-direction: column; gap: 10px;">
                        <div>
                            <p style="font-size: 0.6875rem; color: #9ca3af; margin: 0 0 2px 0;">Tempat Kehilangan</p>
                            <p id="detail-lokasi" style="font-size: 0.8125rem; font-weight: 600; color: #111827; margin: 0;"></p>
                        </div>
                        <div>
                            <p style="font-size: 0.6875rem; color: #9ca3af; margin: 0 0 2px 0;">Tanggal Hilang</p>
                            <p id="detail-tanggal-hilang" style="font-size: 0.8125rem; color: #374151; margin: 0;"></p>
                        </div>
                        <div>
                            <p style="font-size: 0.6875rem; color: #9ca3af; margin: 0 0 2px 0;">Ditemukan Oleh</p>
                            <p id="detail-ditemukan-oleh" style="font-size: 0.8125rem; color: #374151; margin: 0;"></p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="detail-pengembalian"
                 style="display: none; border-top: 1px solid #f3f4f6; padding-top: 16px; margin-bottom: 16px;">
                <p style="font-size: 0.8125rem; font-weight: 700; color: #111827; margin: 0 0 12px 0;">
                    ✅ Data Pengembalian
                </p>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 12px;">
                    <div>
                        <p style="font-size: 0.6875rem; color: #9ca3af; margin: 0 0 2px 0;">Tanggal Diambil</p>
                        <p id="detail-tgl-ambil" style="font-size: 0.875rem; font-weight: 600; color: #111827; margin: 0;"></p>
                    </div>
                    <div>
                        <p style="font-size: 0.6875rem; color: #9ca3af; margin: 0 0 2px 0;">Petugas Penyerah</p>
                        <p id="detail-petugas-serah" style="font-size: 0.875rem; font-weight: 600; color: #111827; margin: 0;"></p>
                    </div>
                </div>
                <div style="background: #f9fafb; border-radius: 10px; padding: 12px;">
                    <p style="font-size: 0.6875rem; color: #9ca3af; margin: 0 0 4px 0;">Bukti Kepemilikan</p>
                    <p id="detail-bukti" style="font-size: 0.8125rem; color: #374151; margin: 0;"></p>
                </div>
            </div>

            <div style="background: #eff6ff; border-radius: 12px; padding: 14px 16px;">
                <p style="font-size: 0.8125rem; font-weight: 700; color: #1e40af; margin: 0 0 8px 0;">Timeline:</p>
                <div id="detail-timeline" style="display: flex; flex-direction: column; gap: 4px;"></div>
            </div>
        </div>
    </div>
</div>

{{-- ===== MODAL DETAIL BARANG TEMUAN ===== --}}
<div id="modal-detail-barang"
     style="display: none; position: fixed; inset: 0; z-index: 100;
            background: rgba(0,0,0,0.5); align-items: center; justify-content: center; padding: 24px;"
     onclick="if(event.target===this){ this.style.display='none'; document.body.style.overflow=''; }">

    <div style="background: white; border-radius: 20px; width: 100%; max-width: 480px;
                max-height: 88vh; overflow-y: auto;">

        <div style="padding: 20px 24px 16px; border-bottom: 1px solid #f3f4f6;
                    display: flex; justify-content: space-between; align-items: center;
                    position: sticky; top: 0; background: white; z-index: 10;
                    border-radius: 20px 20px 0 0;">
            <div>
                <h2 style="font-size: 1rem; font-weight: 700; color: #111827; margin: 0 0 2px 0;">
                    Detail Barang Temuan
                </h2>
                <p id="db-kode" style="font-size: 0.75rem; color: #9ca3af; margin: 0;"></p>
            </div>
            <button onclick="document.getElementById('modal-detail-barang').style.display='none'; document.body.style.overflow='';"
                    style="background: #f3f4f6; border: none; cursor: pointer; color: #6b7280;
                           width: 28px; height: 28px; border-radius: 999px; font-size: 0.875rem; flex-shrink: 0;">✕</button>
        </div>

        <div style="padding: 20px 24px;">

            <div id="db-foto-wrap" style="margin-bottom: 20px;"></div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div>
                    <p style="font-size: 0.875rem; font-weight: 700; color: #111827; margin: 0 0 12px 0;">
                        Informasi Barang
                    </p>
                    <div style="display: flex; flex-direction: column; gap: 10px;">
                        <div>
                            <p style="font-size: 0.6875rem; color: #9ca3af; margin: 0 0 2px 0;">Nama Barang</p>
                            <p id="db-nama" style="font-size: 0.875rem; font-weight: 600; color: #111827; margin: 0;"></p>
                        </div>
                        <div>
                            <p style="font-size: 0.6875rem; color: #9ca3af; margin: 0 0 2px 0;">Kategori</p>
                            <p id="db-kategori" style="font-size: 0.875rem; color: #374151; margin: 0;"></p>
                        </div>
                        <div>
                            <p style="font-size: 0.6875rem; color: #9ca3af; margin: 0 0 2px 0;">Deskripsi</p>
                            <p id="db-deskripsi" style="font-size: 0.875rem; color: #374151; margin: 0; line-height: 1.5;"></p>
                        </div>
                        <div>
                            <p style="font-size: 0.6875rem; color: #9ca3af; margin: 0 0 4px 0;">Status</p>
                            <span id="db-status-badge"
                                  style="font-size: 0.75rem; font-weight: 600; padding: 3px 10px;
                                         border-radius: 999px; display: inline-block;"></span>
                        </div>
                    </div>
                </div>

                <div>
                    <p style="font-size: 0.875rem; font-weight: 700; color: #111827; margin: 0 0 12px 0;">
                        Waktu & Lokasi
                    </p>
                    <div style="display: flex; flex-direction: column; gap: 10px;">
                        <div>
                            <p style="font-size: 0.6875rem; color: #9ca3af; margin: 0 0 2px 0;">Lokasi Ditemukan</p>
                            <p id="db-lokasi" style="font-size: 0.875rem; font-weight: 600; color: #111827; margin: 0;"></p>
                        </div>
                        <div>
                            <p style="font-size: 0.6875rem; color: #9ca3af; margin: 0 0 2px 0;">Tanggal & Waktu</p>
                            <p id="db-tanggal" style="font-size: 0.875rem; color: #374151; margin: 0;"></p>
                        </div>
                        <div>
                            <p style="font-size: 0.6875rem; color: #9ca3af; margin: 0 0 2px 0;">Oleh</p>
                            <p id="db-penemu" style="font-size: 0.875rem; color: #374151; margin: 0;"></p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Data Pelapor / Pengklaim muncul kalau sudah diklaim --}}
            <div id="db-pelapor-section"
                 style="display: none; border-top: 1px solid #f3f4f6; padding-top: 16px;">
                <p style="font-size: 0.875rem; font-weight: 700; color: #111827; margin: 0 0 12px 0;">
                    Data Pelapor
                </p>
                <div style="display: flex; flex-direction: column; gap: 10px;">
                    <div>
                        <p style="font-size: 0.6875rem; color: #9ca3af; margin: 0 0 2px 0;">Nama Pelapor</p>
                        <p id="db-diklaim-oleh" style="font-size: 0.875rem; font-weight: 600; color: #111827; margin: 0;"></p>
                    </div>
                    <div>
                        <p style="font-size: 0.6875rem; color: #9ca3af; margin: 0 0 2px 0;">Kontak</p>
                        <p id="db-kontak" style="font-size: 0.875rem; color: #374151; margin: 0;"></p>
                    </div>
                    <div>
                        <p style="font-size: 0.6875rem; color: #9ca3af; margin: 0 0 2px 0;">Petugas Penerima</p>
                        <p id="db-petugas-serah" style="font-size: 0.875rem; color: #374151; margin: 0;"></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function switchTab(tab) {
        ['laporan','barang','verifikasi'].forEach(t => {
            document.getElementById('tab-' + t).style.display = 'none';
            const btn = document.getElementById('tab-btn-' + t);
            btn.style.background = 'transparent';
            btn.style.color = '#6b7280';
            btn.style.boxShadow = 'none';
        });
        document.getElementById('tab-' + tab).style.display = 'block';
        const active = document.getElementById('tab-btn-' + tab);
        active.style.background = 'white';
        active.style.color = '#111827';
        active.style.boxShadow = '0 1px 4px rgba(0,0,0,0.08)';
    }

    function filterBarang(val) {
        document.querySelectorAll('.barang-row').forEach(row => {
            row.style.display = row.dataset.nama.includes(val.toLowerCase()) ? 'grid' : 'none';
        });
    }

    function filterLaporan(val) {
        document.querySelectorAll('.laporan-row').forEach(row => {
            row.style.display = row.dataset.nama.includes(val.toLowerCase()) ? 'grid' : 'none';
        });
    }

    function openSetujuiModal(id) {
        document.getElementById('form-setujui').action = '/security/klaim/' + id + '/setujui';
        document.getElementById('modal-setujui').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function previewPenyerahan(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview-penyerahan').src = e.target.result;
                document.getElementById('preview-penyerahan-wrap').style.display = 'block';
                document.getElementById('upload-penyerahan').style.display = 'none';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function hapusPenyerahan() {
        document.getElementById('foto-penyerahan').value = '';
        document.getElementById('preview-penyerahan-wrap').style.display = 'none';
        document.getElementById('upload-penyerahan').style.display = 'flex';
        document.getElementById('foto-penyerahan-label').textContent = 'Foto saat penyerahan barang';
    }

    const laporanData = @json($laporanJson);

    const barangData = @json($barangData);

    function openDetailBarang(id) {
        const b = barangData.find(x => x.id === id);
        if (!b) return;

        const year = new Date().getFullYear();
        document.getElementById('db-kode').textContent =
            'Kode: SIMBA-' + year + '-' + String(id).padStart(3, '0');

        document.getElementById('db-nama').textContent      = b.nama;
        document.getElementById('db-kategori').textContent  = b.kategori;
        document.getElementById('db-deskripsi').textContent = b.deskripsi;
        document.getElementById('db-lokasi').textContent    = b.lokasi;
        document.getElementById('db-tanggal').textContent   = b.created_at;
        document.getElementById('db-penemu').textContent    = b.penemu;

        const statusMap = {
            'tersedia'            : { label: 'Tersedia',  bg: '#111827',  color: 'white'   },
            'menunggu_verifikasi' : { label: 'Menunggu',  bg: '#fef3c7',  color: '#d97706' },
            'diklaim'             : { label: 'Diklaim',   bg: '#dcfce7',  color: '#16a34a' },
            'diarsipkan'          : { label: 'Diarsipkan',bg: '#f3f4f6',  color: '#374151' },
        };
        const s = statusMap[b.status] ?? { label: b.status, bg: '#f3f4f6', color: '#374151' };
        const badge = document.getElementById('db-status-badge');
        badge.textContent      = s.label;
        badge.style.background = s.bg;
        badge.style.color      = s.color;

        const fotoWrap = document.getElementById('db-foto-wrap');
        fotoWrap.innerHTML = b.foto
            ? `<img src="${b.foto}" style="width:100%; height:220px; object-fit:cover; border-radius:12px; border:1px solid #e5e7eb;">`
            : '';

        const pelapor = document.getElementById('db-pelapor-section');
        if (b.diklaim_oleh) {
            pelapor.style.display = 'block';
            document.getElementById('db-diklaim-oleh').textContent = b.diklaim_oleh;
            document.getElementById('db-kontak').textContent       = b.kontak ?? '-';
            document.getElementById('db-petugas-serah').textContent= b.petugas_penyerah ?? '-';
        } else {
            pelapor.style.display = 'none';
        }

        document.getElementById('modal-detail-barang').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function openDetailLaporan(id) {
        const l = laporanData.find(x => x.id === id);
        if (!l) return;

        const year = new Date().getFullYear();
        document.getElementById('detail-kode').textContent =
            'Kode: LOST-' + year + '-' + String(id).padStart(3, '0');

        document.getElementById('detail-nama').textContent       = l.judul;
        document.getElementById('detail-kategori').textContent   = l.kategori;
        document.getElementById('detail-deskripsi').textContent  = l.deskripsi;
        document.getElementById('detail-pelapor').textContent    = l.pelapor;
        document.getElementById('detail-nim').textContent        = l.nim;
        document.getElementById('detail-kontak').textContent     = l.kontak;
        document.getElementById('detail-lokasi').textContent     = l.lokasi;
        document.getElementById('detail-tanggal-hilang').textContent = l.tanggal_hilang ?? '-';
        document.getElementById('detail-tanggal-lapor').textContent  = l.created_at;
        document.getElementById('detail-petugas-terima').textContent = '{{ auth()->user()->name }}';
        document.getElementById('detail-ditemukan-oleh').textContent = 'Petugas Keamanan';

        const statusMap = {
            'menunggu' : { label: 'Dicari',       bg: '#fee2e2', color: '#dc2626' },
            'disetujui': { label: 'Ditemukan',     bg: '#dbeafe', color: '#2563eb' },
            'ditemukan': { label: 'Dikembalikan',  bg: '#dcfce7', color: '#16a34a' },
            'ditutup'  : { label: 'Ditutup',       bg: '#111827', color: 'white'   },
        };
        const s = statusMap[l.status] ?? { label: l.status, bg: '#f3f4f6', color: '#374151' };
        const badge = document.getElementById('detail-status-badge');
        badge.textContent      = s.label;
        badge.style.background = s.bg;
        badge.style.color      = s.color;

        const fotoWrap = document.getElementById('detail-foto-wrap');
        fotoWrap.innerHTML = l.foto
            ? `<img src="${l.foto}" style="width:100%; height:200px; object-fit:cover; border-radius:12px; border:1px solid #e5e7eb;">`
            : '';

        const pengembalian = document.getElementById('detail-pengembalian');
        if (l.status === 'ditemukan') {
            pengembalian.style.display = 'block';
            document.getElementById('detail-tgl-ambil').textContent     = l.tanggal_hilang ?? '-';
            document.getElementById('detail-petugas-serah').textContent = '{{ auth()->user()->name }}';
            document.getElementById('detail-bukti').textContent         = l.deskripsi ?? '-';
        } else {
            pengembalian.style.display = 'none';
        }

        const timeline = document.getElementById('detail-timeline');
        let tl = `<p style="font-size:0.8125rem; color:#1e40af; margin:0;">1. Dilaporkan hilang: ${l.created_at} di ${l.lokasi}</p>`;
        tl += `<p style="font-size:0.8125rem; color:#1e40af; margin:0;">2. Diterima oleh: {{ auth()->user()->name }}</p>`;
        if (l.status === 'disetujui' || l.status === 'ditemukan') {
            tl += `<p style="font-size:0.8125rem; color:#1e40af; margin:0;">3. Ditemukan: ${l.tanggal_hilang} oleh Petugas Keamanan</p>`;
        }
        if (l.status === 'ditemukan') {
            tl += `<p style="font-size:0.8125rem; color:#1e40af; margin:0;">4. Diserahkan: ${l.tanggal_hilang} oleh {{ auth()->user()->name }}</p>`;
        }
        timeline.innerHTML = tl;

        document.getElementById('modal-detail-laporan').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
</script>

</x-app-layout>