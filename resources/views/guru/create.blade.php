@extends('layouts.layout')

@section('title', 'Tambah Data Guru')

@section('content')
<div class="card shadow">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Guru</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('guru.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
            </div>
            <div class="form-group">
                <label for="nip">NIP</label>
                <input type="text" name="nip" id="nip" class="form-control" value="{{ old('nip') }}">
            </div>
            <div class="form-group">
                <label for="harga_per_jam">Harga Per Jam</label>
                <input type="number" name="harga_per_jam" id="harga_per_jam" class="form-control" value="{{ old('harga_per_jam') }}" required>
            </div>
            <div class="form-group">
                <label for="status_honorer">Status</label>
                <select name="status_honorer" id="status_honorer" class="form-control" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="honorer" {{ old('status_honorer') == 'honorer' ? 'selected' : '' }}>Honorer</option>
                    <option value="tetap" {{ old('status_honorer') == 'tetap' ? 'selected' : '' }}>Tetap</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('guru.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
