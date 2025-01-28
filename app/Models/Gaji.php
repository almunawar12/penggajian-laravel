<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

    protected $table = 'gaji';

    protected $fillable = [
        'guru_id',
        'bulan',
        'tahun',
        'gaji_pokok',
        'potongan',
        'total_gaji',
        'tanggal_pembayaran',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}
