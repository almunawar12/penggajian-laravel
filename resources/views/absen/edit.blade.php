@extends('layouts.layout')

@section('title', 'Edit Data Absen')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data Absen</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('absen.update', $absen->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="guru_id">Nama Guru</label>
                <select name="guru_id" id="guru_id" class="form-control">
                    @foreach ($guru as $item)
                        <option value="{{ $item->id }}" {{ $absen->guru_id == $item->id ? 'selected' : '' }}>
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </select>
                @error('guru_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $absen->tanggal }}">
                @error('tanggal')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control">{{ $absen->keterangan }}</textarea>
                @error('keterangan')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('absen.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
