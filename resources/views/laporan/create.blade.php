<x-app-layout title="Lapor Barang Hilang">
<div class="max-w-3xl mx-auto px-4 sm:px-6 py-8">

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
                style="background: none; border: none; cursor: pointer; color: #9ca3af;">✕</button>
    </div>
    <script>setTimeout(() => { const el = document.getElementById('notif-success'); if(el) el.style.display='none'; }, 5000);</script>
    @endif

    <style>
        @keyframes slideIn {
            from { opacity: 0; transform: translateX(20px); }
            to   { opacity: 1; transform: translateX(0); }
        }
    </style>

    {{-- HEADER --}}
    <div style="margin-bottom: 28px;">
        <h1 style="font-size: 1.75rem; font-weight: 800; color: #111827; margin: 0 0 4px 0;">
            Lapor Barang Hilang
        </h1>
        <p style="font-size: 0.875rem; color: #6b7280; margin: 0;">
            Isi formulir di bawah untuk melaporkan barang yang hilang
        </p>
    </div>

    {{-- FORM CARD --}}
    <div style="background: white; border: 1px solid #e5e7eb; border-radius: 20px; padding: 28px;">

        <div style="margin-bottom: 24px;">
            <h2 style="font-size: 1rem; font-weight: 700; color: #111827; margin: 0 0 4px 0;">
                Formulir Pelaporan
            </h2>
            <p style="font-size: 0.8125rem; color: #6b7280; margin: 0;">
                Lengkapi informasi berikut dengan detail yang jelas
            </p>
        </div>

        <form method="POST" action="{{ route('laporan.store') }}" enctype="multipart/form-data">
            @csrf

            {{-- ===== DATA PELAPOR ===== --}}
            <div style="margin-bottom: 28px;">
                <h3 style="font-size: 0.9375rem; font-weight: 700; color: #111827;
                           margin: 0 0 16px 0; padding-bottom: 10px; border-bottom: 1px solid #f3f4f6;">
                    Data Pelapor
                </h3>

                {{-- Nama Lengkap --}}
                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-size: 0.875rem; font-weight: 600;
                                  color: #111827; margin-bottom: 6px;">
                        Nama Lengkap <span style="color: #ef4444;">*</span>
                    </label>
                    <input type="text" name="nama_pelapor"
                           value="{{ old('nama_pelapor', auth()->user()->name) }}"
                           placeholder="Contoh: Ahmad Rizki"
                           style="width: 100%; padding: 11px 14px; border: 1px solid #e5e7eb;
                                  border-radius: 10px; font-size: 0.875rem; color: #111827;
                                  outline: none; box-sizing: border-box; background: #f9fafb;"
                           onfocus="this.style.borderColor='#2563eb'; this.style.background='white'"
                           onblur="this.style.borderColor='#e5e7eb'; this.style.background='#f9fafb'">
                    @error('nama_pelapor')
                        <p style="font-size: 0.75rem; color: #ef4444; margin: 4px 0 0 0;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- NIM + Nomor Kontak --}}
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <div>
                        <label style="display: block; font-size: 0.875rem; font-weight: 600;
                                      color: #111827; margin-bottom: 6px;">
                            NIM <span style="color: #ef4444;">*</span>
                        </label>
                        <input type="text" name="nim" value="{{ old('nim') }}"
                               placeholder="Contoh: 245150601111010"
                               style="width: 100%; padding: 11px 14px; border: 1px solid #e5e7eb;
                                      border-radius: 10px; font-size: 0.875rem; color: #111827;
                                      outline: none; box-sizing: border-box; background: #f9fafb;"
                               onfocus="this.style.borderColor='#2563eb'; this.style.background='white'"
                               onblur="this.style.borderColor='#e5e7eb'; this.style.background='#f9fafb'">
                        @error('nim')
                            <p style="font-size: 0.75rem; color: #ef4444; margin: 4px 0 0 0;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.875rem; font-weight: 600;
                                      color: #111827; margin-bottom: 6px;">
                            Nomor Kontak <span style="color: #ef4444;">*</span>
                        </label>
                        <input type="text" name="nomor_kontak" value="{{ old('nomor_kontak') }}"
                               placeholder="Contoh: 081234567890"
                               style="width: 100%; padding: 11px 14px; border: 1px solid #e5e7eb;
                                      border-radius: 10px; font-size: 0.875rem; color: #111827;
                                      outline: none; box-sizing: border-box; background: #f9fafb;"
                               onfocus="this.style.borderColor='#2563eb'; this.style.background='white'"
                               onblur="this.style.borderColor='#e5e7eb'; this.style.background='#f9fafb'">
                        @error('nomor_kontak')
                            <p style="font-size: 0.75rem; color: #ef4444; margin: 4px 0 0 0;">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- ===== DETAIL BARANG ===== --}}
            <div style="margin-bottom: 28px;">
                <h3 style="font-size: 0.9375rem; font-weight: 700; color: #111827;
                           margin: 0 0 16px 0; padding-bottom: 10px; border-bottom: 1px solid #f3f4f6;">
                    Detail Barang Hilang
                </h3>

                {{-- Nama Barang --}}
                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-size: 0.875rem; font-weight: 600;
                                  color: #111827; margin-bottom: 6px;">
                        Nama Barang <span style="color: #ef4444;">*</span>
                    </label>
                    <input type="text" name="judul" value="{{ old('judul') }}"
                           placeholder="Contoh: Kunci Motor Honda"
                           style="width: 100%; padding: 11px 14px; border: 1px solid #e5e7eb;
                                  border-radius: 10px; font-size: 0.875rem; color: #111827;
                                  outline: none; box-sizing: border-box; background: #f9fafb;"
                           onfocus="this.style.borderColor='#2563eb'; this.style.background='white'"
                           onblur="this.style.borderColor='#e5e7eb'; this.style.background='#f9fafb'">
                    @error('judul')
                        <p style="font-size: 0.75rem; color: #ef4444; margin: 4px 0 0 0;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Kategori + Lokasi --}}
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px;">
                    <div>
                        <label style="display: block; font-size: 0.875rem; font-weight: 600;
                                      color: #111827; margin-bottom: 6px;">
                            Kategori <span style="color: #ef4444;">*</span>
                        </label>
                        <select name="kategori_id"
                                style="width: 100%; padding: 11px 14px; border: 1px solid #e5e7eb;
                                       border-radius: 10px; font-size: 0.875rem; color: #374151;
                                       background: #f9fafb; outline: none; cursor: pointer;
                                       box-sizing: border-box;"
                                onfocus="this.style.borderColor='#2563eb'; this.style.background='white'"
                                onblur="this.style.borderColor='#e5e7eb'; this.style.background='#f9fafb'">
                            <option value="">Pilih kategori</option>
                            @foreach($kategoris as $k)
                                <option value="{{ $k->id }}" {{ old('kategori_id') == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <p style="font-size: 0.75rem; color: #ef4444; margin: 4px 0 0 0;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.875rem; font-weight: 600;
                                      color: #111827; margin-bottom: 6px;">
                            Lokasi Terakhir <span style="color: #ef4444;">*</span>
                        </label>
                        <select name="lokasi_id"
                                style="width: 100%; padding: 11px 14px; border: 1px solid #e5e7eb;
                                       border-radius: 10px; font-size: 0.875rem; color: #374151;
                                       background: #f9fafb; outline: none; cursor: pointer;
                                       box-sizing: border-box;"
                                onfocus="this.style.borderColor='#2563eb'; this.style.background='white'"
                                onblur="this.style.borderColor='#e5e7eb'; this.style.background='#f9fafb'">
                            <option value="">Pilih lokasi</option>
                            @foreach($lokasis as $l)
                                <option value="{{ $l->id }}" {{ old('lokasi_id') == $l->id ? 'selected' : '' }}>
                                    {{ $l->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('lokasi_id')
                            <p style="font-size: 0.75rem; color: #ef4444; margin: 4px 0 0 0;">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Tanggal + Waktu --}}
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px;">
                    <div>
                        <label style="display: block; font-size: 0.875rem; font-weight: 600;
                                      color: #111827; margin-bottom: 6px;">
                            Tanggal Hilang <span style="color: #ef4444;">*</span>
                        </label>
                        <input type="date" name="tanggal_hilang" value="{{ old('tanggal_hilang') }}"
                               max="{{ date('Y-m-d') }}"
                               style="width: 100%; padding: 11px 14px; border: 1px solid #e5e7eb;
                                      border-radius: 10px; font-size: 0.875rem; color: #111827;
                                      outline: none; box-sizing: border-box; background: #f9fafb;"
                               onfocus="this.style.borderColor='#2563eb'; this.style.background='white'"
                               onblur="this.style.borderColor='#e5e7eb'; this.style.background='#f9fafb'">
                        @error('tanggal_hilang')
                            <p style="font-size: 0.75rem; color: #ef4444; margin: 4px 0 0 0;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.875rem; font-weight: 600;
                                      color: #111827; margin-bottom: 6px;">
                            Waktu Perkiraan <span style="color: #ef4444;">*</span>
                        </label>
                        <input type="time" name="waktu_perkiraan" value="{{ old('waktu_perkiraan') }}"
                               style="width: 100%; padding: 11px 14px; border: 1px solid #e5e7eb;
                                      border-radius: 10px; font-size: 0.875rem; color: #111827;
                                      outline: none; box-sizing: border-box; background: #f9fafb;"
                               onfocus="this.style.borderColor='#2563eb'; this.style.background='white'"
                               onblur="this.style.borderColor='#e5e7eb'; this.style.background='#f9fafb'">
                        @error('waktu_perkiraan')
                            <p style="font-size: 0.75rem; color: #ef4444; margin: 4px 0 0 0;">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Deskripsi --}}
                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-size: 0.875rem; font-weight: 600;
                                  color: #111827; margin-bottom: 6px;">
                        Deskripsi Detail
                    </label>
                    <textarea name="deskripsi" rows="4"
                              placeholder="Jelaskan ciri-ciri khusus, warna, merek, atau informasi tambahan lainnya..."
                              style="width: 100%; padding: 11px 14px; border: 1px solid #e5e7eb;
                                     border-radius: 10px; font-size: 0.875rem; color: #111827;
                                     outline: none; resize: vertical; box-sizing: border-box;
                                     font-family: inherit; line-height: 1.6; background: #f9fafb;"
                              onfocus="this.style.borderColor='#2563eb'; this.style.background='white'"
                              onblur="this.style.borderColor='#e5e7eb'; this.style.background='#f9fafb'">{{ old('deskripsi') }}</textarea>
                </div>

                {{-- Foto --}}
                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 600;
                                  color: #111827; margin-bottom: 6px;">
                        Foto Barang <span style="color: #ef4444;">*</span>
                    </label>
                    <label for="foto-barang" id="upload-area"
                           style="display: flex; flex-direction: column; align-items: center;
                                  justify-content: center; gap: 8px; padding: 32px 20px;
                                  border: 2px dashed #d1d5db; border-radius: 12px; cursor: pointer;
                                  background: #f9fafb; transition: all 0.2s;"
                           onmouseover="this.style.borderColor='#2563eb'; this.style.background='#eff6ff'"
                           onmouseout="this.style.borderColor='#d1d5db'; this.style.background='#f9fafb'">
                        <svg style="width: 32px; height: 32px;" fill="none" stroke="#9ca3af" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                        </svg>
                        <span style="font-size: 0.875rem; font-weight: 600; color: #2563eb;">Upload foto</span>
                        <span id="foto-nama" style="font-size: 0.75rem; color: #9ca3af;">PNG, JPG hingga 5MB</span>
                        <input type="file" id="foto-barang" name="foto" accept="image/*"
                               style="display: none;" onchange="previewFoto(this)">
                    </label>

                    <div id="foto-preview" style="display: none; margin-top: 10px; position: relative;">
                        <img id="preview-img"
                             style="width: 100%; max-height: 200px; object-fit: cover;
                                    border-radius: 10px; border: 1px solid #e5e7eb;">
                        <button type="button" onclick="hapusFoto()"
                                style="position: absolute; top: 8px; right: 8px;
                                       background: rgba(0,0,0,0.6); border: none; color: white;
                                       border-radius: 999px; width: 28px; height: 28px;
                                       cursor: pointer; font-size: 0.875rem;">✕</button>
                    </div>

                    @error('foto')
                        <p style="font-size: 0.75rem; color: #ef4444; margin: 4px 0 0 0;">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- CATATAN --}}
            <div style="background: #fffbeb; border: 1px solid #fde68a; border-radius: 12px;
                        padding: 14px 16px; margin-bottom: 24px;">
                <div style="display: flex; gap: 10px; align-items: flex-start;">
                    <svg style="width: 18px; height: 18px; flex-shrink: 0; margin-top: 1px;"
                         fill="none" stroke="#d97706" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div>
                        <p style="font-size: 0.8125rem; font-weight: 700; color: #d97706; margin: 0 0 6px 0;">
                            Catatan Penting:
                        </p>
                        <ul style="font-size: 0.8125rem; color: #92400e; margin: 0; padding: 0;
                                   list-style: none; display: flex; flex-direction: column; gap: 4px;">
                            <li>• Pastikan foto yang diunggah jelas dan dapat diidentifikasi</li>
                            <li>• Isi deskripsi dengan detail untuk mempermudah pencocokan</li>
                            <li>• Anda akan mendapat notifikasi jika barang ditemukan</li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- TOMBOL --}}
            <div style="display: flex; gap: 12px; align-items: center;">
                <button type="submit"
                        style="flex: 1; padding: 14px; background: #2563eb; color: white;
                            font-size: 1rem; font-weight: 700; border: none;
                            border-radius: 12px; cursor: pointer; transition: background 0.2s;"
                        onmouseover="this.style.background='#1d4ed8'"
                        onmouseout="this.style.background='#2563eb'">
                    Kirim Laporan
                </button>
                <a href="{{ route('dashboard') }}"
                   style="padding: 14px 20px; background: none; border: none;
                          font-size: 1rem; font-weight: 500; color: #374151;
                          text-decoration: none; cursor: pointer;">
                    Batal
                </a>
            </div>

        </form>
    </div>
</div>

<script>
    function previewFoto(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview-img').src = e.target.result;
                document.getElementById('foto-preview').style.display = 'block';
                document.getElementById('upload-area').style.display = 'none';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function hapusFoto() {
        document.getElementById('foto-barang').value = '';
        document.getElementById('foto-preview').style.display = 'none';
        document.getElementById('upload-area').style.display = 'flex';
        document.getElementById('foto-nama').textContent = 'PNG, JPG hingga 5MB';
    }
</script>

</x-app-layout>