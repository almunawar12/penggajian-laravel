<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\JamMengajar;
use Illuminate\Http\Request;

class JamMengajarController extends Controller
{
    public function index()
    {
        $jamMengajar = JamMengajar::with('guru')->get();
        return view('jam_mengajar.index', compact('jamMengajar'));
    }

    public function create()
    {
        $guru = Guru::all();
        return view('jam_mengajar.create', compact('guru'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'guru_id' => 'required|exists:guru,id',
            'tanggal' => 'required|date',
            'jumlah_jam' => 'required|integer|min:1',
        ]);

        JamMengajar::create($request->all());

        return redirect()->route('jam-mengajar.index')->with('success', 'Data jam mengajar berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jamMengajar = JamMengajar::findOrFail($id); // Cari data berdasarkan ID
        $guru = Guru::all(); // Ambil semua data guru
        return view('jam_mengajar.edit', compact('jamMengajar', 'guru'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'guru_id' => 'required|exists:guru,id',
            'tanggal' => 'required|date',
            'jumlah_jam' => 'required|integer|min:1',
        ]);

        $jamMengajar = JamMengajar::findOrFail($id);
        $jamMengajar->update($request->all());

        return redirect()->route('jam-mengajar.index')->with('success', 'Data jam mengajar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jamMengajar = JamMengajar::findOrFail($id);
        $jamMengajar->delete();

        return redirect()->route('jam-mengajar.index')->with('success', 'Data jam mengajar berhasil dihapus.');
    }
}
