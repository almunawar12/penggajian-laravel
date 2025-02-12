@extends('layouts.layout')

@section('title', 'Data Absen')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Absen</h6>
        
        @if(auth()->user()->role == 'admin') 
            <a href="{{ route('absen.create') }}" class="btn btn-primary btn-sm float-right">
                <i class="fas fa-plus"></i> Tambah Data
            </a>
        @endif
    </div>
    
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Guru</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    @if(auth()->user()->role == 'admin') 
                        <th>Aksi</th> {{-- Hanya admin yang melihat kolom aksi --}}
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse($absen as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->guru->nama }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                    <td>{{ $item->keterangan ?? 'Tidak Ada' }}</td>
                    
                    @if(auth()->user()->role == 'admin') 
                        <td>
                            <a href="{{ route('absen.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('absen.destroy', $item->id) }}" method="POST" class="d-inline" id="deleteForm{{ $item->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $item->id }}, 'deleteForm{{ $item->id }}')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    @endif
                </tr>
                @empty
                    <tr>
                        <td colspan="{{ auth()->user()->role == 'admin' ? 5 : 4 }}" class="text-center">Data kosong</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
