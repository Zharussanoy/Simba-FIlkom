<x-app-layout title="{{ $barang->nama_barang }}">

{{-- NOTIFIKASI --}}
@if(session('success'))
<div id="notif-success"
     style="position: fixed; top: 80px; right: 20px; z-index: 200;
            background: white; border: 1px solid #bbf7d0; border-radius: 14px;
            padding: 14px 18px; box-shadow: 0 8px 24px rgba(0,0,0,0.1);
            display: flex; align-items: flex-start; gap: 12px; max-width: 360px;
            animation: slideIn 0.3s ease;">
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
    <button onclick="document.getElementById('notif-success').style.display='none'"
            style="background: none; border: none; cursor: pointer; color: #9ca3af;
                   font-size: 1rem; padding: 0; line-height: 1; flex-shrink: 0;">✕</button>
</div>
<script>
    setTimeout(() => {
        const el = document.getElementById('notif-success');
        if (el) el.style.display = 'none';
    }, 5000);
</script>
@endif

@if($errors->any())
<div id="notif-error"
     style="position: fixed; top: 80px; right: 20px; z-index: 200;
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
        <p style="font-size: 0.875rem; font-weight: 600; color: #111827; margin: 0 0 2px 0;">Gagal!</p>
        <p style="font-size: 0.8125rem; color: #6b7280; margin: 0;">{{ $errors->first() }}</p>
    </div>
    <button onclick="document.getElementById('notif-error').style.display='none'"
            style="background: none; border: none; cursor: pointer; color: #9ca3af;">✕</button>
</div>
@endif

@if(session('error'))
<div id="notif-error"
     style="position: fixed; top: 80px; right: 20px; z-index: 200;
            background: white; border: 1px solid #fecaca; border-radius: 14px;
            padding: 14px 18px; box-shadow: 0 8px 24px rgba(0,0,0,0.1);
            display: flex; align-items: flex-start; gap: 12px; max-width: 360px;
            animation: slideIn 0.3s ease;">
    <div style="width: 32px; height: 32px; background: #fef2f2; border-radius: 8px;
                display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
        <svg style="width: 16px; height: 16px;" fill="none" stroke="#dc2626" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </div>
    <div style="flex: 1;">
        <p style="font-size: 0.875rem; font-weight: 600; color: #111827; margin: 0 0 2px 0;">Gagal!</p>
        <p style="font-size: 0.8125rem; color: #6b7280; margin: 0;">{{ session('error') }}</p>
    </div>
    <button onclick="document.getElementById('notif-error').style.display='none'"
            style="background: none; border: none; cursor: pointer; color: #9ca3af;
                   font-size: 1rem; padding: 0; line-height: 1; flex-shrink: 0;">✕</button>
</div>
<script>
    setTimeout(() => {
        const el = document.getElementById('notif-error');
        if (el) el.style.display = 'none';
    }, 5000);
</script>
@endif

<style>
@keyframes slideIn {
    from { opacity: 0; transform: translateX(20px); }
    to   { opacity: 1; transform: translateX(0); }
}
@keyframes fadeIn {
    from { opacity: 0; }
    to   { opacity: 1; }
}
@keyframes popUp {
    from { opacity: 0; transform: scale(0.95) translateY(10px); }
    to   { opacity: 1; transform: scale(1) translateY(0); }
}
</style>

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
                    $badgeLabel = match($status) {
                        'diklaim'              => 'Diklaim',
                        'menunggu_verifikasi'  => 'Menunggu Verifikasi',
                        'diarsipkan'           => 'Diarsipkan',
                        default                => 'Tersedia',
                    };
                    $badgeBg = match($status) {
                        'diklaim'             => '#374151',
                        'menunggu_verifikasi' => '#d97706',
                        'diarsipkan'          => '#6b7280',
                        default               => '#111827',
                    };
                @endphp
                <span style="background: {{ $badgeBg }}; color: white; font-size: 0.75rem;
                             font-weight: 600; padding: 4px 12px; border-radius: 999px;
                             white-space: nowrap; flex-shrink: 0;">
                    {{ $badgeLabel }}
                </span>
            </div>

            {{-- Kode --}}
            <p style="font-size: 0.875rem; color: #6b7280; margin: 0 0 20px 0;">
                Kode: SIMBA-{{ date('Y') }}-{{ str_pad($barang->id, 3, '0', STR_PAD_LEFT) }}
            </p>

            {{-- Detail Card --}}
            <div style="background: white; border: 1px solid #e5e7eb; border-radius: 14px;
                        padding: 20px; margin-bottom: 16px;">

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
            @if($status === 'tersedia')
                @auth
                    <button onclick="openModal()"
                            style="width: 100%; padding: 14px; background: #111827; color: white;
                                   font-size: 1rem; font-weight: 700; border: none;
                                   border-radius: 12px; cursor: pointer; margin-bottom: 32px;"
                            onmouseover="this.style.background='#374151'"
                            onmouseout="this.style.background='#111827'">
                        Klaim Barang Ini
                    </button>
                @else
                    <a href="{{ route('login') }}"
                       style="display: block; text-align: center; width: 100%; padding: 14px;
                              background: #111827; color: white; font-size: 1rem; font-weight: 700;
                              border-radius: 12px; text-decoration: none; box-sizing: border-box;
                              margin-bottom: 32px;">
                        Login untuk Klaim Barang
                    </a>
                @endauth
                @elseif($status === 'menunggu_verifikasi')
                <button disabled
                        style="width: 100%; padding: 14px; background: #fef3c7; color: #d97706;
                            font-size: 1rem; font-weight: 700; border: 1px solid #fde68a;
                            border-radius: 12px; cursor: not-allowed; margin-bottom: 32px;">
                    ⏱ Menunggu Verifikasi Petugas
                </button>
            @else
                <button disabled
                        style="width: 100%; padding: 14px; background: #e5e7eb; color: #9ca3af;
                               font-size: 1rem; font-weight: 700; border: none;
                               border-radius: 12px; cursor: not-allowed; margin-bottom: 32px;">
                    Barang Sudah Diklaim
                </button>
            @endif
        </div>
    </div>
</div>

{{-- ===== MODAL KLAIM ===== --}}
@auth
@if($status !== 'diklaim')

<div id="modal-klaim"
     style="display: none; position: fixed; inset: 0; z-index: 100;
            background: rgba(0,0,0,0.5); align-items: center; justify-content: center;
            padding: 24px; animation: fadeIn 0.2s ease;"
     onclick="if(event.target===this) closeModal()">

    <div id="modal-content"
         style="background: white; border-radius: 20px; padding: 28px 28px 36px;
                width: 100%; max-width: 480px; max-height: 85vh; overflow-y: auto;
                animation: popUp 0.3s ease;">

        {{-- Header --}}
        <div style="display: flex; align-items: flex-start; justify-content: space-between;
                    margin-bottom: 6px;">
            <h2 style="font-size: 1.125rem; font-weight: 700; color: #111827; margin: 0;">
                Ajukan Klaim Barang
            </h2>
            <button onclick="closeModal()"
                    style="background: #f3f4f6; border: none; cursor: pointer; color: #6b7280;
                           width: 28px; height: 28px; border-radius: 999px; font-size: 0.875rem;
                           display: flex; align-items: center; justify-content: center;">
                ✕
            </button>
        </div>
        <p style="font-size: 0.8125rem; color: #6b7280; margin: 0 0 24px 0;">
            Isi formulir di bawah untuk mengajukan klaim kepemilikan
        </p>

        {{-- FORM --}}
        <form method="POST" action="{{ route('barang.klaim', $barang->id) }}"
              enctype="multipart/form-data">
            @csrf

            {{-- Bukti Kepemilikan --}}
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600;
                              color: #111827; margin-bottom: 8px;">
                    Bukti Kepemilikan <span style="color: #ef4444;">*</span>
                </label>
                <textarea name="bukti_kepemilikan" rows="4" required
                          placeholder="Jelaskan ciri-ciri khusus atau informasi yang membuktikan barang ini milik Anda..."
                          style="width: 100%; padding: 11px 14px; border: 1px solid #e5e7eb;
                                 border-radius: 10px; font-size: 0.875rem; color: #111827;
                                 outline: none; resize: vertical; box-sizing: border-box;
                                 font-family: inherit; line-height: 1.6;"
                          onfocus="this.style.borderColor='#2563eb'"
                          onblur="this.style.borderColor='#e5e7eb'"></textarea>
            </div>

            {{-- Foto Bukti --}}
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600;
                              color: #111827; margin-bottom: 8px;">
                    Foto Bukti Tambahan <span style="color: #ef4444;">*</span>
                </label>
                <label for="foto-bukti"
                       id="upload-label"
                       style="display: flex; flex-direction: column; align-items: center;
                              justify-content: center; gap: 8px; padding: 28px 20px;
                              border: 2px dashed #d1d5db; border-radius: 12px; cursor: pointer;
                              transition: border-color 0.2s; background: #fafafa;"
                       onmouseover="this.style.borderColor='#2563eb'; this.style.background='#eff6ff'"
                       onmouseout="this.style.borderColor='#d1d5db'; this.style.background='#fafafa'">
                    <svg style="width: 32px; height: 32px;" fill="none" stroke="#9ca3af" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                    </svg>
                    <span style="font-size: 0.875rem; font-weight: 600; color: #2563eb;">
                        Upload foto bukti
                    </span>
                    <span id="foto-label" style="font-size: 0.75rem; color: #9ca3af; text-align: center;">
                        Foto KTM, struk pembelian, atau bukti lainnya
                    </span>
                    <input type="file" id="foto-bukti" name="foto_bukti" accept="image/*"
                           style="display: none;" onchange="previewFoto(this)">
                </label>

                {{-- Preview foto --}}
                <div id="foto-preview" style="display: none; margin-top: 10px; position: relative;">
                    <img id="preview-img" style="width: 100%; max-height: 160px; object-fit: cover;
                                                  border-radius: 10px; border: 1px solid #e5e7eb;">
                    <button type="button" onclick="hapusFoto()"
                            style="position: absolute; top: 8px; right: 8px; background: rgba(0,0,0,0.6);
                                   border: none; color: white; border-radius: 999px; width: 24px;
                                   height: 24px; cursor: pointer; font-size: 0.75rem;">✕</button>
                </div>
            </div>

            {{-- Info Proses --}}
            <div style="background: #eff6ff; border-radius: 10px; padding: 14px 16px; margin-bottom: 24px;">
                <p style="font-size: 0.8125rem; color: #1e40af; line-height: 1.7; margin: 0;">
                    <strong>Proses Selanjutnya:</strong><br>
                    Setelah klaim diajukan, petugas keamanan akan memverifikasi bukti kepemilikan Anda.
                    Jika disetujui, Anda akan menerima notifikasi untuk mengambil barang di pos keamanan
                    {{ $barang->lokasi->nama ?? 'kampus' }} dengan membawa KTM.
                </p>
            </div>

            {{-- Tombol --}}
            <div style="display: flex; gap: 12px; align-items: center;">
                <button type="submit"
                        style="flex: 1; padding: 13px; background: #111827; color: white;
                               font-size: 0.9375rem; font-weight: 700; border: none;
                               border-radius: 12px; cursor: pointer;"
                        onmouseover="this.style.background='#374151'"
                        onmouseout="this.style.background='#111827'">
                    Ajukan Klaim
                </button>
                <button type="button" onclick="closeModal()"
                        style="padding: 13px 20px; background: none; border: none;
                               font-size: 0.9375rem; font-weight: 500; color: #374151;
                               cursor: pointer;">
                    Batal
                </button>
            </div>

        </form>
    </div>
</div>

<script>
    function openModal() {
        const modal = document.getElementById('modal-klaim');
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        const modal = document.getElementById('modal-klaim');
        modal.style.display = 'none';
        document.body.style.overflow = '';
    }

    function previewFoto(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview-img').src = e.target.result;
                document.getElementById('foto-preview').style.display = 'block';
                document.getElementById('upload-label').style.display = 'none';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function hapusFoto() {
        document.getElementById('foto-bukti').value = '';
        document.getElementById('foto-preview').style.display = 'none';
        document.getElementById('upload-label').style.display = 'flex';
    }
</script>
@endif
@endauth

</x-app-layout>