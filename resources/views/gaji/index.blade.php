@extends('layouts.layout')

@section('title', 'Data Gaji')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Gaji</h6>
        <a href="{{ route('gaji.create') }}" class="btn btn-success btn-sm float-right">Tambah Gaji</a> <!-- Tombol tambah gaji -->
        <form method="GET" class="form-inline float-right mr-2">
            <div class="form-group mx-sm-2 mb-2">
                <input type="month" class="form-control" name="bulan_tahun" value="{{ request('bulan_tahun') ?? now()->format('Y-m') }}">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Filter</button>
        </form>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Guru</th>
                    <th>Bulan</th>
                    <th>Gaji Pokok</th>
                    <th>Potongan</th>
                    <th>Total Gaji</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($gaji as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->guru->nama }}</td>
                    <td>{{ \Carbon\Carbon::create($item->tahun, $item->bulan)->format('F Y') }}</td>
                    <td>Rp{{ number_format($item->gaji_pokok, 0, ',', '.') }}</td>
                    <td>Rp{{ number_format($item->potongan, 0, ',', '.') }}</td>
                    <td>Rp{{ number_format($item->total_gaji, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('gaji.print', $item->id) }}" class="btn btn-info btn-sm">Print Slip Gaji</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
