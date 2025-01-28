@extends('layouts.layout')

@section('title', 'Slip Gaji')

@section('content')
<!-- Bagian yang tidak akan terlihat saat dicetak -->
<div class="d-none" id="non-printable">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Slip Gaji - {{ $gaji->guru->nama }}</h6>
    </div>
</div>

<div class="card shadow mb-4" id="printable">
    <div class="card-body">
        <table class="table">
            <tr>
                <th>Nama Guru</th>
                <td>{{ $gaji->guru->nama }}</td>
            </tr>
            <tr>
                <th>Bulan</th>
                <td>{{ \Carbon\Carbon::create($gaji->tahun, $gaji->bulan)->format('F Y') }}</td>
            </tr>
            <tr>
                <th>Gaji Pokok</th>
                <td>Rp{{ number_format($gaji->gaji_pokok, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Potongan</th>
                <td>Rp{{ number_format($gaji->potongan, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Total Gaji</th>
                <td>Rp{{ number_format($gaji->total_gaji, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Tanggal Pembayaran</th>
                <td>{{ $gaji->tanggal_pembayaran->format('d-m-Y') }}</td>
            </tr>
        </table>
    </div>
    <!-- Tombol untuk Print -->
</div>
<button onclick="printTable()" class="btn btn-primary">Print Slip Gaji</button>

@endsection

@section('styles')
<style>
    /* Menyembunyikan bagian yang tidak perlu saat dicetak */
    @media print {
        #non-printable {
            display: none;
        }
        /* Hanya tampilkan bagian yang dicetak */
        #printable {
            display: block;
        }
        /* Menyembunyikan tombol print saat dicetak */
        .btn {
            display: none !important;
        }
    }
</style>
@endsection



@push('scripts')
<script>
    function printTable() {
        var printableContent = document.getElementById('printable');
        if (!printableContent) {
            alert("Elemen yang ingin dicetak tidak ditemukan.");
            return;
        }

        // Sembunyikan elemen yang tidak perlu
        document.getElementById('non-printable').style.display = 'none';
        
        // Buat jendela baru untuk mencetak
        var printWindow = window.open('', '', 'height=600,width=800');
        printWindow.document.write('<html><head><title>Print Slip Gaji</title>');
        printWindow.document.write('<style>table { width: 100%; border-collapse: collapse; } table, th, td { border: 1px solid black; padding: 8px; text-align: left; } </style></head><body>');
        printWindow.document.write(printableContent.innerHTML);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();

        // Kembalikan elemen yang disembunyikan
        document.getElementById('non-printable').style.display = 'block';
    }
</script>
@endpush
