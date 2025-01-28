<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Gaji;
use App\Models\Guru;
use App\Models\JamMengajar;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $guru = Guru::count();
        $jam_mengajar = JamMengajar::count();
        $gaji = Gaji::count();
        $absen = Absen::count();

        return view('layouts.dashboard', compact('guru', 'jam_mengajar', 'absen'));
    }
}
