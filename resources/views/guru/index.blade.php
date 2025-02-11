@extends('layouts.layout')

@section('title', 'Data Guru')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Guru</h6>
        <a href="{{ route('guru.create') }}" class="btn btn-primary btn-sm float-right"> <i class="fa fa-add"></i> Tambah Data</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Email</th>
                    <th>Harga Per Jam</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($guru as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->nip }}</td>
                    <td>{{ $item->user ? $item->user->email : '-' }}</td>
                    <td>Rp{{ number_format($item->harga_per_jam, 0, ',', '.') }}</td>
                    <td>{{ ucfirst($item->status_honorer) }}</td>
                    <td>
                        <a href="{{ route('guru.edit', $item->id) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ route('guru.destroy', $item->id) }}" method="POST" class="d-inline" id="deleteForm{{ $item->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $item->id }}, 'deleteForm{{ $item->id }}')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Data kosong</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
