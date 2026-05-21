<h1>Dashboard SIMBA</h1>

<p>Total Barang: {{ $totalBarang }}</p>
<p>Total Laporan: {{ $totalLaporan }}</p>

<hr>

<h3>Barang Terbaru</h3>
@foreach($barangsTerbaru as $barang)
    <div>
        {{ $barang->nama_barang }}
    </div>
@endforeach

<hr>

<h3>Laporan Terbaru</h3>
@foreach($laporanTerbaru as $laporan)
    <div>
        {{ $laporan->judul }}
    </div>
@endforeach