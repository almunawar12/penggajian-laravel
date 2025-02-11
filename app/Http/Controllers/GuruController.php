<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::with('user')->get();
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
            'harga_per_jam' => 'required|numeric',
            'status_honorer' => 'required|in:honorer,tetap',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        // Buat akun pengguna
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt('password123'), // Default password
            'role' => 'guru', // Set role sebagai guru
        ]);

        dd($user);

        // Buat data guru dan hubungkan dengan user_id
        $guru = Guru::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'harga_per_jam' => $request->harga_per_jam,
            'status_honorer' => $request->status_honorer,
            'user_id' => $user->id, // Hubungkan dengan user_id
        ]);

        dd($guru);

        return redirect()->route('guru.index')->with('success', 'Data guru dan akun berhasil dibuat.');
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
