@extends('layouts.layout')

@section('title', 'Jam Mengajar')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Jam Mengajar</h6>
        <a href="{{ route('jam-mengajar.create') }}" class="btn btn-primary btn-sm float-right">Tambah Data</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Guru</th>
                    <th>Tanggal</th>
                    <th>Jumlah Jam</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jamMengajar as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->guru->nama }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                    <td>{{ $item->jumlah_jam }}</td>
                    <td>
                        <a href="{{ route('jam-mengajar.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('jam-mengajar.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
