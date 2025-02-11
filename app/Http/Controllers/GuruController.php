<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::all();
        return view('guru.index', compact('guru'));
    }

    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'nullable|string|unique:guru',
            'email' => 'nullable|email|unique:users,email',
            'password' => 'nullable|string|min:6',
            'harga_per_jam' => 'required|numeric',
            'status_honorer' => 'required|in:honorer,tetap',
        ]);

        // Jika email tidak diisi, buat email otomatis dari nama
        $email = $request->email ?? strtolower(str_replace(' ', '', $request->nama)) . '@example.com';

        // Jika password tidak diisi, gunakan default
        $password = $request->password ? Hash::make($request->password) : Hash::make('password123');

        // Buat User baru
        $user = User::create([
            'name' => $request->nama,
            'email' => $email,
            'password' => $password,
        ]);

        // Pastikan user_id dikirim ke Guru
        Guru::create([
            'user_id' => $user->id, // PENTING! Harus selalu ada
            'nama' => $request->nama,
            'nip' => $request->nip,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'harga_per_jam' => $request->harga_per_jam,
            'status_honorer' => $request->status_honorer,
        ]);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'nullable|string|unique:guru,nip,' . $guru->id,
            'harga_per_jam' => 'required|numeric',
            'status_honorer' => 'required|in:honorer,tetap',
        ]);

        $guru->update($request->all());

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil dihapus.');
    }
}
