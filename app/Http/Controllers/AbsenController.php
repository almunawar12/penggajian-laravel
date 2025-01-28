<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Guru;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function index(Request $request)
    {
        $absen = Absen::with('guru')->get();
        return view('absen.index', compact('absen'));
    }

    public function create()
    {
        $guru = Guru::all();
        return view('absen.create', compact('guru'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'guru_id' => 'required|exists:guru,id',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        Absen::create($request->all());

        return redirect()->route('absen.index')->with('success', 'Data absen berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $absen = Absen::findOrFail($id);
        $guru = Guru::all();
        return view('absen.edit', compact('absen', 'guru'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'guru_id' => 'required|exists:guru,id',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $absen = Absen::findOrFail($id);
        $absen->update($request->all());

        return redirect()->route('absen.index')->with('success', 'Data absen berhasil diperbarui.');
    }
}
