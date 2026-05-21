<x-guest-layout title="SIMBA-FILKOM">

{{-- HERO --}}
<section class="bg-gradient-to-b from-slate-100 to-white">
    <div class="max-w-5xl mx-auto px-4 py-24 text-center">

        <h1 class="text-4xl font-black text-gray-900 mb-4">
            SIMBA-FILKOM
        </h1>

        <p class="text-gray-500 max-w-xl mx-auto mb-8">
            Sistem Informasi Barang Hilang & Temuan Fakultas Ilmu Komputer Universitas Brawijaya
        </p>

        <div class="flex justify-center gap-3">
            <a href="{{ route('login') }}"
               class="bg-blue-600 text-white px-5 py-2.5 rounded-xl text-sm hover:bg-blue-700">
                Mulai Sekarang
            </a>

            <a href="{{ route('barang.public') }}"
               class="border px-5 py-2.5 rounded-xl text-sm text-gray-700 hover:bg-gray-50">
                Lihat Barang
            </a>
        </div>

    </div>
</section>

{{-- FITUR --}}
<section class="py-16">
    <div class="max-w-5xl mx-auto px-4">

        <h2 class="text-center text-xl font-bold mb-10">Fitur Utama</h2>

        <div class="grid sm:grid-cols-3 gap-4">

            <div class="p-5 bg-white border rounded-2xl">
                <h3 class="font-semibold mb-2">Lapor Barang Hilang</h3>
                <p class="text-sm text-gray-500">Lapor dengan cepat dan mudah</p>
            </div>

            <div class="p-5 bg-white border rounded-2xl">
                <h3 class="font-semibold mb-2">Cari Barang Temuan</h3>
                <p class="text-sm text-gray-500">Filter berdasarkan lokasi</p>
            </div>

            <div class="p-5 bg-white border rounded-2xl">
                <h3 class="font-semibold mb-2">Tracking Status</h3>
                <p class="text-sm text-gray-500">Pantau status barang</p>
            </div>

        </div>
    </div>
</section>

{{-- CTA --}}
<section class="bg-blue-600 py-16 text-center text-white">
    <h2 class="text-2xl font-bold mb-3">Mulai Gunakan SIMBA</h2>
    <p class="text-blue-100 mb-6">Bantu temukan barang hilang di kampus</p>

    <a href="{{ route('login') }}"
       class="bg-white text-blue-600 px-6 py-3 rounded-xl text-sm font-semibold">
        Login Sekarang
    </a>
</section>

</x-guest-layout>