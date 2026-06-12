<x-guest-layout title="Masuk - SIMBA">

{{-- NAVBAR GUEST --}}
<nav style="background: white; border-bottom: 1px solid #f3f4f6;
            position: fixed; top: 0; left: 0; right: 0; z-index: 50; height: 56px;">
    <div style="max-width: 1024px; margin: 0 auto; padding: 0 16px;
                height: 100%; display: flex; align-items: center; justify-content: space-between;">

        <div style="display: flex; align-items: center; gap: 8px;">
            <img src="{{ asset('images/logo-Simba.png') }}" alt="SIMBA"
                 style="height: 32px; object-fit: contain;">
            <p style="font-size: 0.75rem; color: #9ca3af; margin: 0; line-height: 1;">FILKOM UB</p>
        </div>

        <a href="{{ route('home') }}"
           style="background: #2563eb; color: white; font-size: 0.875rem;
                  padding: 8px 20px; border-radius: 8px; font-weight: 500;
                  text-decoration: none; transition: background 0.2s;"
           onmouseover="this.style.background='#1d4ed8'"
           onmouseout="this.style.background='#2563eb'">
            Beranda
        </a>
    </div>
</nav>

<div style="height: 56px;"></div>

{{-- BACKGROUND --}}
<div style="min-height: calc(100vh - 56px); background: #eff6ff;
            display: flex; align-items: center; justify-content: center; padding: 32px 16px;">

    {{-- CARD --}}
    <div style="background: white; border-radius: 20px; padding: 40px 36px;
                width: 100%; max-width: 460px; box-shadow: 0 4px 24px rgba(0,0,0,0.06);">

        {{-- Logo dalam card --}}
        <div style="display: flex; justify-content: center; margin-bottom: 20px;">
            <img src="{{ asset('images/logo-Simba.png') }}" alt="SIMBA"
                style="height: 72px; object-fit: contain;">
        </div>

        {{-- Judul --}}
        <div style="text-align: center; margin-bottom: 28px;">
            <h1 style="font-size: 1.375rem; font-weight: 700; color: #111827; margin-bottom: 8px;">
                Masuk ke SIMBA
            </h1>
            <p style="font-size: 0.875rem; color: #6b7280; line-height: 1.6; margin: 0;">
                Gunakan akun yang sudah terdaftar untuk masuk
            </p>
        </div>

        {{-- Error Message --}}
        @if ($errors->any())
            <div style="background: #fef2f2; border: 1px solid #fecaca; border-radius: 10px;
                        padding: 12px 14px; margin-bottom: 20px;">
                <p style="font-size: 0.8125rem; color: #dc2626; margin: 0;">
                    {{ $errors->first() }}
                </p>
            </div>
        @endif

        @if (session('error'))
            <div style="background: #fef2f2; border: 1px solid #fecaca; border-radius: 10px;
                        padding: 12px 14px; margin-bottom: 20px;">
                <p style="font-size: 0.8125rem; color: #dc2626; margin: 0;">
                    {{ session('error') }}
                </p>
            </div>
        @endif

        {{-- Tab Role --}}
        <div style="margin-bottom: 24px;">
            <p style="font-size: 0.8125rem; color: #374151; margin-bottom: 8px; font-weight: 500;">
                Login sebagai:
            </p>
            <div style="display: flex; gap: 8px;">
                <button type="button" onclick="setRole('mahasiswa', this)"
                        id="tab-mahasiswa"
                        style="flex: 1; padding: 8px 12px; border-radius: 8px; font-size: 0.875rem;
                               font-weight: 500; cursor: pointer; border: 1px solid #2563eb;
                               background: #2563eb; color: white; transition: all 0.2s;">
                    Mahasiswa
                </button>
                <button type="button" onclick="setRole('security', this)"
                        id="tab-security"
                        style="flex: 1; padding: 8px 12px; border-radius: 8px; font-size: 0.875rem;
                               font-weight: 500; cursor: pointer; border: 1px solid #e5e7eb;
                               background: white; color: #374151; transition: all 0.2s;">
                    Security
                </button>
            </div>
        </div>

        {{-- FORM LOGIN --}}
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="hidden" name="role" id="selected-role" value="mahasiswa">

            <div style="margin-bottom: 12px;">
                <input type="email" name="email" placeholder="Email (@student.ub.ac.id)"
                       value="{{ old('email') }}"
                       id="input-email"
                       style="width: 100%; padding: 11px 14px; border: 1px solid #e5e7eb;
                              border-radius: 10px; font-size: 0.875rem; color: #111827;
                              outline: none; box-sizing: border-box;"
                       onfocus="this.style.borderColor='#2563eb'"
                       onblur="this.style.borderColor='#e5e7eb'">
            </div>

            <div style="margin-bottom: 20px;">
                <input type="password" name="password" placeholder="Password"
                       style="width: 100%; padding: 11px 14px; border: 1px solid #e5e7eb;
                              border-radius: 10px; font-size: 0.875rem; color: #111827;
                              outline: none; box-sizing: border-box;"
                       onfocus="this.style.borderColor='#2563eb'"
                       onblur="this.style.borderColor='#e5e7eb'">
            </div>

            <button type="submit"
                    style="width: 100%; padding: 13px; background: #2563eb; color: white;
                           font-size: 0.9375rem; font-weight: 600; border: none;
                           border-radius: 12px; cursor: pointer; transition: background 0.2s;"
                    onmouseover="this.style.background='#1d4ed8'"
                    onmouseout="this.style.background='#2563eb'">
                Masuk
            </button>
        </form>

        {{-- Divider --}}
        <div style="display: flex; align-items: center; gap: 12px; margin: 20px 0;">
            <div style="flex: 1; height: 1px; background: #e5e7eb;"></div>
            <span style="font-size: 0.8125rem; color: #9ca3af;">Atau</span>
            <div style="flex: 1; height: 1px; background: #e5e7eb;"></div>
        </div>

        {{-- Lihat Barang Tanpa Login --}}
        <a href="{{ route('barang.public') }}"
           style="display: block; text-align: center; padding: 11px;
                  border: 1px solid #e5e7eb; border-radius: 10px; font-size: 0.875rem;
                  color: #374151; text-decoration: none; font-weight: 500;
                  transition: background 0.2s; margin-bottom: 16px;"
           onmouseover="this.style.background='#f9fafb'"
           onmouseout="this.style.background='white'">
            Lihat Barang Temuan (Tanpa Login)
        </a>

        {{-- Catatan --}}
        <div id="note-box" style="background: #eff6ff; border-radius: 10px; padding: 12px 14px;">
            <p id="note-text" style="font-size: 0.8125rem; color: #1e40af; line-height: 1.6; margin: 0;">
                <strong>Catatan:</strong> Gunakan email dan password akun Mahasiswa SIMBA yang sudah terdaftar.
            </p>
        </div>

    </div>
</div>

<script>
    const notes = {
        mahasiswa: 'Gunakan email dan password akun Mahasiswa SIMBA yang sudah terdaftar.',
        security:  'Login ini khusus untuk petugas Security. Hubungi admin jika lupa password.',
    };

    const placeholders = {
        mahasiswa: 'Email (@student.ub.ac.id)',
        security:  'Username atau Email',
    };

    function setRole(role, el) {
        ['mahasiswa', 'security'].forEach(r => {
            const btn = document.getElementById('tab-' + r);
            btn.style.background = 'white';
            btn.style.color = '#374151';
            btn.style.borderColor = '#e5e7eb';
        });

        el.style.background = '#2563eb';
        el.style.color = 'white';
        el.style.borderColor = '#2563eb';

        document.getElementById('selected-role').value = role;
        document.getElementById('input-email').placeholder = placeholders[role];
        document.getElementById('note-text').innerHTML =
            '<strong>Catatan:</strong> ' + notes[role];
    }
</script>

</x-guest-layout>