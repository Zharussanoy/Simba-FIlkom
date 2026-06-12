<x-app-layout title="Profil Saya">
<div class="max-w-5xl mx-auto px-4 sm:px-6 py-8">

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
    <style>
        @keyframes slideIn {
            from { opacity: 0; transform: translateX(20px); }
            to   { opacity: 1; transform: translateX(0); }
        }
    </style>
    <script>
        setTimeout(() => {
            const el = document.getElementById('notif-success');
            if (el) el.style.display = 'none';
        }, 5000);
    </script>
    @endif

    {{-- KEMBALI --}}
    <a href="{{ route('dashboard') }}"
       style="display: inline-flex; align-items: center; gap: 6px; font-size: 0.875rem;
              color: #374151; text-decoration: none; margin-bottom: 24px; font-weight: 500;"
       onmouseover="this.style.color='#111827'"
       onmouseout="this.style.color='#374151'">
        <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Kembali
    </a>

    @php $user = auth()->user(); @endphp

    <div style="display: grid; grid-template-columns: 280px 1fr; gap: 20px; align-items: start;">

        {{-- KOLOM KIRI - INFO PROFIL --}}
        <div style="background: white; border: 1px solid #e5e7eb; border-radius: 20px; padding: 28px; text-align: center;">

            {{-- Avatar --}}
            <div style="width: 80px; height: 80px; background: #dbeafe; border-radius: 999px;
                        display: flex; align-items: center; justify-content: center; margin: 0 auto 16px auto;">
                <svg style="width: 40px; height: 40px;" fill="none" stroke="#2563eb" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>

            {{-- Nama & NIM --}}
            <h2 style="font-size: 1.0625rem; font-weight: 700; color: #111827; margin: 0 0 4px 0;">
                {{ $user->name }}
            </h2>
            <p style="font-size: 0.8125rem; color: #6b7280; margin: 0 0 12px 0;">
                {{ $user->nim ?? '-' }}
            </p>

            {{-- Badge Role --}}
            <span style="display: inline-block; background: #111827; color: white;
                         font-size: 0.75rem; font-weight: 600; padding: 4px 14px;
                         border-radius: 999px; margin-bottom: 24px;">
                {{ ucfirst($user->role ?? 'Mahasiswa') }}
            </span>

            {{-- Info Detail --}}
            <div style="text-align: left; border-top: 1px solid #f3f4f6; padding-top: 20px;
                        display: flex; flex-direction: column; gap: 14px;">

                <div style="display: flex; align-items: flex-start; gap: 10px;">
                    <svg style="width: 16px; height: 16px; flex-shrink: 0; margin-top: 1px;" fill="none" stroke="#9ca3af" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <div>
                        <p style="font-size: 0.6875rem; color: #9ca3af; margin: 0 0 1px 0;">Email</p>
                        <p style="font-size: 0.8125rem; color: #374151; margin: 0; word-break: break-all;">
                            {{ $user->email }}
                        </p>
                    </div>
                </div>

                <div style="display: flex; align-items: flex-start; gap: 10px;">
                    <svg style="width: 16px; height: 16px; flex-shrink: 0; margin-top: 1px;" fill="none" stroke="#9ca3af" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    </svg>
                    <div>
                        <p style="font-size: 0.6875rem; color: #9ca3af; margin: 0 0 1px 0;">Fakultas</p>
                        <p style="font-size: 0.8125rem; color: #374151; margin: 0;">
                            {{ $user->fakultas ?? 'Belum diisi' }}
                        </p>
                    </div>
                </div>

                <div style="display: flex; align-items: flex-start; gap: 10px;">
                    <svg style="width: 16px; height: 16px; flex-shrink: 0; margin-top: 1px;" fill="none" stroke="#9ca3af" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    <div>
                        <p style="font-size: 0.6875rem; color: #9ca3af; margin: 0 0 1px 0;">Prodi</p>
                        <p style="font-size: 0.8125rem; color: #374151; margin: 0;">
                            {{ $user->prodi ?? 'Belum diisi' }}
                        </p>
                    </div>
                </div>

                <div style="display: flex; align-items: flex-start; gap: 10px;">
                    <svg style="width: 16px; height: 16px; flex-shrink: 0; margin-top: 1px;" fill="none" stroke="#9ca3af" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <div>
                        <p style="font-size: 0.6875rem; color: #9ca3af; margin: 0 0 1px 0;">Bergabung</p>
                        <p style="font-size: 0.8125rem; color: #374151; margin: 0;">
                            {{ \Carbon\Carbon::parse($user->created_at)->format('Y-m-d') }}
                        </p>
                    </div>
                </div>

            </div>

            {{-- Edit Profil --}}
            <button onclick="document.getElementById('modal-edit').style.display='flex'"
                    style="width: 100%; margin-top: 20px; padding: 10px; background: #2563eb;
                        border: none; border-radius: 10px; font-size: 0.875rem;
                        font-weight: 500; color: white; cursor: pointer; transition: background 0.2s;"
                    onmouseover="this.style.background='#1d4ed8'"
                    onmouseout="this.style.background='#2563eb'">
                Edit Profil
            </button>
        </div>

        {{-- KOLOM KANAN --}}
        <div style="display: flex; flex-direction: column; gap: 20px;">

            {{-- STAT CARDS --}}
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px;">

                <div style="background: white; border: 1px solid #e5e7eb; border-radius: 16px; padding: 18px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                        <p style="font-size: 0.8125rem; color: #6b7280; margin: 0;">Total Laporan</p>
                        <svg style="width: 16px; height: 16px;" fill="none" stroke="#9ca3af" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"/>
                        </svg>
                    </div>
                    <p style="font-size: 1.75rem; font-weight: 800; color: #111827; margin: 0;">
                        {{ $totalLaporan }}
                    </p>
                </div>

                <div style="background: white; border: 1px solid #e5e7eb; border-radius: 16px; padding: 18px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                        <p style="font-size: 0.8125rem; color: #6b7280; margin: 0;">Ditemukan</p>
                        <svg style="width: 16px; height: 16px;" fill="none" stroke="#22c55e" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <p style="font-size: 1.75rem; font-weight: 800; color: #111827; margin: 0;">
                        {{ $totalDitemukan }}
                    </p>
                </div>

                <div style="background: white; border: 1px solid #e5e7eb; border-radius: 16px; padding: 18px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                        <p style="font-size: 0.8125rem; color: #6b7280; margin: 0;">Pending</p>
                        <svg style="width: 16px; height: 16px;" fill="none" stroke="#f59e0b" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <p style="font-size: 1.75rem; font-weight: 800; color: #111827; margin: 0;">
                        {{ $totalPending }}
                    </p>
                </div>

            </div>

            {{-- AKTIVITAS TERBARU --}}
            <div style="background: white; border: 1px solid #e5e7eb; border-radius: 20px; padding: 24px;">
                <h3 style="font-size: 1rem; font-weight: 700; color: #111827; margin: 0 0 4px 0;">
                    Aktivitas Terbaru
                </h3>
                <p style="font-size: 0.8125rem; color: #6b7280; margin: 0 0 20px 0;">
                    Riwayat laporan dan klaim barang
                </p>

                <div style="display: flex; flex-direction: column; gap: 10px;">
                    @forelse($aktivitas as $item)
                        <div style="display: flex; align-items: center; justify-content: space-between;
                                    padding: 14px 16px; border: 1px solid #f3f4f6;
                                    border-radius: 12px; background: #fafafa;">
                            <div>
                                <p style="font-size: 0.875rem; font-weight: 600; color: #111827; margin: 0 0 2px 0;">
                                    {{ $item['aksi'] }}
                                </p>
                                <p style="font-size: 0.8125rem; color: #6b7280; margin: 0 0 2px 0;">
                                    {{ $item['nama'] }}
                                </p>
                                <p style="font-size: 0.75rem; color: #9ca3af; margin: 0;">
                                    {{ $item['waktu'] }}
                                </p>
                            </div>
                            @php
                                $badgeStyle = match($item['status']) {
                                    'Selesai'  => 'background: #111827; color: white;',
                                    'Pending'  => 'background: #f3f4f6; color: #374151; border: 1px solid #e5e7eb;',
                                    default    => 'background: #fef3c7; color: #d97706;',
                                };
                            @endphp
                            <span style="font-size: 0.75rem; font-weight: 600; padding: 4px 12px;
                                         border-radius: 999px; white-space: nowrap; {{ $badgeStyle }}">
                                {{ $item['status'] }}
                            </span>
                        </div>
                    @empty
                        <p style="text-align: center; color: #9ca3af; font-size: 0.875rem; padding: 20px 0;">
                            Belum ada aktivitas
                        </p>
                    @endforelse
                </div>
            </div>

            {{-- PENGATURAN AKUN --}}
            <div style="background: white; border: 1px solid #e5e7eb; border-radius: 20px; padding: 24px;">
                <h3 style="font-size: 1rem; font-weight: 700; color: #111827; margin: 0 0 16px 0;">
                    Pengaturan Akun
                </h3>

                <div style="display: flex; flex-direction: column; gap: 8px;">
                    <button style="width: 100%; text-align: left; padding: 14px 16px;
                                   border: 1px solid #e5e7eb; border-radius: 10px; background: white;
                                   font-size: 0.875rem; color: #374151; cursor: pointer;"
                            onmouseover="this.style.background='#f9fafb'"
                            onmouseout="this.style.background='white'">
                        Notifikasi Preferensi
                    </button>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                style="width: 100%; text-align: left; padding: 14px 16px;
                                       border: 1px solid #fee2e2; border-radius: 10px; background: white;
                                       font-size: 0.875rem; color: #ef4444; cursor: pointer; font-weight: 500;"
                                onmouseover="this.style.background='#fef2f2'"
                                onmouseout="this.style.background='white'">
                            Keluar dari Akun
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- MODAL EDIT PROFIL --}}
<div id="modal-edit"
     style="display: none; position: fixed; inset: 0; z-index: 100;
            background: rgba(0,0,0,0.5); align-items: center; justify-content: center;
            padding: 24px;"
     onclick="if(event.target===this) document.getElementById('modal-edit').style.display='none'">

    <div style="background: white; border-radius: 20px; padding: 28px;
                width: 100%; max-width: 480px; max-height: 85vh; overflow-y: auto;">

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h2 style="font-size: 1.125rem; font-weight: 700; color: #111827; margin: 0;">Edit Profil</h2>
            <button onclick="document.getElementById('modal-edit').style.display='none'"
                    style="background: #f3f4f6; border: none; cursor: pointer; color: #6b7280;
                           width: 28px; height: 28px; border-radius: 999px; font-size: 0.875rem;">✕</button>
        </div>

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            <div style="margin-bottom: 14px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #111827; margin-bottom: 6px;">
                    Nama Lengkap
                </label>
                <input type="text" name="name" value="{{ $user->name }}"
                       style="width: 100%; padding: 11px 14px; border: 1px solid #e5e7eb;
                              border-radius: 10px; font-size: 0.875rem; outline: none;
                              box-sizing: border-box; background: #f9fafb;"
                       onfocus="this.style.borderColor='#2563eb'; this.style.background='white'"
                       onblur="this.style.borderColor='#e5e7eb'; this.style.background='#f9fafb'">
            </div>

            <div style="margin-bottom: 14px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #111827; margin-bottom: 6px;">
                    NIM
                </label>
                <input type="text" name="nim" value="{{ $user->nim }}"
                       style="width: 100%; padding: 11px 14px; border: 1px solid #e5e7eb;
                              border-radius: 10px; font-size: 0.875rem; outline: none;
                              box-sizing: border-box; background: #f9fafb;"
                       onfocus="this.style.borderColor='#2563eb'; this.style.background='white'"
                       onblur="this.style.borderColor='#e5e7eb'; this.style.background='#f9fafb'">
            </div>

            <div style="margin-bottom: 14px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #111827; margin-bottom: 6px;">
                    Nomor Kontak
                </label>
                <input type="text" name="nomor_kontak" value="{{ $user->nomor_kontak }}"
                       style="width: 100%; padding: 11px 14px; border: 1px solid #e5e7eb;
                              border-radius: 10px; font-size: 0.875rem; outline: none;
                              box-sizing: border-box; background: #f9fafb;"
                       onfocus="this.style.borderColor='#2563eb'; this.style.background='white'"
                       onblur="this.style.borderColor='#e5e7eb'; this.style.background='#f9fafb'">
            </div>

            <div style="margin-bottom: 14px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #111827; margin-bottom: 6px;">
                    Fakultas
                </label>
                <input type="text" name="fakultas" value="{{ $user->fakultas }}"
                       placeholder="Contoh: Fakultas Ilmu Komputer"
                       style="width: 100%; padding: 11px 14px; border: 1px solid #e5e7eb;
                              border-radius: 10px; font-size: 0.875rem; outline: none;
                              box-sizing: border-box; background: #f9fafb;"
                       onfocus="this.style.borderColor='#2563eb'; this.style.background='white'"
                       onblur="this.style.borderColor='#e5e7eb'; this.style.background='#f9fafb'">
            </div>

            <div style="margin-bottom: 24px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #111827; margin-bottom: 6px;">
                    Program Studi
                </label>
                <input type="text" name="prodi" value="{{ $user->prodi }}"
                       placeholder="Contoh: Pendidikan Teknologi Informasi"
                       style="width: 100%; padding: 11px 14px; border: 1px solid #e5e7eb;
                              border-radius: 10px; font-size: 0.875rem; outline: none;
                              box-sizing: border-box; background: #f9fafb;"
                       onfocus="this.style.borderColor='#2563eb'; this.style.background='white'"
                       onblur="this.style.borderColor='#e5e7eb'; this.style.background='#f9fafb'">
            </div>

            <div style="display: flex; gap: 12px;">
                <button type="submit"
                        style="flex: 1; padding: 12px; background: #2563eb; color: white;
                            font-size: 0.9375rem; font-weight: 700; border: none;
                            border-radius: 12px; cursor: pointer;"
                        onmouseover="this.style.background='#1d4ed8'"
                        onmouseout="this.style.background='#2563eb'">
                    Simpan
                </button>
                <button type="button"
                        onclick="document.getElementById('modal-edit').style.display='none'"
                        style="padding: 12px 20px; background: none; border: none;
                               font-size: 0.9375rem; color: #374151; cursor: pointer; font-weight: 500;">
                    Batal
                </button>
            </div>
        </form>
    </div>
</div>

</x-app-layout>