@extends('layouts.layout')

@section('title', 'Edit Data Guru')

@section('content')
<div class="card shadow">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data Guru</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('guru.update', $guru->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ $guru->nama }}" required>
            </div>
            <div class="form-group">
                <label for="nip">NIP</label>
                <input type="text" name="nip" id="nip" class="form-control" value="{{ $guru->nip }}">
            </div>
            <div class="form-group">
                <label for="harga_per_jam">Harga Per Jam</label>
                <input type="number" name="harga_per_jam" id="harga_per_jam" class="form-control" value="{{ $guru->harga_per_jam }}" required>
            </div>
            <div class="form-group">
                <label for="status_honorer">Status</label>
                <select name="status_honorer" id="status_honorer" class="form-control" required>
                    <option value="honorer" {{ $guru->status_honorer == 'honorer' ? 'selected' : '' }}>Honorer</option>
                    <option value="tetap" {{ $guru->status_honorer == 'tetap' ? 'selected' : '' }}>Tetap</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('guru.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
