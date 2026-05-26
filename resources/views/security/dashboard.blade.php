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
            ['key' => 'laporan',     'label' => 'Laporan Hilang',    'count' => $laporans->count()],
            ['key' => 'barang',      'label' => 'Barang Temuan',     'count' => $barangs->count()],
            ['key' => 'verifikasi',  'label' => 'Verifikasi Klaim',  'count' => $klaimPending->count()],
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
        <div style="display: flex; flex-direction: column; gap: 12px;">
            @forelse($laporans as $laporan)
                <div style="background: white; border: 1px solid #e5e7eb; border-radius: 16px; padding: 20px;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px;">
                        <div>
                            <h3 style="font-size: 1rem; font-weight: 700; color: #111827; margin: 0 0 4px 0;">
                                {{ $laporan->judul }}
                            </h3>
                            <p style="font-size: 0.8125rem; color: #6b7280; margin: 0 0 2px 0;">
                                Dilaporkan oleh: <strong style="color: #374151;">{{ $laporan->user->name ?? '-' }}</strong>
                            </p>
                            <p style="font-size: 0.75rem; color: #9ca3af; margin: 0;">
                                {{ $laporan->kategori->nama ?? '-' }} •
                                {{ $laporan->lokasi->nama ?? '-' }} •
                                {{ \Carbon\Carbon::parse($laporan->tanggal_hilang)->format('Y-m-d') }}
                            </p>
                        </div>
                        @php
                            $ls = $laporan->status;
                            $lBg = match($ls) {
                                'ditemukan' => '#dcfce7; color: #16a34a',
                                'menunggu'  => '#f3f4f6; color: #374151',
                                default     => '#fef3c7; color: #d97706',
                            };
                        @endphp
                        <span style="font-size: 0.75rem; font-weight: 600; padding: 4px 12px;
                                     border-radius: 999px; background: {{ $lBg }}; white-space: nowrap;">
                            {{ ucfirst($ls) }}
                        </span>
                    </div>
                    @if($laporan->deskripsi)
                        <p style="font-size: 0.8125rem; color: #6b7280; line-height: 1.6; margin: 0;
                                  padding-top: 12px; border-top: 1px solid #f3f4f6;">
                            {{ Str::limit($laporan->deskripsi, 120) }}
                        </p>
                    @endif
                </div>
            @empty
                <div style="text-align: center; padding: 48px; color: #9ca3af;">
                    <p style="font-size: 0.875rem;">Tidak ada laporan hilang</p>
                </div>
            @endforelse
        </div>
    </div>

    {{-- TAB: BARANG TEMUAN --}}
    <div id="tab-barang" style="display: {{ $tab === 'barang' ? 'block' : 'none' }};">
        <div style="background: white; border: 1px solid #e5e7eb; border-radius: 16px; overflow: hidden;">

            {{-- Search --}}
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

            {{-- Table header --}}
            <div style="display: grid; grid-template-columns: 140px 1fr 120px 110px 50px;
                        padding: 12px 20px; background: #f9fafb; border-bottom: 1px solid #f3f4f6;">
                @foreach(['Kode','Barang','Kategori','Status','Aksi'] as $h)
                    <p style="font-size: 0.75rem; font-weight: 600; color: #6b7280; margin: 0;">{{ $h }}</p>
                @endforeach
            </div>

            {{-- Table rows --}}
            <div id="barang-list">
                @forelse($barangs as $b)
                    <div class="barang-row"
                         data-nama="{{ strtolower($b->nama_barang) }}"
                         style="display: grid; grid-template-columns: 140px 1fr 120px 110px 50px;
                                padding: 14px 20px; border-bottom: 1px solid #f9fafb;
                                align-items: center;">
                        <p style="font-size: 0.75rem; color: #9ca3af; margin: 0; font-family: monospace;">
                            SIMBA-{{ date('Y') }}-{{ str_pad($b->id, 3, '0', STR_PAD_LEFT) }}
                        </p>
                        <div style="display: flex; align-items: center; gap: 10px;">
                            @if($b->foto)
                                <img src="{{ Storage::url($b->foto) }}"
                                     style="width: 36px; height: 36px; border-radius: 8px; object-fit: cover; flex-shrink: 0;">
                            @else
                                <div style="width: 36px; height: 36px; border-radius: 8px;
                                            background: #f3f4f6; flex-shrink: 0;"></div>
                            @endif
                            <p style="font-size: 0.875rem; font-weight: 600; color: #111827; margin: 0;">
                                {{ $b->nama_barang }}
                            </p>
                        </div>
                        <p style="font-size: 0.8125rem; color: #6b7280; margin: 0;">{{ $b->kategori->nama ?? '-' }}</p>
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
                        <span style="font-size: 0.75rem; font-weight: 600; padding: 4px 10px;
                                     border-radius: 999px; {{ $bBadge }}">
                            {{ $bLabel }}
                        </span>
                        <a href="{{ route('barang.show', $b->id) }}"
                           style="color: #9ca3af; display: flex; align-items: center;"
                           onmouseover="this.style.color='#374151'"
                           onmouseout="this.style.color='#9ca3af'">
                            <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </a>
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
                <div style="background: white; border: 1px solid #e5e7eb; border-radius: 16px; padding: 24px;">

                    {{-- Header klaim --}}
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
                        <div>
                            <h3 style="font-size: 1.0625rem; font-weight: 700; color: #111827; margin: 0 0 4px 0;">
                                {{ $klaim->nama_barang }}
                            </h3>
                            <p style="font-size: 0.8125rem; color: #6b7280; margin: 0 0 2px 0;">
                                Diklaim oleh:
                                <strong style="color: #2563eb;">
                                    {{ $klaim->pemilikKlaim->name ?? '-' }}
                                    @if($klaim->pemilikKlaim?->nim)
                                        ({{ $klaim->pemilikKlaim->nim }})
                                    @endif
                                </strong>
                            </p>
                            <p style="font-size: 0.75rem; color: #9ca3af; margin: 0;">
                                Kode: SIMBA-{{ date('Y') }}-{{ str_pad($klaim->id, 3, '0', STR_PAD_LEFT) }} •
                                {{ \Carbon\Carbon::parse($klaim->updated_at)->format('Y-m-d H:i') }}
                            </p>
                        </div>
                        <span style="font-size: 0.75rem; font-weight: 600; padding: 5px 12px;
                                     border-radius: 999px; background: #f3f4f6; color: #374151;
                                     border: 1px solid #e5e7eb; display: flex; align-items: center; gap: 5px;">
                            <svg style="width: 12px; height: 12px;" fill="none" stroke="#f59e0b" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Pending
                        </span>
                    </div>

                    {{-- Foto & Bukti --}}
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                        <div>
                            <p style="font-size: 0.8125rem; font-weight: 600; color: #374151; margin: 0 0 10px 0;">
                                Foto Barang
                            </p>
                            @if($klaim->foto)
                                <img src="{{ Storage::url($klaim->foto) }}"
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
                                Lokasi: {{ $klaim->lokasi->nama ?? '-' }}
                            </p>
                        </div>
                        <div>
                            <p style="font-size: 0.8125rem; font-weight: 600; color: #374151; margin: 0 0 10px 0;">
                                Bukti Kepemilikan
                            </p>
                            <div style="width: 100%; min-height: 200px; background: #f9fafb;
                                        border-radius: 12px; border: 1px solid #e5e7eb; padding: 16px;
                                        box-sizing: border-box;">
                                <p style="font-size: 0.8125rem; font-weight: 600; color: #374151; margin: 0 0 8px 0;">
                                    Deskripsi:
                                </p>
                                <p style="font-size: 0.8125rem; color: #6b7280; line-height: 1.7; margin: 0;">
                                    {{ $klaim->deskripsi ?? 'Tidak ada deskripsi tambahan' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Tombol aksi --}}
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                        <form method="POST" action="{{ route('security.klaim.setujui', $klaim->id) }}">
                            @csrf
                            <button type="submit"
                                    style="width: 100%; padding: 13px; background: #111827; color: white;
                                           font-size: 0.9375rem; font-weight: 700; border: none;
                                           border-radius: 12px; cursor: pointer; display: flex;
                                           align-items: center; justify-content: center; gap: 8px;"
                                    onmouseover="this.style.background='#374151'"
                                    onmouseout="this.style.background='#111827'">
                                <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Setujui Klaim
                            </button>
                        </form>
                        <form method="POST" action="{{ route('security.klaim.tolak', $klaim->id) }}">
                            @csrf
                            <button type="submit"
                                    style="width: 100%; padding: 13px; background: #ef4444; color: white;
                                           font-size: 0.9375rem; font-weight: 700; border: none;
                                           border-radius: 12px; cursor: pointer; display: flex;
                                           align-items: center; justify-content: center; gap: 8px;"
                                    onmouseover="this.style.background='#dc2626'"
                                    onmouseout="this.style.background='#ef4444'">
                                <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
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

{{-- MODAL INPUT BARANG TEMUAN --}}
<div id="modal-input"
     style="display: none; position: fixed; inset: 0; z-index: 100;
            background: rgba(0,0,0,0.5); align-items: center; justify-content: center; padding: 24px;"
     onclick="if(event.target===this) document.getElementById('modal-input').style.display='none'">

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
                <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #111827; margin-bottom: 6px;">
                    Nama Barang <span style="color: #ef4444;">*</span>
                </label>
                <input type="text" name="nama_barang" placeholder="Contoh: Kunci Motor Honda Beat" required
                       style="width: 100%; padding: 11px 14px; border: 1px solid #e5e7eb;
                              border-radius: 10px; font-size: 0.875rem; outline: none;
                              box-sizing: border-box; background: #f9fafb;"
                       onfocus="this.style.borderColor='#2563eb'; this.style.background='white'"
                       onblur="this.style.borderColor='#e5e7eb'; this.style.background='#f9fafb'">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 14px;">
                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #111827; margin-bottom: 6px;">
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
                    <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #111827; margin-bottom: 6px;">
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
                <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #111827; margin-bottom: 6px;">
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
                <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #111827; margin-bottom: 6px;">
                    Foto Barang
                </label>
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
</script>

</x-app-layout>