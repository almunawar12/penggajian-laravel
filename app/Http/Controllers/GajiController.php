<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Gaji;
use App\Models\Guru;
use App\Models\JamMengajar;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    public function index(Request $request)
    {
        // // Mengambil nilai bulan_tahun dari input, jika kosong maka menggunakan nilai default
        // $bulan_tahun = $request->input('bulan_tahun') ?? date('Y-m');

        // // Memisahkan tahun dan bulan dari bulan_tahun
        // list($tahun, $bulan) = explode('-', $bulan_tahun);

        // // Mendapatkan data gaji berdasarkan bulan dan tahun yang dipilih
        // $gaji = Gaji::where('bulan', $bulan)
        //     ->where('tahun', $tahun)
        //     ->with('guru')
        //     ->get();

        // return view('gaji.index', compact('gaji', 'bulan', 'tahun'));

        $user = auth()->user(); // Dapatkan user yang sedang login
        $bulan_tahun = $request->input('bulan_tahun') ?? date('Y-m');
        list($tahun, $bulan) = explode('-', $bulan_tahun);

        // Jika role adalah guru, hanya ambil gaji dirinya sendiri
        if ($user->role === 'guru') {
            $guru = Guru::where('user_id', $user->id)->first(); // Ambil data guru berdasarkan user_id
            if (!$guru) {
                return redirect()->back()->with('error', 'Data guru tidak ditemukan.');
            }

            $gaji = Gaji::where('guru_id', $guru->id)
                ->where('bulan', $bulan)
                ->where('tahun', $tahun)
                ->with('guru')
                ->get();
        } else {
            // Jika admin, bisa melihat semua data gaji
            $gaji = Gaji::where('bulan', $bulan)
                ->where('tahun', $tahun)
                ->with('guru')
                ->get();
        }

        return view('gaji.index', compact('gaji', 'bulan', 'tahun'));
    }

    public function hitung(Request $request, $guru_id)
    {
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        $guru = Guru::findOrFail($guru_id);

        $total_jam = JamMengajar::where('guru_id', $guru_id)
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->sum('jumlah_jam');

        $jumlah_absen = Absen::where('guru_id', $guru_id)
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->count();

        $gaji_pokok = $total_jam * $guru->harga_per_jam;
        $potongan = $jumlah_absen * $guru->harga_per_jam;
        $total_gaji = $gaji_pokok - $potongan;

        Gaji::create([
            'guru_id' => $guru_id,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'gaji_pokok' => $gaji_pokok,
            'potongan' => $potongan,
            'total_gaji' => $total_gaji,
            'tanggal_pembayaran' => now(),
        ]);

        return redirect()->route('gaji.index')->with('success', 'Gaji berhasil dihitung.');
    }

    public function create()
    {
        $guru = Guru::all(); // Ambil semua data guru
        return view('gaji.create', compact('guru'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'guru_id' => 'required|exists:guru,id',
            'bulan_tahun' => 'required|date_format:Y-m',
        ]);

        // Memisahkan bulan dan tahun dari input bulan_tahun
        list($tahun, $bulan) = explode('-', $request->bulan_tahun);

        // Mengambil data guru
        $guru = Guru::findOrFail($request->guru_id);

        // Menghitung total jam mengajar
        $total_jam = JamMengajar::where('guru_id', $request->guru_id)
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->sum('jumlah_jam');

        // Menghitung jumlah absensi (hari tidak masuk)
        $jumlah_absen = Absen::where('guru_id', $request->guru_id)
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->count();

        // Menghitung gaji pokok dan potongan
        $gaji_pokok = $total_jam * $guru->harga_per_jam;
        $potongan = $jumlah_absen * $guru->harga_per_jam;

        // Menghitung total gaji setelah potongan
        $total_gaji = $gaji_pokok - $potongan;

        // Menyimpan data gaji
        Gaji::create([
            'guru_id' => $request->guru_id,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'gaji_pokok' => $gaji_pokok,
            'potongan' => $potongan,
            'total_gaji' => $total_gaji,
            'tanggal_pembayaran' => now(),
        ]);

        return redirect()->route('gaji.index')->with('success', 'Gaji berhasil dihitung dan disimpan.');
    }

    public function print($id)
    {
        $gaji = Gaji::with('guru')->findOrFail($id);

        // Pastikan tanggal_pembayaran adalah objek Carbon
        $gaji->tanggal_pembayaran = \Carbon\Carbon::parse($gaji->tanggal_pembayaran);

        return view('gaji.print', compact('gaji'));
    }

    // public function destroy($id)
    // {
    //     $gaji = Gaji::findOrFail($id);
    //     $gaji->delete();

    //     return redirect()->route('gaji.index')->with('success', 'Data gaji berhasil dihapus.');
    // }
}
