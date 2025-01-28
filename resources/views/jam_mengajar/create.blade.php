@extends('layouts.layout')

@section('title', 'Tambah Data Jam Mengajar')

@section('content')
<div class="card shadow">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Jam Mengajar</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('jam-mengajar.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="guru_id">Nama Guru</label>
                <select name="guru_id" id="guru_id" class="form-control">
                    <option value="">-- Pilih Guru --</option>
                    @foreach ($guru as $g)
                        <option value="{{ $g->id }}">{{ $g->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control">
            </div>
            <div class="form-group">
                <label for="jumlah_jam">Jumlah Jam</label>
                <input type="number" name="jumlah_jam" id="jumlah_jam" class="form-control" min="1">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('jam-mengajar.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
