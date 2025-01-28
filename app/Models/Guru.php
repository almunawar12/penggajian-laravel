<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';

    protected $fillable = [
        'nama',
        'nip',
        'alamat',
        'no_telp',
        'harga_per_jam',
        'status_honorer',
    ];

    public function jamMengajar()
    {
        return $this->hasMany(JamMengajar::class);
    }

    public function absen()
    {
        return $this->hasMany(Absen::class);
    }

    public function gaji()
    {
        return $this->hasMany(Gaji::class);
    }
}
