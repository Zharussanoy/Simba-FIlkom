<x-app-layout title="Katalog Barang Temuan">
<div class="max-w-5xl mx-auto px-4 sm:px-6 py-8">

    {{-- HEADER --}}
    <div style="margin-bottom: 24px;">
        <h1 style="font-size: 1.5rem; font-weight: 800; color: #111827; margin-bottom: 4px;">
            Katalog Barang Temuan
        </h1>
        <p style="font-size: 0.875rem; color: #6b7280; margin: 0;">
            Cari barang yang Anda hilangkan dari daftar barang yang ditemukan
        </p>
    </div>

    {{-- FILTER --}}
    <form method="GET" action="{{ route('barang.public') }}">
        <div style="background: white; border: 1px solid #e5e7eb; border-radius: 16px;
                    padding: 16px 20px; margin-bottom: 24px;">

            {{-- Search --}}
            <div style="position: relative; margin-bottom: 14px;">
                <svg style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%);
                            width: 16px; height: 16px; color: #9ca3af;"
                     fill="none" stroke="#9ca3af" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
                </svg>
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Cari nama barang..."
                       style="width: 100%; padding: 10px 14px 10px 36px; border: 1px solid #e5e7eb;
                              border-radius: 10px; font-size: 0.875rem; color: #111827;
                              outline: none; box-sizing: border-box;"
                       onfocus="this.style.borderColor='#2563eb'"
                       onblur="this.style.borderColor='#e5e7eb'">
            </div>

            {{-- Dropdowns --}}
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px;">

                <div>
                    <label style="font-size: 0.75rem; color: #6b7280; display: flex;
                                  align-items: center; gap: 4px; margin-bottom: 6px; font-weight: 500;">
                        <svg style="width: 13px; height: 13px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L13 13.414V19a1 1 0 01-.553.894l-4 2A1 1 0 017 21v-7.586L3.293 6.707A1 1 0 013 6V4z"/>
                        </svg>
                        Kategori
                    </label>
                    <select name="kategori"
        style="width: 100%; padding: 9px 12px; border: 1px solid #e5e7eb;
               border-radius: 8px; font-size: 0.875rem; color: #374151;
               background: white; outline: none; cursor: pointer;">

    <option value="">Semua Kategori</option>

    @foreach($kategoris as $k)
        <option value="{{ $k->id }}"
            {{ request('kategori') == $k->id ? 'selected' : '' }}>
            {{ $k->nama }}
        </option>
    @endforeach

</select>
                </div>

                <div>
                    <label style="font-size: 0.75rem; color: #6b7280; display: flex;
                                  align-items: center; gap: 4px; margin-bottom: 6px; font-weight: 500;">
                        <svg style="width: 13px; height: 13px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        </svg>
                        Lokasi
                    </label>
                    <select name="lokasi"
                            style="width: 100%; padding: 9px 12px; border: 1px solid #e5e7eb;
                                   border-radius: 8px; font-size: 0.875rem; color: #374151;
                                   background: white; outline: none; cursor: pointer;">
                        <option value="">Semua Lokasi</option>
                        @foreach($lokasis as $l)
                            <option value="{{ $l->id }}" {{ request('lokasi') == $l->id ? 'selected' : '' }}>
                                {{ $l->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label style="font-size: 0.75rem; color: #6b7280; display: flex;
                                  align-items: center; gap: 4px; margin-bottom: 6px; font-weight: 500;">
                        <svg style="width: 13px; height: 13px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Status
                    </label>
                    <select name="status"
                            style="width: 100%; padding: 9px 12px; border: 1px solid #e5e7eb;
                                   border-radius: 8px; font-size: 0.875rem; color: #374151;
                                   background: white; outline: none; cursor: pointer;">
                        <option value="">Semua Status</option>
                        <option value="tersedia" {{ request('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="diklaim"  {{ request('status') == 'diklaim'  ? 'selected' : '' }}>Diklaim</option>
                    </select>
                </div>

            </div>

            {{-- Info + Reset --}}
            <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 14px;">
                <p style="font-size: 0.8125rem; color: #6b7280; margin: 0;">
                    Menampilkan <strong>{{ $barangs->count() }}</strong> dari
                    <strong>{{ $barangs->total() }}</strong> barang
                </p>
                @if(request()->anyFilled(['search','kategori','lokasi','status']))
                    <a href="{{ route('barang.public') }}"
                       style="font-size: 0.8125rem; color: #374151; text-decoration: none;
                              font-weight: 500; padding: 6px 12px; border: 1px solid #e5e7eb;
                              border-radius: 8px;">
                        Reset Filter
                    </a>
                @endif
            </div>

        </div>
    </form>

    {{-- GRID BARANG --}}
    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px;">
        @forelse($barangs as $barang)
            <a href="{{ route('barang.show', $barang->id) }}"
               style="background: white; border: 1px solid #e5e7eb; border-radius: 16px;
                      overflow: hidden; text-decoration: none; display: block;
                      transition: box-shadow 0.2s;"
               onmouseover="this.style.boxShadow='0 4px 16px rgba(0,0,0,0.08)'"
               onmouseout="this.style.boxShadow='none'">

                {{-- Foto --}}
                <div style="position: relative; width: 100%; padding-top: 66%; background: #f3f4f6; overflow: hidden;">
                    @if($barang->foto)
                        <img src="{{ Storage::url($barang->foto) }}"
                             alt="{{ $barang->nama_barang }}"
                             style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover;">
                    @else
                        <div style="position: absolute; inset: 0; display: flex; align-items: center;
                                    justify-content: center; background: #f9fafb;">
                            <svg style="width: 40px; height: 40px;" fill="none" stroke="#d1d5db" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    @endif

                    {{-- Badge Status --}}
                    @php
                        $status = strtolower($barang->status ?? 'tersedia');
                        $badgeBg = $status === 'diklaim' ? 'rgba(0,0,0,0.75)' : 'rgba(0,0,0,0.75)';
                        $badgeLabel = $status === 'diklaim' ? 'Diklaim' : 'Tersedia';
                    @endphp
                    <span style="position: absolute; top: 10px; right: 10px;
                                 background: rgba(0,0,0,0.72); color: white;
                                 font-size: 0.75rem; font-weight: 600;
                                 padding: 4px 10px; border-radius: 999px;">
                        {{ $badgeLabel }}
                    </span>
                </div>

                {{-- Info --}}
                <div style="padding: 14px 16px;">
                    <h3 style="font-size: 0.9375rem; font-weight: 700; color: #111827;
                               margin: 0 0 8px 0;">
                        {{ $barang->nama_barang }}
                    </h3>

                    <div style="display: flex; align-items: center; gap: 6px; margin-bottom: 4px;">
                        <svg style="width: 13px; height: 13px; flex-shrink: 0;" fill="none" stroke="#9ca3af" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"/>
                        </svg>
                        <span style="font-size: 0.8125rem; color: #6b7280;">{{ $barang->kategori->nama ?? '-' }}</span>
                    </div>

                    <div style="display: flex; align-items: center; gap: 6px; margin-bottom: 4px;">
                        <svg style="width: 13px; height: 13px; flex-shrink: 0;" fill="none" stroke="#9ca3af" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        </svg>
                        <span style="font-size: 0.8125rem; color: #6b7280;">
                            {{ $barang->lokasi->nama ?? 'Lokasi tidak diketahui' }}
                        </span>
                    </div>

                    <p style="font-size: 0.75rem; color: #9ca3af; margin: 6px 0 0 0;">
                        Ditemukan: {{ \Carbon\Carbon::parse($barang->created_at)->format('Y-m-d') }}
                    </p>
                </div>

            </a>
        @empty
            <div style="grid-column: span 2; text-align: center; padding: 60px 20px;">
                <p style="color: #9ca3af; font-size: 0.875rem;">Tidak ada barang ditemukan</p>
            </div>
        @endforelse
    </div>

    {{-- PAGINATION --}}
    @if($barangs->hasPages())
        <div style="margin-top: 24px;">
            {{ $barangs->links() }}
        </div>
    @endif

</div>
</x-app-layout>