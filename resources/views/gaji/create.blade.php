@extends('layouts.layout')

@section('title', 'Tambah Gaji')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Gaji</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('gaji.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="guru_id">Guru</label>
                <select name="guru_id" id="guru_id" class="form-control" required>
                    <option value="">Pilih Guru</option>
                    @foreach($guru as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="bulan">Bulan dan Tahun</label>
                <input type="month" name="bulan_tahun" id="bulan_tahun" class="form-control" value="{{ old('bulan_tahun') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('gaji.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
